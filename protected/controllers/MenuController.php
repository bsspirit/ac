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
				'actions'=>array('menuTree','menuList','menuNav','menuChildren'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('index','upname','move'),
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
	public function actionMenuList($cid=null){
		$cats=Catalog::model()->findAll();
		$json = array();
		foreach ($cats as $cat){
			$line = '{';
			$line .='id:'.$cat->id.',name:"'.$cat->name.'"';
			if(!empty($cid) && $cid == $cat->id){
				$line .= ',selected:true';
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
	public function actionMenuNav($cid=null){
		$rels=CatalogRel::model()->findAll();
		$json = array();
		foreach ($rels as $rel){
			$line = '{';
			$line .='id:'.$rel->sid.',pId:'.$rel->pid.',name:"'.$rel->son->name.'"'.',path:"'.$rel->son->path.'"';
			$line .= '}';
			array_push($json, $line);
		}
		echo CJSON::encode($json);
		Yii::app()->end(); 
	}
	
	/*
	 * //SELECT r.pid,r.sid,c.name,c.path FROM t_ac_catalog_rel r, t_ac_catalog c
	 *	//WHERE pid=4 AND r.sid=c.id
	 * //UNION 
	 * //SELECT r3.pid,r3.sid,c3.name,c3.path FROM t_ac_catalog_rel r3, t_ac_catalog c3
	 * //WHERE r3.pid IN (SELECT sid FROM t_ac_catalog_rel r2 WHERE r2.pid=4) AND r3.sid=c3.id
	 */
	public function actionMenuChildren($cid=null){
		$sql = " SELECT r.pid,r.sid,c.name,c.path FROM t_ac_catalog_rel r, t_ac_catalog c WHERE pid=".$cid." AND r.sid=c.id";
		$sql .= " UNION"; 
		$sql .= " SELECT r3.pid,r3.sid,c3.name,c3.path FROM t_ac_catalog_rel r3, t_ac_catalog c3 WHERE r3.pid IN (SELECT sid FROM t_ac_catalog_rel r2 WHERE r2.pid=".$cid.") AND r3.sid=c3.id";
		
		$conn=Yii::app()->db;
		$command = $conn->createCommand($sql);
		$rows=$command->queryAll();
		
		$json = array();
		foreach ($rows as $row){
			$line = '{';
			$line .='id:'.$row['sid'].',pId:'.$row['pid'].',name:"'.$row['name'].'"'.',path:"'.$row['path'].'"';
			$line .= '}';
			array_push($json, $line);
		}
		echo CJSON::encode($json);
		Yii::app()->end(); 
	}

	
}