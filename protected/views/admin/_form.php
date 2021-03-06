<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prod-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span>必填字段</p>

	<?php echo $form->errorSummary($model); ?>

	<div id="catelog_list" class="row" select="<?php echo $model->catid?>"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_image'); ?>
		<?php echo $form->radioButtonList($model,'show_image',array('1'=>'显示','0'=>'不显示'),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;', 'labelOptions'=>array('style'=>'display:inline')));?>
		<div class="row">
		<?php if(!empty($model['image_url'])){?>
		<img width="200px" src="<?php echo Yii::app()->request->baseUrl.$model['image_url']?>"/>
		<?php } else {?>
		<img width="200px" src="/images/empty.png"/>
		<?php } ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<textarea name="content" style="width:800px;height:400px;visibility:hidden;"><?php echo $model->content?></textarea>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<textarea name="description" style="width:800px;height:200px;visibility:hidden;"><?php echo $model->description?></textarea>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/menulist.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/editor/kindeditor-min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/editor/zh_CN.js"></script>
<script type="text/javascript">
var editor_content;
var editor_desc;
KindEditor.ready(function(K) {
	editor_content = K.create('textarea[name="content"]', {
		uploadJson : path+'/admin/upload',
		fileManagerJson : 'manager',
		allowFileManager : false
	});

	editor_desc = K.create('textarea[name="description"]', {
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : false,
		items : [
			'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', 'link']
	});
});

</script>