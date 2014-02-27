<?php
/* @var $this MsJobsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Jobs',
);

$this->menu=array(
	array('label'=>'Create MsJobs', 'url'=>array('create')),
	array('label'=>'Manage MsJobs', 'url'=>array('admin')),
);
?>

<h1>Ms Jobs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
