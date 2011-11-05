<?php
$this->pageTitle=Yii::app()->name . ' - 行业新闻'; 
$this->breadcrumbs=array(
	'行业新闻',
);

$this->menu=array(
	'contact'=>array(), 
	'intro'=>array(),
	'friend'=>array(),
);
?>
<div class="mybox">
	 <div class="title">
	 	<strong class="name"><?php echo $title?></strong>
	 </div>
	 <div class="content">
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
	 </div> 
</div>

