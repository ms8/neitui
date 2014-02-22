<?php
/* @var $this MsDictionaryTypeController */
/* @var $model MsDictionaryType */

$this->breadcrumbs=array(
	'Ms Dictionary Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'字典类型列表', 'url'=>array('index')),
	array('label'=>'创建字典类型', 'url'=>array('create')),
	array('label'=>'查看字典类型信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理字典类型', 'url'=>array('admin')),
);
?>

<h1>更新字典类型列表信息<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>