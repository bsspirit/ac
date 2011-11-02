<?php
/**
 * 常量类
 *
 */
class QConstants
{
	//CRM日志参数--------------------------------------------
	const CONTRACT_CREATE = '创建合同';  
	const CONTRACT_UPDATE = '修改合同';  
	const CONTRACT_RETURN = '审单不通过';
	const CONTRACT_PASS = '审单通过';
	const CONTRACT_DELETE = '删除合同';
	const CONTRACT_SIGNAGTURE = '签署合同'; 
	const CONTRACT_APPROVALN = '驳回合同'; 
	const CONTRACT_APPROVALY = '审批合同'; 
	const CONTRACT_FINISHED = '完成合同审批';
	const CONTRACT_RECYCLE = '作废合同'; 
	//---------------------------------------------------------
	
	
	//CMS日志参数--------------------------------------------
	const TEAM_CREATE = '创建团购';  
	const TEAM_UPDATE = '编辑团购';  
	const TEAM_DELETE = '删除团购';  
	const TEAM_SUBMIT = '提交团购'; 
	const TEAM_COPY = '同步团购'; 
	const TEAM_APPROVALN = '驳回团购'; 
	const TEAM_APPROVALY = '审核团购'; 
	const TEAM_PUB = '发布团购'; 
	const TEAM_UNLINE = '团购下线'; 
	const TEAM_GIVEUP = '放弃团购'; 
	const TEAM_IDENTIFY = '认领团购'; 
	const TEAM_REQCHANGE = '申请改单'; 
	const TEAM_CHANGEPASS = '同意改单'; 
	const TEAM_ADDWATER = '加水'; 
	const TEAM_ONLINE = '团购上线'; 
	//---------------------------------------------------------
	
	
	//OMS日志参数----------------------------------------------
	const TEAM_OMS_PLANFINISHED = '完成排期'; 
	const TEAM_OMS_PLANUNFINISHED = '取消排期'; 
	//---------------------------------------------------------
	//SESSIONS 常量--------------------------------------------
	
	
	
	//---------------------------------------------------------
	
	
	//CACHE 常量--------------------------------------------
	const CACHE_ALLPASSCITIES = 'cache_all_pass_cities'; //所有站点
	
	//---------------------------------------------------------
	const TODAYFIRSTMONEY='todayfirstmoney';//截止到今天首款应付金额
	const TODAYSECONDMONEY='todaysecondmoney';//截止到今天二款应付金额
	const TODAYLASTMONEY='todaylastmoney';//截止到今天尾款应付金额
	const TODAYESTIMATEFIRSTMONEY='todayestimatefirstmoney';//截止到今天预估首款应付金额
	const TODAYESTIMATESECONDMONEY='todayestimatesecondmoney';//截止到今天预估二款应付金额
	const TODAYESTIMATELASTMONEY='todayestimatelastmoney';//截止到今天预估尾款应付金额
	const WEEKESTIMATEMONEY='weekEstimateMoney';//本周内的预估金额
	const MISTOPESTIMATEMONEY='mistopEstimateMoney';//半年内的预估金额
	
	
	
}