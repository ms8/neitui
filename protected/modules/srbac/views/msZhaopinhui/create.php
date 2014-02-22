<?php
/* @var $this MsZhaopinhuiController */
/* @var $model MsZhaopinhui */

$this->breadcrumbs=array(
	'Ms Zhaopinhuis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'招聘会列表', 'url'=>array('index')),
	array('label'=>'管理招聘会信息', 'url'=>array('admin')),
);
?>

<h1>Create MsZhaopinhui</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>