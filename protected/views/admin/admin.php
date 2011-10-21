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
	'columns'=>array(
		'id',
		array(
			'name'=>'catid',
			'header'=>'分类 ',
			'value'=>'empty($data->catalog->name)?"未分类":$data->catalog->name',
		),
		'title',
		array(
			'header'=>'图片',
			'value'=>'$data->image_url'
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
