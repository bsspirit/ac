<?php
/**
 * 
 * 判断用户是否用操作权限
 * return boolean
 *
 */
class QControllerHelp
{
	public static function getPermissions($user_id,$isSameLevel=false,$isIndirectSub=false)
	{
		if(!empty($user_id)&& $user_id != Yii::app()->user->id)
		{
			//解决session超时问题
			if(!isset(Yii::app()->session['schema']['subs']))
			{
				self::sessionExc();
			}
			foreach (Yii::app()->session['schema']['subs'] as $sub)
			{
				if ($user_id == $sub['id'])
				{
					//如果允许看下级的..
					 if($isSameLevel)
					 {
						return true;
					 }else
					 {
						return false;
					 }
				}
			}
			return false;
		}else
		{
			return true;
		}	
	}
	/**
	 * 检查角色
	 */
	public static function checkRole($rolename)
	{
	  //解决session超时问题
		if(!isset(Yii::app()->session['schema']['roles']))
		{
			self::sessionExc();
			break;
		}
		foreach (Yii::app()->session['schema']['roles'] as $role){
			if($role['name']==$rolename){
				return true;
				break;
			}
		}
		return false;
	}
	
	/**
	 * session 超时
	 */
	private static function sessionExc()
	{
		throw new CException('在线时间过长，请重新登录!');
		
		exit;
	}
    
    public static function checkRoles($op,$state)
    {
        $service = EmployeeService::instance('employeeService');
        if($op=='down' && $state==4)
        {
            if($service->isRole('region_editor'))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
        if($op=='audit' && $state==0)
        {
            if($service->isRole('editor') || $service->isRole('duty_editor') || $service->isRole('region_editor'))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
        if($op=='auditok' && $state==1)
        {
            if($service->isRole('duty_editor') || $service->isRole('region_editor'))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
        if($op=='pub' && $state==2)
        {
            if($service->isRole('duty_editor') || $service->isRole('region_editor'))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
        if($op=='pubok' && $state==3)
        {
            if($service->isRole('region_editor'))
            {
                return true;
            }
            else
            {
               return false;
            }
        }
    }

	/**
	 * 获得下属ID
	 */
	public static function getSubIDs()
	{
		$ids = array();
	    if(!isset(Yii::app()->session['schema']['subs']))
		{
			//return $ids;
			self::sessionExc();
		}
		foreach (Yii::app()->session['schema']['subs'] as $sub)
		{
			array_push($ids,$sub['id']);
		}
		
		return $ids;
	}
	
    /**
	 * 获得下属站ID
	 */
	public static function getSubCityIDs()
	{
		$ids = array();
		
	    if(!isset(Yii::app()->session['schema']['subs']))
		{
			self::sessionExc();
			//return $ids;
		}
		
		foreach (Yii::app()->session['schema']['subs'] as $sub)
		{
			if(!in_array($sub['city_id'], $ids))
			{
				array_push($ids,(int)$sub['city_id']);
			}
		}
		return $ids;
	}
	
    /**
	 * 获得下属站ID 包括所在站
	 */
	public static function getSubCityIDsAndMe()
	{
		$cityids = self::getSubCityIDs();
		
	    $owncityid = Yii::app()->user->city_id;
	    
	    if(!in_array($owncityid, $cityids))
		{
			array_push($cityids,$owncityid);
		}
		
		return $cityids;
	
	}
	
	public static function getSubCitys(){
		$cityids = self::getSubCityIDs();
		if(empty($cityids)){
			$cityids = Yii::app()->user->city_id;
		}else{
			$cityids = implode(',', $cityids);
		}
		$service = CityService::instance('CityService'); 
	    $citymodel = $service->getAllPassCities4($cityids);
		
		foreach($citymodel as $k => $v){
			$citys[$v->id] = $v->name;
		}
		return empty($citys)?array():$citys;
	}
	
	/**
	 * 获得开通的城市
	 */
	public static function getPassCitys($cityid=null)
	{
		
	    if(!isset(Yii::app()->session['pass_citys']))
		{
			return '';
		}
		$citys = (array)Yii::app()->session['pass_citys'];
		if($cityid!=null)
		{
			if(array_key_exists($cityid, $citys))
			{
			   $citys = $citys[$cityid];
			}else 
			{
				$citys = '';
			}
		}
		return $citys;
	}
	
    public static function checkEnums($type,$value)
    {
       if ($type==3)
       {
           return QCategory::getEnums('mallclass',$value);
       }
       else 
       {
       	   $name = '';
       	   $group = Category::model()->find(array(
	           'select'=>'cname,ctype',
	           'condition'=>"ckey=:ckey and ctype like '%group%'",
	           'params'=>array(':ckey'=>$value),
	       )); 
	       if (!empty($group))
           {
	           $team_group = explode('_',$group->ctype);
	           if (count($team_group)==1)
	           {
	           	   $name = $group->cname;
	           }
	           else
	           {
		           $group_first = Category::model()->find(array(
	                   'select'=>'cname',
	                   'condition'=>"ckey=:ckey and ctype='group'",
	                   'params'=>array(':ckey'=>$team_group[1]),
	               ));
	               $name = $group_first->cname;
	           }
           }
           return $name;
       }
    }
    
    //得到团购的商圈
    public static function getTrade($trades)
    {
    	$trade = '';
    	if(is_array($trades)) {
    		foreach($trades as $key=>$value) {
    			$trade .= $value->trade_name.'、';
    		}
    	}
    	return trim($trade,'、');
    }

	/**
	 * 取得城市名称
	 */
    public static function getCityName($city_id)
    {
        $service = CityService::instance('CityService'); 
	    $city = $service->loadModel($city_id);
	    
	    if(!isset($city))
	       return '';
	       
        return $city['name'];
    }
    
    /**
     * 获得AR的错误信息
     * @param unknown_type $model
     * @param unknown_type $br  换行符 \n  ,<br> 默认\n
     */
    public static function getARErrors($model,$br='\n')
    {
        $errors = $model->getErrors();
		$errstr = '';
		foreach($errors as $k=>$v){
					$errstr .= $v[0].$br;
		}
		return $errstr;
    }
    
     /**
	 * 递归创建目录
	 */
	public static function mkdirs($path, $mode = 0775)
	{
		$dirs = explode('/',$path);
		$pos = strrpos($path, ".");
		if ($pos === false) { 
			$subamount=0;
		}
		else {
			$subamount=1;
		}
		
		for ($c=0;$c < count($dirs) - $subamount; $c++) {
			$thispath="";
			for ($cc=0; $cc <= $c; $cc++) {
				$thispath.=$dirs[$cc].'/';
			}
			if (!file_exists($thispath)) {
				mkdir($thispath,$mode);
			}
		}
	}
	
	public static function getTeam($draftmodel,$model)
	{
		$draftmodel->id = $model->id;
		$draftmodel->begin_time = $model->begin_time;
        $draftmodel->end_time = $model->end_time;
        $draftmodel->expire_time = $model->expire_time;
        $draftmodel->state = $model->state;
        $draftmodel->purchase_price = $model->purchase_price;
        $draftmodel->team_price = $model->team_price;
        $draftmodel->market_price = $model->market_price;
        $draftmodel->max_number = $model->max_number;
        $draftmodel->delivery = $model->delivery;
        $draftmodel->officer = $model->officer;
	    return $draftmodel;
	}
	
	public static function checkHasimage($id,$type)
	{
	   $draftid = Team::model()->getTeamid($id);
	   $service = TeamService::instance('TeamService');
	   $draftmodel = $service->loadDraftModel($draftid);
	   $result = '有';
	   if ($type==1)
	   {
	       if (empty($draftmodel->image))
	       {
	           $result = '无';
	       }
	   }
	   else
	   {
	       if (empty($draftmodel->mobile_image))
           {
               $result = '无';
           }
	   }
	   return $result;
	}
    /**
     * 取得某个月最后一天
     * @param unknown_type $year
     * @param unknown_type $month
     */
	public static function get_last_day($year, $month) {
	    $t = mktime(0, 0, 0, $month + 1, 1, $year);
	    $t = $t - 60 * 60 * 24;
	    return $t;
	}
	
	/**
	 * 随即生产密码
	 * @param  $length 生产密码长度
	 */
	public static function  generate_password($length = 8) 
	{
	    // 密码字符集，可任意添加你需要的字符
	    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
	
	    $password = '';
	    for ( $i = 0; $i < $length; $i++ )
	    {
	        // 这里提供两种字符获取方式
	        // 第一种是使用 substr 截取$chars中的任意一位字符；
	        // 第二种是取字符数组 $chars 的任意元素
	        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
	    }
	
	    return $password;
    } 
    
    /**
     * ERP系统加密方法
     * 
     * 在原有字符串后边增加 @4!@#$%@
     */
    public static function md5erp($pwd)
    {
    	return md5($pwd . '@4!@#$%@');
    }
    
    //判断某团购是否被检查有错误信息
    public function examinevisible($id)
    {
        $examine = TeamExamine::model()->find(array(
            'select'=>'id',
            'condition'=>'team_id=:tid',
            'params'=>array(":tid"=>$id),
        ));
        if (!empty($examine))
        {
            return true;
        }
        return false;
    }
}