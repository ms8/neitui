<?php
/* @var $this MsDictionaryController */
/* @var $model MsDictionary */

$this->breadcrumbs=array(
	'Ms Dictionaries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'字典列表', 'url'=>array('index')),
	array('label'=>'创建字典', 'url'=>array('create')),
	array('label'=>'更新字典信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除字典', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理字典', 'url'=>array('admin')),
);
?>

<h1>查看字典详情 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'type',
	),
)); ?>
