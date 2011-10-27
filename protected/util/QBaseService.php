<?php
abstract class QBaseService extends CComponent
{
	private function __construct()
	{
	}
		
	final public static function instance($name = null)
	{
		if(function_exists('get_called_class'))
		{
			$name = get_called_class();	
		}
		
		$instance = new $name;
		return $instance;
	}
	
	public function convertEnum($datas, $fields=null)
	{
		$ret = array();
		foreach($datas as $data){
			$record = array();
			if(!empty($fields)) {
				foreach ($fields as $prop) {
					$record[$prop] = $data->get($prop);
				}
			} else {
				foreach($data->attributeLabels() as $prop => $label){
					$record[$prop] = $data->get($prop);
				}
			}
			$ret[] = $record;
		}
		return $ret;
	}
	
	/**
	 * 拦截方法 用户实现读写分离 、缓存等功能
	 * 
	 * 子类中需要实现 perform_xxx()方法
	 * 
	 * @param unknown_type $name
	 * @param unknown_type $parameters
	 */
	public function __call($name,$parameters)
	{
		$method_name = "perform_$name";
		if(method_exists($this,$method_name))
			return call_user_func(array($this,$method_name),$parameters);
		else
			return parent::__call($name,$parameters);
	}
}