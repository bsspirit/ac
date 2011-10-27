<?php
$this->breadcrumbs=array(
	'产品列表',
);

$this->menu=array(
	array('label'=>'增加产品', 'url'=>array('create')),
	array('label'=>'管理产品', 'url'=>array('admin')),
);
?>

<h1>产品列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
