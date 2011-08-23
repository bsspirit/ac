<?php
$this->breadcrumbs=array(
	'产品列表'=>array('index'),
	'增加产品',
);

$this->menu=array(
	array('label'=>'产品列表', 'url'=>array('index')),
	array('label'=>'产品管理', 'url'=>array('admin')),
);
?>

<h1>增加产品</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>