<?php
/* @var $this MsJobsController */
/* @var $model MsJobs */

$this->breadcrumbs=array(
	'Ms Jobs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsJobs', 'url'=>array('index')),
	array('label'=>'Create MsJobs', 'url'=>array('create')),
	array('label'=>'View MsJobs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MsJobs', 'url'=>array('admin')),
);
?>

<h1>Update MsJobs <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>