<?php
$this->pageTitle=Yii::app()->name . ' - 产品介绍'; 
$this->breadcrumbs=array(
	'产品介绍',
);

$this->menu=array(
	'menu'=>array('cid'=>1),
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1><?php echo $title?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_intro_view',
)); ?>
