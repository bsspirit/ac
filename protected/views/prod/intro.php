<?php
$this->breadcrumbs=array(
	'产品介绍',
);

$this->menu=array(
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>产品介绍</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_intro_view',
)); ?>
