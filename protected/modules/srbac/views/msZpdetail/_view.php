<?php
/* @var $this MsZpdetailController */
/* @var $data MsZpdetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zpId')); ?>:</b>
	<?php echo CHtml::encode($data->zpId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('companyId')); ?>:</b>
	<?php echo CHtml::encode($data->companyId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apply')); ?>:</b>
	<?php echo CHtml::encode($data->apply); ?>
	<br />

</div>