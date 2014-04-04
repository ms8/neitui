<?php
/* @var $this KrzWeightController */
/* @var $model KrzWeight */

$this->breadcrumbs=array(
	'Krz Weights'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KrzWeight', 'url'=>array('index')),
	array('label'=>'Create KrzWeight', 'url'=>array('create')),
	array('label'=>'Update KrzWeight', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KrzWeight', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KrzWeight', 'url'=>array('admin')),
);
?>

<h1>View KrzWeight #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cid',
		'cname',
		'weight',
		'citycode',
		'createtime',
		'updatetime',
	),
)); ?>
