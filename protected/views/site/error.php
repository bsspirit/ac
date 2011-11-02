<?php
$this->pageTitle=Yii::app()->name . ' - 出错了';
$this->breadcrumbs=array(
	'出错了',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>