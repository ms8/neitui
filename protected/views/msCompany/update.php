<?php
/* @var $this MsCompanyController */
/* @var $model MsCompany */

$this->breadcrumbs=array(
	'Ms Companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsCompany', 'url'=>array('index')),
	array('label'=>'Create MsCompany', 'url'=>array('create')),
	array('label'=>'View MsCompany', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MsCompany', 'url'=>array('admin')),
);
?>

<h1>Update MsCompany <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>