<?php
class QHtml
{
    public static function moneyit($k) 
    {
        return rtrim(rtrim(sprintf('%.2f',$k), '0'), '.'); 
    }
    
    public static function city_optionsdb($city_id,$type=0)
	{
		$service = CityService::instance('CityService'); 
		return CHtml::listData($service->getAreas($city_id,$type),'id','name');
	}

	public static function dateFormat($dateTime,$format='Y-m-d H:i:s')
	{
		if($dateTime==0)
			return '';
		return date($format,$dateTime);
	}
	
	public static function sub_ordinates()
	{
		return CHtml::listData(Yii::app()->session['schema']['subs'],'id','name');
	}
	/**
	 * 
	 * 截取utf8字符串
	 */
	public static function utf8Substr($str, $from, $len)
	{
	    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
	                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
	                       '$1',$str);
	}
	
/**
	 * 将所有已开通的城市转为下拉列表所需要的数组格式
	 * @param unknown_type $citys
	 */
	public static function citysToArr($citys){
		if(empty($citys))
			return ;
		$arr = array();
		foreach($citys as $city){
			$arr[$city['id']] = $city['name'];
		}
		return $arr;
	}
	
	public static function getNumByTimes($timesNum,$times){
		if($times !== NULL&&count($timesNum)>0){
			if(!array_key_exists($times,$timesNum)){
				return '';
			}
			return $timesNum[$times]>0?" 【".$timesNum[$times]."条】":'';
		}else
			return ''; 
	}
    
    function is_utf8($string) 
    { 
        return preg_match('%^(?: 
        [\x09\x0A\x0D\x20-\x7E] # ASCII 
        | [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte 
        | \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs 
        | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte 
        | \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates 
        | \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3 
        | [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15 
        | \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16 
        )*$%xs', $string); 
    }

    //取银行名称
public static function getServiceTitle($service){
	if($service=='alipay')
		return "支付宝";
	else if($service=='99bill')
		return "快钱";
	else if($service=='tenpay')
		return "财富通";
	else if($service=='chinabank')
		return "中国银行";
	else if($service=='chinabank2')
		return "中国银行一般户";
	else if($service=='cmb')
		return "招商银行";
	else if($service=='cmb2')
		return "招商银行一般户";
	else if($service=='nybank')
		return "农业银行";
	else if($service=='icbc')
		return "工商银行";
	else if($service=='spdbank')
		return "浦发银行";
	else if($service=='spdbank2')
		return "浦发银行一般户";
	else if($service=='bjbank')
		return "北京银行";
	else if($service=='chinabank')
		return "中国银行";
	else if($service=='shbank')
		return "上海银行";
	else if($service=='dybank')
		return "东亚银行";
	else if($service=='cash')
		return "现金";
	else if($service=='cheque')
		return "支票";
	else
		return "";
}
	//取款项名称
	public static function getSettleTimes($times){

		if($times=='first')
			return "首款";
		else if($times=='second')
			return "二次款";
		else if($times=='third')
			return "三次款";
		else if($times=='last')
			return "尾款";
		else if($times=='deposit')
			return "押金";
		else if($times=='exclusivesale')
			return "包销款";
		else if($times=='advance')
			return "预付款";
		else if($times=='ebusiness')
			return "物流单款";
		else if($times=='followfund')
			return "补款";
		else
			return "";
	}
	//取状态
	public static function getSettleState($state){
		if($state=='estimate')
			$statename= "预估";
		else if($state=='tobeconfirm')
			$statename= "未确认";
		else if($state=='confirmed')
			$statename= "已确认";
		else if($state=='unuseful')
			$statename= "失败的";
		else if($state=='false')
			$statename= "失败";
		else if($state=='success')
			$statename= "成功";
		else if($state=='settlemented')
			$statename= "已结算";
		else if($state=='reclaimDeposit')
			$statename= "收回押金";
		return $statename;
	}
	
	public static function getTeamType($value)
	{
		$values = array('1'=>'普通单','2'=>'秒杀单','3'=>'精品商城');
		return $values[$value];
	}

	public static function getUtf8Str($str){
		return iconv('utf-8', 'gbk//IGNORE',$str);
	}	
	
	public static function getTitle($title)
	{
        $rs = preg_replace("/<!--(.*?)-->/is","",$title);     //替换
        return $rs;
	}
	
	public static function uppic ($fileinfo)
	{
		$p_type = array("jpg","jpeg","bmp","gif",'png');
		$path = dirname(Yii::app()->basePath).'/static/team/'.date("Y").'/'.date("md").'/';
        if(!file_exists($path))
        {
            QHtml::mkdirs($path);
        }

        $sys_path = 'team/'.date("Y").'/'.date("md").'/';
        
        if(($postf = QHtml::f_postfix($p_type,$fileinfo['image']['name'])) != false)
        {
            $path .= time().".".$postf;
	        $is_true = false;
	        
	        if($fileinfo['image']['tmp_name']){
	            if (move_uploaded_file($fileinfo['image']['tmp_name'],$path))
	            {
	                $is_true = true;
	                $sys_path .= time().".".$postf;
	            }
	        }
	        
	        if ($is_true) {
	            return $sys_path;
	        }else {
	            return '';
	        }
        }
        else
        {
            header('Content-Type: text/html; charset=utf-8');
            echo '<script type="text/javascript">';
            echo 'window.alert("不能上传该类型的文件");';
            echo 'window.close();</script>';
            exit;
        }  
	}
	
    public function mkdirs($pathname, $mode = 0755) 
    {
        is_dir(dirname($pathname)) || QHtml::mkdirs(dirname($pathname), $mode);
        return is_dir($pathname) || @mkdir($pathname, $mode);
    }
    
    public function f_postfix($f_type,$f_upfiles)
    {
        $is_pass = false;
	    $tmp_upfiles = split('\.',$f_upfiles);
	    $tmp_num = count($tmp_upfiles);
	    /*判断上传图片扩展名是否合法*/
	    if(in_array(strtolower($tmp_upfiles[$tmp_num - 1]),$f_type))
	        $is_pass = $tmp_upfiles[$tmp_num - 1];
	    return $is_pass;
    }
    
    public function changeStr($arr)
    {
        $ids = array();
        if (!empty($arr))
        {   
	        foreach ($arr as $va){
	            $ids[] = $va['team_id'];
	        }
	        $ids = join(',',$ids);
        }
        return $ids;
    }
    
    public function getValue($key,$result)
    {
    	do
		{
		   $key++;
		}
		while (in_array($key,$result));
    	return $key;
    }
    
    public function getStr($teams)
    {
    	$result = array();
    	if (!empty($teams))
    	{
	    	foreach ($teams as $key=>$value)
	        {
	           $result[$value] = $key;
	        }
    	}
        return $result;
    }
    
    public function getSort($editsort,$team_id)
    {
        $result = array();
        if (!empty($editsort))
        {
            for ($i=0;$i<count($editsort);$i++)
            {
                if ($editsort[$i]!=$team_id)
                {
                    $result[] = $editsort[$i];
                }
            }
        }
        return $result;
    }
}