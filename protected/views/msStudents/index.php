<?php
/* @var $this MsStudentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Students',
);

$this->menu=array(
	array('label'=>'Create MsStudents', 'url'=>array('create')),
	array('label'=>'Manage MsStudents', 'url'=>array('admin')),
);
?>

<h1>Ms Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
