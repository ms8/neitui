<?php
/* @var $this MsStudentsController */
/* @var $model MsStudents */

$this->breadcrumbs=array(
	'Ms Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MsStudents', 'url'=>array('index')),
	array('label'=>'Create MsStudents', 'url'=>array('create')),
	array('label'=>'Update MsStudents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MsStudents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MsStudents', 'url'=>array('admin')),
);
?>

<h1>View MsStudents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mid',
		'username',
		'graduatetime',
		'hasoffer',
		'universitytype',
		'universityname',
		'jianglitype',
		'jiangliname',
		'projects',
		'peixun',
		'createtime',
		'updatetime',
	),
)); ?>
