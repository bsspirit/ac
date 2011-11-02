<?php
$this->pageTitle=Yii::app()->name . ' - 登陆';
$this->breadcrumbs=array(
	'用户登陆', 
);
?>

<h1>用户登陆</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><span class="required">*</span>为必填项</p>

	<div class="row">
		<?php echo $form->labelEx($model,'用户名'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'记住密码'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('登陆'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
