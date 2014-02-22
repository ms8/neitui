<?php
/* @var $this MsZpdetailController */
/* @var $model MsZpdetail */

$this->breadcrumbs=array(
	'Ms Zpdetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'公司列表', 'url'=>array('index')),
	array('label'=>'管理公司信息', 'url'=>array('admin')),
);
?>

<h1>Create MsZpdetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
    'zhaopinhuis'=>$zhaopinhuis,'zpTags'=>$zpTags)); ?>