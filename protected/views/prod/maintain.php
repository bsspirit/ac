<?php
$this->breadcrumbs=array(
	'保养维修',
);

//$this->menu=array(
//	array('label'=>'Create Prod', 'url'=>array('create')),
//	array('label'=>'Manage Prod', 'url'=>array('admin')),
//);

$this->menu=array('contact','intro');
?>

<h1>保养维修</h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
