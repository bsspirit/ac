<?php
$this->breadcrumbs=array(
	'产品介绍',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1>产品介绍</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_intro_view',
)); ?>
