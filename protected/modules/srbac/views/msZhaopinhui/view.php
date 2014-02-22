<?php
/* @var $this MsZhaopinhuiController */
/* @var $model MsZhaopinhui */

$this->breadcrumbs=array(
	'Ms Zhaopinhuis'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'招聘会列表', 'url'=>array('index')),
	array('label'=>'创建招聘会', 'url'=>array('create')),
	array('label'=>'更新招聘会信息', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除招聘会', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理招聘会信息', 'url'=>array('admin')),
);
?>

<h1>本场招聘会 #
    <?php echo $model->id; ?> 详细信息如下
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'activity_date',
		'activity_address',
		'status',
		'description',
		'createtime',
	),
)); ?>
