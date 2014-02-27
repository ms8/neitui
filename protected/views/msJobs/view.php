<?php
/* @var $this MsJobsController */
/* @var $model MsJobs */

$this->breadcrumbs=array(
	'Ms Jobs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MsJobs', 'url'=>array('index')),
	array('label'=>'Create MsJobs', 'url'=>array('create')),
	array('label'=>'Update MsJobs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MsJobs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MsJobs', 'url'=>array('admin')),
);
?>

<h1>View MsJobs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'bumen',
		'salary',
		'citycode',
		'cityname',
		'description',
		'createtime',
	),
)); ?>
