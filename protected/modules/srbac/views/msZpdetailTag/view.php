<?php
/* @var $this MsZpdetailTagController */
/* @var $model MsZpdetailTag */

$this->breadcrumbs=array(
	'Ms Zpdetail Tags'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MsZpdetailTag', 'url'=>array('index')),
	array('label'=>'Create MsZpdetailTag', 'url'=>array('create')),
	array('label'=>'Update MsZpdetailTag', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MsZpdetailTag', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MsZpdetailTag', 'url'=>array('admin')),
);
?>

<h1>View MsZpdetailTag #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'zp_detailid',
		'tag_code',
		'tag_name',
	),
)); ?>
