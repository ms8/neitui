<?php
/* @var $this MsStudentsController */
/* @var $model MsStudents */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-students-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mid'); ?>
		<?php echo $form->textField($model,'mid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graduatetime'); ?>
		<?php echo $form->textField($model,'graduatetime'); ?>
		<?php echo $form->error($model,'graduatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hasoffer'); ?>
		<?php echo $form->textField($model,'hasoffer',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'hasoffer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'universitytype'); ?>
		<?php echo $form->textField($model,'universitytype',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'universitytype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'universityname'); ?>
		<?php echo $form->textField($model,'universityname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'universityname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jianglitype'); ?>
		<?php echo $form->textField($model,'jianglitype',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'jianglitype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jiangliname'); ?>
		<?php echo $form->textField($model,'jiangliname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'jiangliname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projects'); ?>
		<?php echo $form->textField($model,'projects',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'projects'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peixun'); ?>
		<?php echo $form->textField($model,'peixun',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'peixun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createtime'); ?>
		<?php echo $form->textField($model,'createtime'); ?>
		<?php echo $form->error($model,'createtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->