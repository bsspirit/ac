<?php
$this->breadcrumbs=array(
	'节能环保',
);

$this->menu=array(
	'menu'=>array('cid'=>2),
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1><?php echo $title?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_saving_view',
)); ?>
