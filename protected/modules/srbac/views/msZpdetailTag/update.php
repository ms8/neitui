<?php
/* @var $this MsZpdetailTagController */
/* @var $model MsZpdetailTag */

$this->breadcrumbs=array(
	'Ms Zpdetail Tags'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MsZpdetailTag', 'url'=>array('index')),
	array('label'=>'Create MsZpdetailTag', 'url'=>array('create')),
	array('label'=>'View MsZpdetailTag', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MsZpdetailTag', 'url'=>array('admin')),
);
?>

<h1>Update MsZpdetailTag <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>