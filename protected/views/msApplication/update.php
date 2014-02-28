<?php
/* @var $this MsApplicationController */
/* @var $model MsApplication */

$this->breadcrumbs=array(
	'Ms Applications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsApplication', 'url'=>array('index')),
	array('label'=>'Create MsApplication', 'url'=>array('create')),
	array('label'=>'View MsApplication', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MsApplication', 'url'=>array('admin')),
);
?>

<h1>Update MsApplication <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>