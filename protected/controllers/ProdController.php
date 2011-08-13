<?php

class ProdController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','intro','saving','setup','maintain','case','news','detail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function filterIntro($filterChain)
	{
		echo 'filter';
		$filterChain->run();
	}
	
	/*
	 * 产品介绍,1
	 */
	public function actionIntro()
	{
		$dataProvider=$this->getProdsByCatId(1,20);
		$this->render('intro',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 节能环保,2
	 */
	public function actionSaving()
	{
		$dataProvider=$this->getProdsByCatId(2,20);
		$this->render('saving',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 施工安装,3
	 */
	public function actionSetup()
	{
		$dataProvider=$this->getProdsByCatId(3,2000);
		$this->render('setup',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 保养维修,4
	 */
	public function actionMaintain()
	{
		$dataProvider=$this->getProdsByCatId(4,2000);
		$this->render('maintain',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 施工安装,5
	 */
	public function actionCase()
	{
		$dataProvider=$this->getProdsByCatId(5,2000);
		$this->render('case',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 行业新闻,6
	 */
	public function actionNews()
	{
		$dataProvider=$this->getProdsByCatId(6,40);
		$this->render('news',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/*
	 * 详细信息
	 */
	public function actionDetail()
	{
		$this->render('detail',array(
			'model'=>$this->loadModel($_GET['pid']),//$_GET['pid']),
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
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prod;

		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);

		if(isset($_POST['Prod']))
		{
			$model->attributes=$_POST['Prod'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prod']))
		{
			$model->attributes=$_POST['Prod'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Prod');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prod('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prod']))
			$model->attributes=$_GET['Prod'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Prod::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prod-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
