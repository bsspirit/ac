<?php
$this->breadcrumbs=array(
	'产品列表'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'产品列表', 'url'=>array('index')),
	array('label'=>'增加产品', 'url'=>array('create')),
	array('label'=>'查看详情', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理产品', 'url'=>array('admin')),
);
?>

<h1>产品更新  #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>