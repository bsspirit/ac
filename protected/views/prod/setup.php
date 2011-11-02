<?php
$this->pageTitle=Yii::app()->name . ' - 施工安装'; 
$this->breadcrumbs=array(
	'施工安装',
);

$this->menu=array(
	'menu'=>array('cid'=>3),
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1><?php echo $title?></h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
