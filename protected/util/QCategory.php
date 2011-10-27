<?php
/**
 * 参数静态类
 * 
 * 提供按照类型、key查询参数
 * 
 * 实现两种方式:
 * 1、通过参数类型查参数列表     返回：{key1=>value1, ...}
 * 2、通过参数类型和关键字查指定类型    返回： string type  value
 *
 *注：参数都放到数据库中维护，请在管理后台设置
 */
class QCategory
{
	public static function getEnums($enumKey, $key = NULL){
		
		$service = CategoryService::instance('CategoryService');
		$enum = $service->getCategorysByType($enumKey);
		
		if($key !== NULL){
			if(!array_key_exists($key,$enum)){
				return '';
			}
			return $enum[$key];
		}else
			return $enum; 
	}
	public static function getStorename($id){
		$store = QCategory::getEnums('storehouse');
		return $store[$id];
	}
}