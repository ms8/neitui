<?php
/* @var $this MsDictionaryController */
/* @var $model MsDictionary */

$this->breadcrumbs=array(
	'Ms Dictionaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'字典列表', 'url'=>array('index')),
	array('label'=>'管理字典', 'url'=>array('admin')),
);
?>

<h1>创建字典</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'dctypes'=>$dctypes)); ?>