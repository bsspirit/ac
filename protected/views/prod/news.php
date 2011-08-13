<?php
$this->breadcrumbs=array(
	'行业新闻',
);

//$this->menu=array(
//	array('label'=>'Create Prod', 'url'=>array('create')),
//	array('label'=>'Manage Prod', 'url'=>array('admin')),
//);

$this->menu=array('contact','intro');
?>

<h1>行业新闻</h1>

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

//$this->widget('zii.widgets.grid.CGridView', array(
//	'id'=>'grid1',
//	'dataProvider'=>$model->search(),
//	'columns'=>array(
//		array(
//            'name'=>'id',
//        	'header'=>'序号',
//        ),
//        'contract_id',
//		array(
//        	'header'=>'摘要',
//			'value'=>'$data->team_id."  ".QHtml::getSettleTimes($data->times)."  ".QHtml::utf8Substr($data->team_title,0,30)."..."'
//        ),
//        array(
//            'name'=>'end_time',
//        	'header'=>'下线时间',
//        	'value'=>'empty($data->end_time)?(empty($data->team)?"":QHtml::dateFormat($data->team->end_time)):QHtml::dateFormat($data->end_time)',
//        ),
//        array(
//            'name'=>'city_id',
//        	'header'=>'城市',
//        	'value'=>'QCity::get_city($data->city_id,"name")',
//        ),
//        array(
//            'name'=>'parnter_id',
//        	'header'=>'商家',
//        	'value'=>'empty($data->partner)?"":$data->partner->title',
//        ),
//        array(
//            'name'=>'money',
//        	'header'=>'实际结款额',
//        	'value'=>'($data->times=="advance")?$data->money:($data->money + $data->manual_money - $data->deduction_money)',
//        ),
//        array(
//            'name'=>'confirm_time',
//        	'header'=>'结款确认时间',
//        	'value'=>'QHtml::dateFormat($data->confirm_time)',
//        ),
//        'confirm_remark',
//      	array(
//			'class'=>'CButtonColumn',
//			'header'=>'操作',
//			'buttons'=>array(
//			 	'strike'=>array(
//		           	'label'=>'结算',	
//		           	'imageUrl'=>false,
//	      		 	'options'=>array('onclick'=>'strike(this)'),
//	               ),
//	            'upload'=>array(
//		           		'label'=>'支付凭证',	
//        		   		'url'=>'Yii::app()->controller->createUrl("/boss/balance/uploadPic",array("id"=>$data->id))',
//		           		'imageUrl'=>false,
//	               	),
//               ),
//        		'template' =>$model->state=='success'?'{upload}':'{strike} {upload}',
//              	'htmlOptions'=>array(
//		        'style'=>'width:100px;'
//		    ),
//		),
//	),
//));
?>

