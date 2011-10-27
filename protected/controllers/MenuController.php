<?php

class MenuController extends Controller{
	
	public $layout='//layouts/column1';
	
	public function filters(){
		return array(
			'accessControl',
		);
	}

	public function accessRules(){
		return array(
			array('allow',
				'actions'=>array('index','menuTree','menuList','upname','move'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	
	public function actionUpname(){
		if(isset($_GET['name'])){
			$cat=Catalog::model()->findByPk($_GET['catid']);
			$cat->name=$_GET['name'];
			$cat->save();
		}
		
		$this->redirect(array('index'));
	}
	
	public function actionMove(){
		if(isset($_GET['pid'])){
			$rel=CatalogRel::model()->findByPk($_GET['id']);
			$rel->pid=$_GET['pid'];
			$rel->save();
		}
		
		$this->redirect(array('index'));
	}
	
	public function actionIndex(){
		$model=new CatalogRel();
		$this->render('index', array(
			'model'=>$model,
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
			$line .='id:'.$rel->sid.',pId:'.$rel->pid.',name:"'.$rel->sid.':'.$rel->son->name.'"';
			if($rel->pid==0){
				$line .= ',drag:false';
			}
			$line .= '}';
			array_push($json, $line);
		}
		echo CJSON::encode($json);
		Yii::app()->end(); 
	}
	
	/*
	 * 下拉列表JSON
	 */
	public function actionMenuList(){
		$cats=Catalog::model()->findAll();
		$json = array();
		foreach ($cats as $cat){
			$line = '{';
			$line .='id:'.$cat->id.',name:"'.$cat->name.'"';
			$line .= '}';
			array_push($json, $line);
		}
		echo CJSON::encode($json);
		Yii::app()->end(); 
	}

	
}