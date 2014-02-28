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
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',
            array('size'=>60,'maxlength'=>100,'placeholder'=>'职位，必填信息')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
        <input id="MsJobs_citycode" type="hidden" name="MsJobs[citycode]" >
        <?php echo $form->labelEx($model,'citycode'); ?>
        <?php
            $citys = MsDictionary::model()->findAllByAttributes(array('type'=>'city'));
            foreach($citys as $city){
        ?>
             <input type="radio" name="city" <?php if($city->code=='beijing'){?>checked<?php }?>
                    value="<?php echo $city->code?>" /><?php echo $city->name?>
        <?php }?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo$form->textArea($model,'description',array('rows'=>12, 'cols'=>80)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row buttons">
        <input type="button" value="提交" id="submitbt" class="btn">
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    $("#submitbt").live('click',function(){
        var citycode = $('input[name="city"]:checked').val();
        $("#MsJobs_citycode").val(citycode);
        $("#ms-jobs-form").submit();
    });
</script>