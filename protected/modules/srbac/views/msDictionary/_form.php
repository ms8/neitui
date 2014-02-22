<?php
/* @var $this MsDictionaryController */
/* @var $model MsDictionary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-dictionary-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
<!--		--><?php //echo $form->labelEx($model,'type'); ?>
<!--		--><?php //echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
<!--		--><?php //echo $form->error($model,'type'); ?>
        <label for="MsDictionary_type">所属字典类型</label>
        <input id="MsDictionary_type" type="hidden" name="MsDictionary[type]" >
        <select name="dictionaryType" id="dictionaryType" >
            <?php
            foreach($dctypes as $dt){
                ?>
                <option value="<?php echo $dt->type?>"><?php echo $dt->name?></option>
            <?php
            }
            ?>

        </select>
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
        var dictionaryType = $("#dictionaryType  option:selected").val();
        $("#MsDictionary_type").val(dictionaryType);
    });
</script>