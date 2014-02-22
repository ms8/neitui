<?php
/* @var $this MsZhaopinhuiController */
/* @var $model MsZhaopinhui */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-zhaopinhui-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <?php echo $form->labelEx($model,'activity_date');
    $this->widget('application.extensions.timepicker.timepicker', array(
        'model'=>$model,
        'name'=>'activity_date',
    ));
    ?>


    <div class="row">
		<?php echo $form->labelEx($model,'activity_address'); ?>
		<?php echo $form->textField($model,'activity_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'activity_address'); ?>
	</div>


    <div class="row">
        <label for="MsZhaopinhui_status">是否有效</label>
        <input id="MsZhaopinhui_status" type="hidden" name="MsZhaopinhui[status]" >
        <select name="enable" id="enable" >
            <option value="1" selected>是</option>
            <option value="0">否</option>
        </select>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row buttons">
        <?php if($model->isNewRecord) {?>
            <input type="submit" value="新建"  class="btn" id="createBt">
        <?php }else {?>
            <input type="submit" value="保存"  class="btn" id="createBt">
        <?php }?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $("#createBt").live("click",function(){
        var enable = $("#enable  option:selected").val();
        $("#MsZhaopinhui_status").val(enable);
    });
</script>