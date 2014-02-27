<?php
/* @var $this MsJobsController */
/* @var $model MsJobs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-jobs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bumen'); ?>
		<?php echo $form->textField($model,'bumen',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salary'); ?>
		<?php echo $form->textField($model,'salary',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'citycode'); ?>
		<?php echo $form->textField($model,'citycode',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'citycode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cityname'); ?>
		<?php echo $form->textField($model,'cityname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cityname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->