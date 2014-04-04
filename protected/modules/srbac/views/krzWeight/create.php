<?php
/* @var $this KrzWeightController */
/* @var $model KrzWeight */

$this->breadcrumbs=array(
	'Krz Weights'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KrzWeight', 'url'=>array('index')),
	array('label'=>'Manage KrzWeight', 'url'=>array('admin')),
);
?>

<h1>Create KrzWeight</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>