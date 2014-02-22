<?php
/* @var $this MsZpdetailController */
/* @var $model MsZpdetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ms-zpdetail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <label for="MsZpdetail_zpId">所属招聘会</label>
        <input id="MsZpdetail_zpId" type="hidden" name="MsZpdetail[zpId]" >
        <select name="zpId" id="zpId" >
            <?php
            foreach($zhaopinhuis as $zp){
                ?>
                <option value="<?php echo $zp->id?>"><?php echo $zp->name?></option>
            <?php
            }
            ?>

        </select>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'companyId'); ?>
		<?php echo $form->textField($model,'companyId',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'companyId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apply'); ?>
		<?php echo $form->textField($model,'apply',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'apply'); ?>
	</div>

    <div class="row">
        <?php echo
        $form->checkBoxList($model,'tags',
            $zpTags,
            array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                'labelOptions'=>array('class'=>'labelForRadio')));

        ?>
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
        var zpId = $("#zpId  option:selected").val();
        $("#MsZpdetail_zpId").val(zpId);
    });
</script>