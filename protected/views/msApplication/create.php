<?php
/* @var $this MsApplicationController */
/* @var $model MsApplication */

$this->breadcrumbs=array(
	'Ms Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsApplication', 'url'=>array('index')),
	array('label'=>'Manage MsApplication', 'url'=>array('admin')),
);
?>

<h1>Create MsApplication</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>