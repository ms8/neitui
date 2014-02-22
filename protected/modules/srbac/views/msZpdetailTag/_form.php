<?php
/* @var $this MsZpdetailTagController */
/* @var $model MsZpdetailTag */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-zpdetail-tag-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'zp_detailid'); ?>
		<?php echo $form->textField($model,'zp_detailid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'zp_detailid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_code'); ?>
		<?php echo $form->textField($model,'tag_code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tag_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_name'); ?>
		<?php echo $form->textField($model,'tag_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tag_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->