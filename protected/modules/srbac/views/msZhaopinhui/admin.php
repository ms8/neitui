<?php
/* @var $this MsZhaopinhuiController */
/* @var $model MsZhaopinhui */

$this->breadcrumbs=array(
	'Ms Zhaopinhuis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'招聘会列表', 'url'=>array('index')),
	array('label'=>'创建招聘会信息', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ms-zhaopinhui-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理招聘会</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ms-zhaopinhui-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'activity_date',
		'activity_address',
		'status',
		'description',
		/*
		'createtime',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
