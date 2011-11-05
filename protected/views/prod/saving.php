<?php
$this->pageTitle=Yii::app()->name . ' - 节能环保'; 
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

<div class="mybox">
	 <div class="title">
	 	<strong class="name"><?php echo $title?></strong>
	 </div>
	 <div class="content">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_saving_view',
		)); ?>
	 </div> 
</div>
