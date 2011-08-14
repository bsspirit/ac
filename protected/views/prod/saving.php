<?php
$this->breadcrumbs=array(
	'节能环保',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1>节能环保</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_saving_view',
)); ?>
