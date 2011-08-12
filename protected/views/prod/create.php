<?php
$this->breadcrumbs=array(
	'Prods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prod', 'url'=>array('index')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>Create Prod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>