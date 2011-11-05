<?php
$this->pageTitle=Yii::app()->name . ' - 产品介绍'; 
$this->breadcrumbs=array(
	'产品介绍',
);

$this->menu=array(
	'menu'=>array('cid'=>1),
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
			'itemView'=>'_intro_view',
		)); ?>
	 </div> 
</div>
