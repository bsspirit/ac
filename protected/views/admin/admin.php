<?php
$this->breadcrumbs=array(
	'产品列表'=>array('index'),
	'产品管理',
);

$this->menu=array(
	array('label'=>'产品列表', 'url'=>array('index')),
	array('label'=>'增加产品', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prod-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>产品管理</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prod-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'catid',
		'title',
		'content',
		'image_url',
		'description',
		/*
		'create_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
