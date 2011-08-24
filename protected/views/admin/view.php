<?php
$this->breadcrumbs=array(
	'产品列表'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'产品列表', 'url'=>array('index')),
	array('label'=>'增加产品', 'url'=>array('create')),
	array('label'=>'更新产品', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除产品', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确认删除产品!')),
	array('label'=>'管理产品', 'url'=>array('admin')),
);
?>

<h1>View Prod #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catid',
		'title',
		'content',
		'image_url',
		'description',
		'create_date',
	),
)); ?>
