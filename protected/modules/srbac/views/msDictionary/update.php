<?php
/* @var $this MsDictionaryController */
/* @var $model MsDictionary */

$this->breadcrumbs=array(
	'Ms Dictionaries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'字典列表', 'url'=>array('index')),
	array('label'=>'创建字典', 'url'=>array('create')),
	array('label'=>'查看字典信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理字典', 'url'=>array('admin')),
);
?>

<h1>更新字典<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>