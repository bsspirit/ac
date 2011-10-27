
<?php
/**
 * 整个团购项目的状态
 */

class QTeamState
{
	private  static $_states = array(
									'1' => '未提交',
	                                '11' => '审单被驳回',
									'2' => '已提交，待助理审单',
	                                '21' => '已提交，待总部审单',
									'3' => '已审单，待签约',
	                                '31' => '合同被总部驳回',
									'4' => '已签约，待总部审批',
									'5' => '已审批，完成',		//原为已审批，待编辑
									'7' => '已作废',
									/*'6' => '已编辑，待编辑审核',
									'7' => '已审核，待上线',
									'8' => '在线销售',
									'9' => '已下线',
									'a' => '首款结算',
									'b' => '中期结算',
									'c' => '尾款结算',
									'd' => '完成',*/
	);
	
	private  static $_machines = array(
		'1' => array('y'=>'2'),          // 未提交
		'11' => array('y'=>'2'),          // 驳回再提交
		'2' => array('n'=>'11','y'=>array('0'=>'3','1'=>'21')),   //已提交，待审核
	    '21' => array('y'=>'3','n'=>'11'),                        //需总部审核   已审核，待签约
		'3' => array('y'=>'4'),                                  //无需总部审核        站长已审核，待签约
		'31' => array('y'=>'4'),                                  //驳回待签约
		'4'  => array('n'=>'31','y'=>'5'),                        // 已签约，待审批
		'5' => '已审批，待编辑', 
		'6' => '已编辑，待编辑审核',
		'7' => '已审核，待上线',
		'8' => '在线销售',
		'9' => '已下线',
		'a' => '首款结算',
		'b' => '中期结算',
		'c' => '尾款结算',
		'd' => '完成',
	);
	
	//团购审批状态
	private  static $_pubstates = array(
	      '0' => '待认领',
	      '1' => '已编辑  待提交',
	      '11' => '被驳回   待提交',
	      '2' => '已提交 待地方责编审核',
	      '3' => '已提交 待大区责编审核',
	      '4' => '已发布',
	      '5' => '申请改单',
	      '6' => '同意改单',
	      '7' => '团购下线',
    );
	public static  function getState($key=null)
	{
		if($key !== NULL){
			if(!array_key_exists($key,self::$_states)){
				return '';
			}
			return self::$_states[$key];
		}else
//			$allstate = self::$_states;
//			unset($allstate['7']);
			return self::$_states;

	}
	
	/**
	 * 获得团购审批状态
	 * @param unknown_type $key
	 */
	public static  function getPubState($key=null)
	{
			if($key !== NULL){
			if(!array_key_exists($key,self::$_pubstates)){
				return '';
			}
			return self::$_pubstates[$key];
		}else
			return self::$_pubstates; 
		
	}
	
	/**
	 * 通过现有状态获得下一个状态
	 * Enter description here ...
	 * @param unknown_type $nowstate
	 * @param unknown_type $pass
	 */
	public static function getNextState($nowstate,$pass='y',$head='0')
	{
		if (!in_array($nowstate,array('1','11','2','21','3','31','4')))
			return '1';
		$nexts = self::$_machines[$nowstate];
		
		if (!in_array($pass,array('y','n')))
			return '1';
			
		$third = $nexts[$pass];
		
		if (is_array($third))
		{
			return $third[$head];
		}
		else {
			return $third;
		}
	}
	
	
	/**
	 * 检查操作按钮是否可见
	 * @param unknown_type $op
	 * @param unknown_type $state
	 */
	public static  function checkvisible($op,$state)
    {
	     $isvisible = array(
			'update' => array('1','11','3','31'),  
		    'delete' => array('1','11'),                       
			'survey' => array('1','11'), 
			'upload'  => array('3','31'), 
			'submit'  => array('1','11'), 
			'signature'  => array('3','31'),
	     	'sendback' => array('5'),
	     	'recycle' => array(),
		);

		//已通过审批的合同修改权限放开给总部合同管理员
		if(QControllerHelp::checkRole('contract_mamager'))
		{
		    if(in_array($op,array('update','upload','recycle'))&&$state=='5' )
			{
				return true;
			}
		}
		if(!QControllerHelp::checkRole('assist_sales'))
		{
			if(in_array($op,array('upload','signature')) )
			{
				return false;
			}
		}else
		{
			if($op=='update'&&in_array($state, array('1','11')) )
 			{
				return false;
			}
		}
		if(!QControllerHelp::checkRole('sales'))
		{
			if(in_array($op,array('delete','survey','submit')) )
			{
				return false;
			}
		}else 
		{
			if($op=='update'&&in_array($state, array('3','31')))
 			{
				return false;
			}
		}
		
    	if(!QControllerHelp::checkRole('sales')&&
    	     !QControllerHelp::checkRole('assist_sales'))
		{
			if(in_array($op,array('update')) )
			{
				return false;
			}
		}
		
		return in_array($state,$isvisible[$op]);
    }
    
    public static  function checkaudit($op,$state)
    {
	     $isvisible = array(
			'update' => array('0'),  
		    'delete' => array('0','1','2','3'), 
            'audit' => array('0'), 
            'pub' => array('1'), 
            'restrict' => array('Y'),
		);
		return in_array($state,$isvisible[$op]);
    }
    
    public static  function checkOrderpartner($limit,$state)
    {
        if($limit=='Y')
        {
            if($state>0){
                return false;
            }else{
                return true;
            }
        }
        else
        {
            return false;
        }
    }
    
    
      /**
     * 检查团购按钮是否可见
     * @param unknown_type $op
     * @param unknown_type $data
     */
    public static  function teamindexvisible($op,$data)
    {
    	//大区责编直接修改团购
    	if(QControllerHelp::checkRole('region_editor'))
    	{
            //修改团购
    		if(in_array($op,array('update')))
    		{
    			return true;
    		}
    		if($data->is_limit=='Y'&&$op=='restrict')
    		{
    			return true;
    		}
    	}
    	$teamdraft = Team::model()->getTeamDraft($data->id);
    	if(!$teamdraft) return false;
    	$pub_state = $teamdraft->pub_state;
    	
    	//编辑、地方责编可以申请改单 
       if(QControllerHelp::checkRole('editor')||
          QControllerHelp::checkRole('duty_editor'))
    	{
    	   if(in_array($op,array('change'))&&
    		   in_array($pub_state,array('4'))
    		   )
    		{
    			if(QControllerHelp::checkRole('editor')&&
    			   $data->user_id == Yii::app()->user->id)
    			{
    				return true;
    			}
    			
    			$cityids = QControllerHelp::getSubCityIDs();
    			array_push($cityids,Yii::app()->user->city_id);
    		    if(QControllerHelp::checkRole('duty_editor')&&
    			    in_array($data->city_id, $cityids))
    			{
    				return true;
    			}
    		}
    		
    		//大区责编对于地编提交的改单申请，审核通过之后，地方编辑、地方责编都可以改单
    	
//    		if(in_array($op,array('update'))&&
//    		   in_array($pub_state,array('6'))
//    		   )
//    		{
//    			if(QControllerHelp::checkRole('editor')&&
//    			   $data->user_id == Yii::app()->user->id)
//    			{
//    				return true;
//    			}
//    			
//    		    if(QControllerHelp::checkRole('duty_editor')&&
//    			    $data->city_id == Yii::app()->user->city_id)
//    			{
//    				return true;
//    			}
//    		}
    	}
    	return false;
    }
    
    public static  function teamwaitsubmitvisible($op,$data)
    {
      	 //在线改单隐藏放弃按钮
         if($op =='giveup'&&$data->pub_state=='6')
    	 {
    			return false;
    	 }
    	 return true;
    }
    
    public static function getTeamstate($state)
    {
        switch($state) {
            case 'none': return '还未开始';
            case 'selling': return '正在进行中';
            case 'soldout': return '已售光';
            case 'failure': return '团购失败';
            case 'success': return '团购成功';
            case 'close': return '已结束';
            default: return '正在进行中';
        }
    }
    
    public static function team_notices($notice)
    {
        $result = array();
        $result[0] = array(
            '1' => '每人限购  <input type="text" size="2" value="'.$notice[1][0].'"/> 张',
            '4' => '每桌限用  <input type="text" size="2" value="'.$notice[4][0].'"/> 张24券',
            '5' => '需凭24券打印券兑换',
            '9' => '请至少提前  <input type="text" size="2" value="'.$notice[9][0].'"/> 天致电  <input type="text" size="20" value="'.$notice[9][1].'"/> 预约',
            '10' => '<input type="text" size="5" value="'.$notice[10][0].'"/> 年 <input type="text" size="5" value="'.$notice[10][1].'"/> 月 <input type="text" size="5" value="'.$notice[10][2].'"/> 日至 <input type="text" size="5" value="'.$notice[10][3].'"/> 年 <input type="text" size="5" value="'.$notice[10][4].'"/> 月 <input type="text" size="5" value="'.$notice[10][5].'"/> 日不能使用',
            '12' => '有效期自 <input type="text" size="5" value="'.$notice[12][0].'"/> 年 <input type="text" size="5" value="'.$notice[12][1].'"/> 月 <input type="text" size="5" value="'.$notice[12][2].'"/> 日至 <input type="text" size="5" value="'.$notice[12][3].'"/> 月 <input type="text" size="5" value="'.$notice[12][4].'"/> 日',
            '13' => '24券不与其他优惠同时使用',
        );
        $result[1] = array(
            '2' => '每人限购  <input type="text" size="2" value="'.$notice[2][0].'"/> 个',
            '6' => '仅限  <input type="text" size="10" value="'.$notice[6][0].'"/> 地区购买',
            '7' => '<input type="text" size="10" value="'.$notice[7][0].'"/>  地区不参与此次团购',
            '14' => '本次团购为实物,快递费  <input type="text" size="2" value="'.$notice[14][0].'"/> 元/单',
            '15' => '<input type="text" size="5" value="'.$notice[15][0].'"/> 起全国包邮',
            '16' => '<input type="text" size="5" value="'.$notice[16][0].'"/> 单需另支付 <input type="text" size="2" value="'.$notice[16][1].'"/> 元邮费',
            '17' => '请详细填写联系人、地址和电话',
            '18' => '产品下单后 <input type="text" size="2" value="'.$notice[18][0].'"/> 个工作日内发货',
            '19' => '产品下单后非质量问题不予退款',
            '20' => '本产品生产日期 <input type="text" size="5" value="'.$notice[20][0].'"/> 年 <input type="text" size="5" value="'.$notice[20][1].'"/> 月',
            '21' => '保质期 <input type="text" size="2" value="'.$notice[21][0].'"/> 个月',
            '22' => '请在订单附言中注明所要购买的组合及数量(如:xx产品xx个)',
        );
        $result[2] = array(
            '24' => '抽奖时间：<input type="text" size="5" value="'.$notice[24][0].'"/> 年  <input type="text" size="5" value="'.$notice[24][1].'"/> 月  <input type="text" size="5" value="'.$notice[24][2].'"/> 日至  <input type="text" size="5" value="'.$notice[24][3].'"/> 月  <input type="text" size="5" value="'.$notice[24][4].'"/> 日',
            '25' => '开奖时间：  <input type="text" size="5" value="'.$notice[25][0].'"/> 年  <input type="text" size="5" value="'.$notice[25][1].'"/> 月  <input type="text" size="5" value="'.$notice[25][2].'"/> 日',
            '27' => '为保证所有参与者利益，24券保留使用获奖用户的个人信息和肖像的权利',
            '28' => '本次活动奖品为实物礼品，请中奖者到24券总部或分站领取，或由24券负责快递给中奖用户',
            '29' => '每天抽出 <input type="text" size="5" value="'.$notice[29][0].'"/> 台，周六、日除外',
            '30' => '每邀请1个朋友多1个抽奖号码',
            '31' => '每人最多可得  <input type="text" size="5" value="'.$notice[31][0].'"/> 个抽奖号码',
            '32' => '开奖期间请务必保持手机畅通',
        );
        $result[3] = array(
            '1' => '每人限购#张',
            '2' => '每人限购#个',
            '4' => '每桌限用#张24券',
            '5' => '需凭24券打印券兑换',
            '6' => '仅限#地区购买',
            '7' => '#地区不参与此次团购',
            '9' => '请至少提前#天致电#预约',
            '10' => '#年#月#日至#年#月#日不能使用',
            '12' => '有效期自#年#月#日至#月#日',
            '13' => '24券不与其他优惠同时使用',
            '14' => '本次团购为实物,快递费#元/单',
            '15' => '#起全国包邮',
            '16' => '#单需另支付#元邮费',
            '17' => '请详细填写联系人、地址和电话',
            '18' => '产品下单后#个工作日内发货',
            '19' => '产品下单后非质量问题不予退款',
            '20' => '本产品生产日期#年#月',
            '21' => '保质期#个月',
            '22' => '请在订单附言中注明所要购买的组合及数量(如:xx产品xx个)',
            '24' => '抽奖时间：#年#月#日至#月#日',
            '25' => '开奖时间：#年#月#日',
            '27' => '为保证所有参与者利益，24券保留使用获奖用户的个人信息和肖像的权利',
            '28' => '本次活动奖品为实物礼品，请中奖者到24券总部或分站领取，或由24券负责快递给中奖用户',
            '29' => '每天抽出#台，周六、日除外',
            '30' => '每邀请1个朋友多1个抽奖号码',
            '31' => '每人最多可得#个抽奖号码',
            '32' => '开奖期间请务必保持手机畅通',
        );
        return $result;
    }
    
    public static function team_lightspot()
    {
        $lightspots = array(
            '1' => '新鲜食材',
            '2' => '口味独特',
            '3' => '超值享受',
            '4' => '全场通兑',
            '5' => '环境优雅',
            '6' => '服务周到',
            '7' => '好评如潮',
            '8' => '服务贴心',
            '9' => '精致包装',
            '10' => '绝佳礼品',
            '11' => '驰名品牌',
            '12' => '品质保证',
            '13' => '繁华地带',
            '14' => '交通便利',
            '15' => '量足新鲜',
            '16' => '营养丰富',
            '17' => '黄金商圈',
            '18' => '极致效果',
            '19' => '套餐组合',
            '20' => '随心选择',
            '21' => '设施完善',
            '22' => '环境温馨',
            '23' => '全国包邮',
            '24' => '正品保证',
            '25' => '专业技术',
            '26' => '时尚理念',
            '27' => '免费车位',
            '28' => '方便快捷',
        );
        return $lightspots;
    }
    
    //频道列表
    public static function getChannel()
    {
        $channel = array(
            '1' => '今日推荐',
            '2' => '精品商城',
        );
        
        return $channel;
    }
    
    public static function getTeamType($types,$v)
    {
    	$arr = explode(",",$types);
    	if ($v==1){
    		$result = QCategory::getEnums('mallclass');
    	}else{
    	   $result = QCategory::getEnums('group');
    	}

        for ($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = $result[$arr[$i]];
        }
        
        return implode(",",$arr);
    }
    
    public static function getPosition()
    {
        if (QControllerHelp::checkRole('chief_editor'))
        {
            $result = Yii::app()->params['locklist_chief_editor'];
        }
        else 
        {
            $result = Yii::app()->params['locklist_mail_chief_editor'];
        }
        return $result;
    }
    
    public static function checkPostion()
    {
    	$result = array();
        $position = QTeamState::getPosition();
        foreach ($position as $key=>$value)
        {
            if ($key!=0)
            {
                $result[] = $position[$key];
            }
        }
        
        return $result;
    }
}