<?php
$this->breadcrumbs=array(
	'产品列表'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'List Prod', 'url'=>array('index')),
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'View Prod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>产品更新<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>