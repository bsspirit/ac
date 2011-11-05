<?php
$this->pageTitle=Yii::app()->name .' - '. $model->title;

$cat = "";
$path = "";
if($model->catid==1){
	$cat='产品介绍';
	$path='prod/intro';
}elseif ($model->catid==2){
	$cat='节能环保';
	$path='prod/saving';
}elseif($model->catid==3){
	$cat='施工安装';
	$path='prod/setup';
}elseif($model->catid==4){
	$cat='保养维修';
	$path='prod/maintain';
}elseif($model->catid==5){
	$cat='工程案例';
	$path='prod/case';
}elseif($model->catid==6){
	$cat='行业新闻';
	$path='prod/news';
}else{
	$cat='产品介绍';
	$path='prod/intro';
}


$this->breadcrumbs=array(
	$cat=>array($path),
	$model->title,
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>
<div class="mybox">
	 <div class="title">
	 	<strong class="name"><?php echo $model->title?></strong>
	 </div>
	 <div class="content">
		发布日间：<?php echo $model->create_date?><br/><br/>
		<?php if(!empty($model->image_url)){?>
		<p><img width="400"border="0" src="<?php echo Yii::app()->request->baseUrl.$model->image_url ?>"/></p>
		<?php }?>
		<br/>
		<p>
			<?php echo $model->content?>
		</p>
	 </div> 
</div>

