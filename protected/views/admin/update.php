<?php
$this->breadcrumbs=array(
	'后台管理控制台'=>array('admin/index'),
	$model->title=>array('update','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'后台管理控制台', 'url'=>array('admin/index')),
	array('label'=>'增加产品', 'url'=>array('create')),
	array('label'=>'查看详情', 'url'=>array('/prod/detail', 'pid'=>$model->id)),
	array('label'=>'管理产品', 'url'=>array('admin')),
);
?>

<h1>产品更新  #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>