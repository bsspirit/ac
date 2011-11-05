<?php
$this->pageTitle=Yii::app()->name . ' - 施工安装'; 
$this->breadcrumbs=array(
	'施工安装',
);

$this->menu=array(
	'menu'=>array('cid'=>3),
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
		<?php $this->widget('application.widgets.picWidget',array(
			'dataProvider'=>$dataProvider,
		)); ?>
	 </div> 
</div>
