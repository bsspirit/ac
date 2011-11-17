<?php

class AdminController extends Controller
{
	public $layout='//layouts/column2';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update','admin','delete','image','upload'),//'view'
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
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

//		$this->performAjaxValidation($model);

		if(isset($_POST['Prod']))
		{
			$model->attributes=$_POST['Prod'];
			if(isset($_POST['content'])){
				$model->content=$_POST['content'];
			}
			if(isset($_POST['description'])){
				$model->description=$_POST['description'];
			}
			if($model->save()){
				$this->redirect(array('admin'));
			}
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
			if(isset($_POST['content'])){
				$model->content=$_POST['content'];
			}
			if(isset($_POST['description'])){
				$model->description=$_POST['description'];
			}
			if($model->save()){
				$this->redirect(array('admin'));
			}
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
		if(isset($_GET['Prod'])){
			$model->attributes=$_GET['Prod'];
		}

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

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prod-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/*
	 * 上传文件
	 */
	public function actionImage()
	{
		$form = new UploadForm;
		$folder = '/upfiles/image/';
		$id = $_REQUEST['pid'];
		$model = $this->loadModel($id);
		if (isset($_POST['UploadForm'])) {
	        if ($form->validate()) {
	            $form->image = CUploadedFile::getInstance($form, 'image');
	            $name = $folder . $id . substr($form->image->name,strripos($form->image->name,'.'));
	            $file= dirname(Yii::app()->request->scriptFile) . $name;
	            $form->image->saveAs($file);
	            
	            $model->image_url=$name;
	            $model->save(false);
	        }
	    }
		$this->render('image',array(
			'model'=>$model,
			'form'=>$form,
		));
	}
	
	public function actionUpload(){
		$php_url = Yii::app()->request->baseUrl;
		$folder = '/upfiles/image2/';
		
		$ext_arr = array(//定义允许上传的文件扩展名
			'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
			'flash' => array('swf', 'flv'),
			'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
			'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
		);
		
		$max_size = 1024*1024;
		$save_path=realpath('.').$folder;//文件保存目录
		$save_url = $php_url . $folder;//文件保存目录URL

    	//有上传文件时
		if (empty($_FILES) === false) {
			$file_name = $_FILES['imgFile']['name'];//原文件名
			$tmp_name = $_FILES['imgFile']['tmp_name'];//服务器上临时文件名
			$file_size = $_FILES['imgFile']['size'];//文件大小
			
			if (!$file_name) {//检查文件名
				echo "请选择文件。";exit;
			}
			
			if (is_dir($save_path) === false) {//检查目录
				echo "上传目录不存在。";exit;
			}
			
			if (is_writable($save_path) === false) {//检查目录写权限
				echo "上传目录没有写权限。";exit;
			}

			if (is_uploaded_file($tmp_name) === false) {//检查是否已上传
				echo "临时文件可能不是上传文件。";exit;
			}
			
			if ($file_size > $max_size) {//检查文件大小
				echo "上传文件大小超过1MB限制。";exit;
			}

			$dir_name = empty($_REQUEST['dir']) ? 'image' : trim($_REQUEST['dir']); 
			if (empty($ext_arr[$dir_name])) {//检查目录名
				echo "目录名不正确。";exit;
			}
			
			//获得文件扩展名
			$temp_arr = explode(".", $file_name);
			$file_ext = array_pop($temp_arr);
			$file_ext = trim($file_ext);
			$file_ext = strtolower($file_ext);
			
			$new_file_name = date("YmdHis") . '_' . rand(1, 100) . '.' . $file_ext;//新文件名
			$file_path = $save_path . $new_file_name;//移动文件

			if (move_uploaded_file($tmp_name, $file_path) === false) {
				echo "上传文件失败。";exit;
			}
			
			chmod($file_path, 0644);
			$file_url = $save_url . $new_file_name;
			
			header('Content-type: text/html; charset=UTF-8');
			$json = array('error' => 0, 'url' => $file_url);
			echo CJSON::encode($json);
			Yii::app()->end(); 
		}
	}
}