<?php
class TaskCommand extends CConsoleCommand {
	
	public function run($args) {
		echo 'afdafda';
		
//		$runner = $this->getCommandRunner();
//		$commands = $runner->commands;
//		if (isset ( $args [0] ))
//			$name = strtolower ( $args [0] );
//		if (! isset ( $args [0] ) || ! isset ( $commands [$name] )) {
//			if (! emptyempty ( $commands )) {
//				echo "Yii command runner (based on Yii";
//			}
//		}

		$catid = 1;
		$data = new CActiveDataProvider('Prod', array(
			'criteria'=>array(
				'select'=>'id, catid, title, content, image_url, description, create_date',
				'condition'=>' catid = :catid',
				'params'=>array(':catid'=>$catid),
				'order'=>'create_date desc',
			),
			'pagination'=>array(
			    'pageSize'=>20,
			 ),
		));
		$rows = $data->getData();
		foreach($rows as $row){
			echo $row->id."\n";	
		}
		
	}
	
	public function actionInit() { 
		echo 'fidaojfidafjiajo';
	}
}