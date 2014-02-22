<?php
/* @var $this MsDictionaryTypeController */
/* @var $model MsDictionaryType */

$this->breadcrumbs=array(
	'Ms Dictionary Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'字典类型列表', 'url'=>array('index')),
	array('label'=>'创建字典类型', 'url'=>array('admin')),
);
?>

<h1>创建字典类型</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>