<?php
/* @var $this MsZpdetailController */
/* @var $model MsZpdetail */

$this->breadcrumbs=array(
	'Ms Zpdetails'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'公司列表', 'url'=>array('index')),
	array('label'=>'创建公司信息', 'url'=>array('create')),
	array('label'=>'更新公司职位', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除公司信息', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理公司信息', 'url'=>array('admin')),
);
?>

<h1>公司职位详情 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'zpId',
		'companyId',
		'name',
		'position',
		'description',
		'apply',
	),
)); ?>

<?php
$tags = $model->detailTag;
$tagStr='';
foreach($tags as $tag){
    $tagStr = $tagStr.'  '.$tag->tag_name.',';
}
echo '职位标签:'.$tagStr;
?>
