<?php
/* @var $this MsJobsController */
/* @var $model MsJobs */

$this->breadcrumbs=array(
	'Ms Jobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsJobs', 'url'=>array('index')),
	array('label'=>'Manage MsJobs', 'url'=>array('admin')),
);
?>

<h1>Create MsJobs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>