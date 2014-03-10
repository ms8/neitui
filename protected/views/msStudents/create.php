<?php
/* @var $this MsStudentsController */
/* @var $model MsStudents */

$this->breadcrumbs=array(
	'Ms Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsStudents', 'url'=>array('index')),
	array('label'=>'Manage MsStudents', 'url'=>array('admin')),
);
?>

<h1>Create MsStudents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>