<?php
$this->breadcrumbs=array(
	'行业新闻',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>

<h1><?php echo $title?></h1>

<?php 

$this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'grid-news',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'class'=>'CLinkColumn',
			'header'=>'标题',
			'labelExpression'=>'CHtml::encode($data->title)',
			'urlExpression'=>'Yii::app()->createUrl("prod/detail",array("pid"=>$data->id))',
		),
		array(
			'header'=>'日期',
			'value'=>'date("Y-m-d",strtotime($data->create_date))',
		),
	),
));
?>

