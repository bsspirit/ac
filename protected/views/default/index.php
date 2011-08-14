<?php 
$this->pageTitle=Yii::app()->name . ' - 首页'; 
$left_box=array(
	'intro'=>array(),
	'contact'=>array(), 
	'friend'=>array(),
);

$content_box=array(
	'case'=>$case,
	'news'=>$news->getData(),
	'prod'=>$prod,
);
?>

<div id="sideleft">
	<?php 
		$this->widget('application.widgets.sideWidget',array(
			'pages'=>$left_box,
		));
	?>
</div>

<div id="middle2">	
	<?php 
		$this->widget('application.widgets.sideWidget',array(
			'pages'=>$content_box,
		));
	?>
</div>
