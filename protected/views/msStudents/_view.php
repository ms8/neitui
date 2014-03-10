<?php
/* @var $this MsStudentsController */
/* @var $data MsStudents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mid')); ?>:</b>
	<?php echo CHtml::encode($data->mid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graduatetime')); ?>:</b>
	<?php echo CHtml::encode($data->graduatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasoffer')); ?>:</b>
	<?php echo CHtml::encode($data->hasoffer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('universitytype')); ?>:</b>
	<?php echo CHtml::encode($data->universitytype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('universityname')); ?>:</b>
	<?php echo CHtml::encode($data->universityname); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jianglitype')); ?>:</b>
	<?php echo CHtml::encode($data->jianglitype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiangliname')); ?>:</b>
	<?php echo CHtml::encode($data->jiangliname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projects')); ?>:</b>
	<?php echo CHtml::encode($data->projects); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peixun')); ?>:</b>
	<?php echo CHtml::encode($data->peixun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	*/ ?>

</div>