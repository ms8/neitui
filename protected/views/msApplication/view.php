<?php
/* @var $this MsApplicationController */
/* @var $model MsApplication */

$this->breadcrumbs=array(
	'Ms Applications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MsApplication', 'url'=>array('index')),
	array('label'=>'Create MsApplication', 'url'=>array('create')),
	array('label'=>'Update MsApplication', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MsApplication', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MsApplication', 'url'=>array('admin')),
);
?>

<h1>View MsApplication #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'member_id',
		'job_id',
		'company_id',
		'jianli_id',
		'response',
		'createtime',
	),
)); ?>
