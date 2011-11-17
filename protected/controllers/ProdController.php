<?php

class ProdController extends Controller
{
	public $layout='//layouts/column4';

	/*
	 * 产品介绍,1
	 */
	public function actionIntro($cid=1)
	{
		$dataProvider=$this->getProdsByCatId($cid,10);
		$this->render('intro',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 节能环保,2
	 */
	public function actionSaving($cid=2)
	{
		$dataProvider=$this->getProdsByCatId($cid,10);
		$this->render('saving',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 施工安装,3
	 */
	public function actionSetup($cid=3)
	{
		$dataProvider=$this->getProdsByCatId($cid,20);
		$this->render('setup',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 保养维修,4
	 */
	public function actionMaintain($cid=4)
	{
		$dataProvider=$this->getProdsByCatId($cid,20);
		$this->render('maintain',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 施工安装,5
	 */
	public function actionCase($cid=5)
	{
		$dataProvider=$this->getProdsByCatId($cid,20);
		$this->render('case',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 行业新闻,6
	 */
	public function actionNews($cid=6)
	{
		$dataProvider=$this->getProdsByCatId($cid,30);
		$this->render('news',array(
			'dataProvider'=>$dataProvider,
			'title'=>$this->getCatalog($cid)->name,
		));
	}
	/*
	 * 详细信息
	 */
	public function actionDetail()
	{
		$this->render('detail',array(
			'model'=>$this->loadModel($_GET['pid']),
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
				'order'=>'id desc',
			),
			'pagination'=>array(
			    'pageSize'=>$page,
			 ),
		));
	}
	
	public function loadModel($id){
		$model=Prod::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	private function getCatalog($id){
		return Catalog::model()->findByPk($id);
	}
}
