<?php
/* @var $this KrzWeightController */
/* @var $model KrzWeight */

$this->breadcrumbs=array(
	'Krz Weights'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KrzWeight', 'url'=>array('index')),
	array('label'=>'Create KrzWeight', 'url'=>array('create')),
	array('label'=>'View KrzWeight', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KrzWeight', 'url'=>array('admin')),
);
?>

<h1>Update KrzWeight <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>