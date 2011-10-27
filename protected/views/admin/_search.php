<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/menulist.js"></script>
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div id="catelog_list" class="row"></div>
	</div>
	
	<div class="row">
		ID：&nbsp;&nbsp;
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		标题：&nbsp;&nbsp;
		<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton('搜索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>