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
		<div class="view">
			<ul class="pic_ul">
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_pic_view',
				)); ?>
			</ul>
		</div>
		<div class="c"></div>
	 </div> 
</div>
