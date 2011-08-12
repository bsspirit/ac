<?php
$this->breadcrumbs=array(
	'工程案例',
);

$this->menu=array(
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>工程案例</h1>

<?php $this->widget('application.widgets.testWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
