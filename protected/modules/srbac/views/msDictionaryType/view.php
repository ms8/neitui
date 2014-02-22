<?php
/* @var $this MsDictionaryTypeController */
/* @var $model MsDictionaryType */

$this->breadcrumbs=array(
	'Ms Dictionary Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'字典类型列表', 'url'=>array('index')),
	array('label'=>'创建字典类型', 'url'=>array('create')),
	array('label'=>'更新字典类型', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除字典类型', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理字典类型信息', 'url'=>array('admin')),
);
?>

<h1>查看字典类型列表 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name',
	),
)); ?>
