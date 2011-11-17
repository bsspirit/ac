<?php
$this->pageTitle=Yii::app()->name . ' - 工程案例'; 
$this->breadcrumbs=array(
	'工程案例',
);

$this->menu=array(
	'menu'=>array('cid'=>5),
	'contact'=>array(), 
	'friend'=>array(),
);

?>

<div class="mybox">
	 <div class="title">
	 	<strong class="name"><?php echo $title?></strong>
	 </div>
	 <div class="content">
		<div class="view">
			<ul class="pic_ul">
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_pic_view',
				)); ?>
			</ul>
			<div class="c"></div>
		</div>
	 </div> 
</div>
