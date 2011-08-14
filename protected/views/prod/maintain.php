<?php
$this->breadcrumbs=array(
	'保养维修',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1>保养维修</h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
