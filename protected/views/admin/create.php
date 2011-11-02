<?php
$this->breadcrumbs=array(
	'后台管理控制台'=>array('admin/index'),
	'增加产品', 
);

$this->menu=array(
	array('label'=>'后台管理控制台', 'url'=>array('admin/index')),
	array('label'=>'产品管理', 'url'=>array('admin')),
);
?>

<h1>增加产品</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>