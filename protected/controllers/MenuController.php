<?php

class MenuController extends Controller{
	
	public $layout='//layouts/column2';
	
	public function filters(){
		return array(
			'accessControl',
		);
	}

	public function accessRules(){
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@'),
			),
		);
	}
	
	public function actionIndex(){
		$rel = new CatalogRel('search');

		$this->render('index', array(
			'tree'=>$rel->search(),
		));
	}

	
}