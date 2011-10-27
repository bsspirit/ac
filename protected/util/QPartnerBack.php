<?php
class QPartnerBack
{
	private static $status = array('1'=>'创建', '2'=>'启用', '3'=>'停用');
	
	public static function getState($key=null)
	{
		return self::$status[$key];
	}
	
	public static function getStates()
	{
		return self::$status;
	}
	
	public static function isdisable($key)
	{
		return $key=='1'||$key=='3';
	}
	
	public static function isenable($key)
	{
		return $key=='2';
	}
}