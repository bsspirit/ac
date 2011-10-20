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
				'actions'=>array('index','menuTree'),
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
	
	/*
	 * 菜单树型JSON
	 */
	public function actionMenuTree(){
		$rels=CatalogRel::model()->findAll();
		$json = array();
		foreach ($rels as $rel){
			$line = '{';
			$line .='id:'.$rel->sid.',pId:'.$rel->pid.',name:"a'.$rel->sid.'"';
			if($rel->pid==0){
				$line .= ',drag:false';
			}
			$line .= '}';
			array_push($json, $line);
		}
		echo CJSON::encode($json);
		Yii::app()->end(); 
	}

	
}