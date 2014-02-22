<?php
/* @var $this MsZpdetailController */
/* @var $model MsZpdetail */

$this->breadcrumbs=array(
	'Ms Zpdetails'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'公司列表', 'url'=>array('index')),
	array('label'=>'创建公司信息', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ms-zpdetail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理公司信息</h1>

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
	'id'=>'ms-zpdetail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'zpId',
		'companyId',
		'name',
		'position',
		'description',
		/*
		'apply',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
