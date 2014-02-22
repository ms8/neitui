<?php
/* @var $this MsJianliController */
/* @var $model MsJianli */

$this->breadcrumbs=array(
	'Ms Jianlis'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'简历列表', 'url'=>array('index')),
	array('label'=>'创建简历', 'url'=>array('create')),
	array('label'=>'查看简历详细信息', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理简历', 'url'=>array('admin')),
);
?>

<h1>Update MsJianli <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>