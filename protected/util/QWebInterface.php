<?php
/**
 * WEB接口静态类
 *
 * 非数据库接口统一使用该类
 */
class QWebInterface
{
	/**
	 * 通知WEB更新WEB缓存
	 * @param unknown_type $type
	 * @param unknown_type $params
	 * 
	 * $type 描述
	 * addwater : 加水功能
	 */
	public static function notifyUpdateCache($type,$params)
	{
		switch ($type)
		{
			case 'addwater'://加水通知
				$url =Yii::app()->params['weburl'].'/team/updateDisplayNumberCatch.html?id='.$params['id'];
			    Utility::DoGet($url);
			  break;  
			default:
		}
	}
}