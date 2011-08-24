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

<h1>详细信息 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'catid',
			'value'=>$model->getCatalogOptions($model->catid),
		),
		'title',
		'image_url',
		'create_date',
	),
)); ?>

<b>内容：</b>
<div class="myview"><?php echo $model->content?></div>
<b>备注:</b>
<div class="myview"><?php echo $model->description?></div>

