<?php
$this->breadcrumbs=array(
	'施工安装',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1>施工安装</h1>

<?php $this->widget('application.widgets.picWidget',array(
	'dataProvider'=>$dataProvider,
)); ?>
