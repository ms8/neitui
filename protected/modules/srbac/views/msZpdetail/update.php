<?php
/* @var $this MsZpdetailController */
/* @var $model MsZpdetail */

$this->breadcrumbs=array(
	'Ms Zpdetails'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'公司列表', 'url'=>array('index')),
	array('label'=>'创建公司信息', 'url'=>array('create')),
	array('label'=>'公司职位详情', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理公司信息', 'url'=>array('admin')),
);
?>

<h1>更新公司职位详情 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'zhaopinhuis'=>$zhaopinhuis,'zpTags'=>$zpTags)); ?>