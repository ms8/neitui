<?php
/* @var $this MsZhaopinhuiController */
/* @var $model MsZhaopinhui */

$this->breadcrumbs=array(
	'Ms Zhaopinhuis'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'招聘会列表', 'url'=>array('index')),
	array('label'=>'创建招聘会信息', 'url'=>array('create')),
	array('label'=>'查看招聘会信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理招聘会信息', 'url'=>array('admin')),
);
?>

<h1>Update MsZhaopinhui <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>