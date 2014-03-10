<?php
/* @var $this MsStudentsController */
/* @var $model MsStudents */

$this->breadcrumbs=array(
	'Ms Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsStudents', 'url'=>array('index')),
	array('label'=>'Create MsStudents', 'url'=>array('create')),
	array('label'=>'View MsStudents', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MsStudents', 'url'=>array('admin')),
);
?>

<h1>Update MsStudents <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>