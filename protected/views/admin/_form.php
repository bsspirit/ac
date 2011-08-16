<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/wymeditor/jquery.wymeditor.pack.js"></script>
<script type="text/javascript"> 
jQuery(function() {
    jQuery('.wymeditor').wymeditor();

    function submit(){
		alert('faefae');
    }
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>必填字段</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php echo $form->dropDownList($model,'catid',$model->getCatalogOptions()); ?>
		<?php echo $form->error($model,'catid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<textarea class="wymeditor" name="Prod[content]"><?php echo CHtml::encode($model->content)?></textarea>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存' ,array('onclick'=>'jQuery.wymeditors(0).update();')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->