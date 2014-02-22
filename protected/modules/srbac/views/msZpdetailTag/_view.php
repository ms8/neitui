<?php
/* @var $this MsZpdetailTagController */
/* @var $data MsZpdetailTag */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zp_detailid')); ?>:</b>
	<?php echo CHtml::encode($data->zp_detailid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_code')); ?>:</b>
	<?php echo CHtml::encode($data->tag_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_name')); ?>:</b>
	<?php echo CHtml::encode($data->tag_name); ?>
	<br />


</div>