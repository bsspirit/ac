<?php
$this->breadcrumbs=array(
	'工程案例',
);

$this->menu=array(
	'menu'=>array('cid'=>5),
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);

?>

<h1><?php echo $title?></h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
