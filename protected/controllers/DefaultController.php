<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$news = $this->getProdsByCatId(6,20);
		$case = $this->getProdsByCatId(5,8);
		$prod = $this->getProdsByCatId(1,8);
		$this->render('index', array(
			'news'=>$news,
			'case'=>$case,
			'prod'=>$prod,
		));
	}
	
	
	/*
	 * services
	 */
	private function getProdsByCatId($catid,$page){
		return new CActiveDataProvider('Prod', array(
			'criteria'=>array(
				'select'=>'id, catid, title, content, image_url, description, create_date',
				'condition'=>' catid = :catid',
				'params'=>array(':catid'=>$catid),
				'order'=>'create_date desc',
			),
			'pagination'=>array(
			    'pageSize'=>$page,
			 ),
		));
	}
}