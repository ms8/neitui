<?php
/* @var $this MsJianliController */
/* @var $model MsJianli */

$this->breadcrumbs=array(
	'Ms Jianlis'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'简历列表', 'url'=>array('index')),
	array('label'=>'创建简历', 'url'=>array('create')),
	array('label'=>'更新简历', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除简历', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理简历', 'url'=>array('admin')),
);
?>

<h1>View MsJianli #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'userId',
		'filepath',
		'description',
		'createtime',
		'updatetime',
	),
)); ?>
