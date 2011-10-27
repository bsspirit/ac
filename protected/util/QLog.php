<?php
class QLog
{
	
	/**
	 * 记录日志
	 */
	public static function savelog($model,$op ,$remark)
	{
		$log = new ErpLog();
		$log->module = Yii::app()->getController()->getModule()->getId();
		$log->model = $model->tableName();
		$log->city_id = Yii::app()->user->city_id;
		$log->opname = Yii::app()->user->name;
		$log->modelkey =$model->id;
		$log->create_time = time() ;
		$log->remark = $remark;
		$log->ip = Utility::GetRemoteIp();
		
		if($op=='insert')
		{
			$log->content = serialize($model);
		}else if($op=='update')
		{
			$oldmodel = $model->findByPk($model->id);
		    $log->content = self::checkDiff($oldmodel, $model);
		}else
		{
			$log->content = 'delete';
		}
		if(!empty($log->content))
		{
			$log->save();
		}
	}
	
	/**
	 * 比较两个AR的不同
	 * @param unknown_type $oldmodel
	 * @param unknown_type $newmodel
	 */
    private static function checkDiff($oldmodel,$newmodel)
    {
        $ret = '';
        $count = 0;
        if(isset($oldmodel))
        {
            foreach($newmodel as $key => $newval)
            {
            	//去掉空格
            	$newval = preg_replace("/(\s+)/",'',$newval);
                $oldval = preg_replace("/(\s+)/",'',$oldmodel[$key]);
                
                if($newval!=$oldval)
                {
                    if($count==5)
                    {
                        $ret=$ret.$key.'='.$newmodel[$key].'|'.'<br>';
                        $count=0;
                    }else 
                    {
                        $count++;
                        $ret=$ret.$key.'='.$newmodel[$key].'|';
                    }
                }
            }
        }
        return $ret;
    }
    
    
	/**
	 * 批量导入mongodb
	 */
	public static function batchInsertMG()
	{
		//分批导入
		$totel =  ErpLog::model()->count();
		$percount = 500;
		$page = $totel / $percount;
		
		for($i=0;$i<=$page;$i++)
		{
			$offset = $i*$percount;
			
			$models = ErpLog::model()->findAll(array('limit'=>$percount,'offset'=>$offset,'order'=>'id'));
			if(!$models) return;
			$client = new MongonClient();
			$client->batchInsert($models);
			
			echo "BatchNo:".$i." coping ".$percount."\n";
			
			 //删除导完的日志
			 //sleep(1);	
			 //ErpLog::model()->deleteAll(array('limit'=>$percount,'order'=>'id'));
		}
	}
	
	/**
	 * 删除日志
	 */
	public static function deleteLogs()
	{
		ErpLog::model()->deleteAll();
		
		echo "delete log success!\n";
	}
	
	/**
	 * 查询日志
	 */
	public static function queryLog($model)
	{
		$client = new MongonClient($config);
		return $client->query($model);
	}
}