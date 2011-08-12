<?php
$this->breadcrumbs=array(
	'Prods'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prod', 'url'=>array('index')),
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'View Prod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>Update Prod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>