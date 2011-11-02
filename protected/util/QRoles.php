<?php

class QRoles
{
	 //按照部门区分角色
    private  static  $depart_roles = array(
            '0'=>array('sales','city_agent','assist_sales','editor','duty_editor','mrm_city','oms_city','bi_manage'),  //分站权限
    	    '1'=>array('administrators','headquarter_sales','region_editor','mall_editor','settlement','cashier','accountant','market','mrm_headquarter','oms_headquarter','bi_manage'),  //管理员权限
	    	'296'=>array(''),  //客服部门权限
	    	'298'=>array('headquarter_sales','bi_manage'),  //销售部门权限
	    	'953'=>array('chief_editor','mall_chiefeditor','region_editor','mall_editor','art_editor','bi_manage'),  //编辑部门权限
            '954'=>array('contract_mamager','bi_manage'),//合同管理部
            '955'=>array('settlement','cashier','accountant','bi_manage'),//财务部
            '956'=>array('market','bi_manage'),//营销中心
            '957'=>array('mrm_headquarter','bi_manage'),//商服部
            '958'=>array('oms_headquarter','bi_manage'),//运营部
    		'959'=>array('mcm_staff','bi_manage'),//市场部
	 );
	 
	 /**
	  * 部门
	  */
	  private  static  $departs = array(
	                                '1' => '管理部',
									'298' => '销售部',
					                '954' => '合同管理部',
									'953' => '编辑部',
									'955' => '财务部',
	                                '296' => '客服部',
	                                '956' => '营销中心',
	                                '957' => '商服部',
	                                '958' => '运营部',
	  								'959' => '市场部',
							);
	 
	 /**
	  * 按照部门过滤角色
	  */
	 public static function  filterRoles($departid,$role)
	 {
	 	if(!isset($departid))
	 	{
	 		return FALSE;
	 	}
	 	if(in_array($role, self::$depart_roles[$departid]))
	 	{
	 		return  TRUE;
	 	}
	 	return FALSE;
	 }
	 
	 /**
	  * 取得部门
	  */
	 public static function getDepartments($id=null)
	 {
	 	if(isset($id))
	 	{
	 	  return self::$departs[$id];
	 	}
	 	return  self::$departs;
	 }
	 
}