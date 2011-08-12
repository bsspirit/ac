<?php
$this->breadcrumbs=array(
	'节能环保',
);

$this->menu=array(
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>节能环保</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_saving_view',
)); ?>
