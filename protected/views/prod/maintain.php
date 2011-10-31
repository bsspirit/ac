<?php
$this->breadcrumbs=array(
	'保养维修',
);

$this->menu=array(
	'menu'=>array('cid'=>4),
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1><?php echo $title?></h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
