<?php
$this->breadcrumbs=array(
	'Prods',
);

$this->menu=array(
	array('label'=>'Create Prod', 'url'=>array('create')),
	array('label'=>'Manage Prod', 'url'=>array('admin')),
);
?>

<h1>Prods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
