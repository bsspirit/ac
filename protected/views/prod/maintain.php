<?php
$this->breadcrumbs=array(
	'保养维修',
);

$this->menu=array(
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>保养维修</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
