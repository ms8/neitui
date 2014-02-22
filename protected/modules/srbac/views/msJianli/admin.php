<?php
/* @var $this MsJianliController */
/* @var $model MsJianli */

$this->breadcrumbs=array(
	'Ms Jianlis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'简历列表', 'url'=>array('index')),
	array('label'=>'创建简历', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ms-jianli-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理简历</h1>

<p>
如果需要查询某一天上传的简历，可以在上传时间中输入例如2014-01-05按回车键查找所有当天上传的简历信息
</p>

<?php echo CHtml::link('高级选项','#',array('class'=>'search-button')); ?>
<?php //echo CHtml::link('下载列表中所有简历','compressJianli') ?>
<?php //echo CHtml::link('下载列表中所有简历','"jianlidownload/$data->id"',array('onclick'=>'downloadAll()')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ms-jianli-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(            // display 'author.username' using an expression
            'name'=>'name',
            'type'=>'raw',
            'value'=>'CHtml::link($data->name,"jianlidownload/$data->id")',
        ),
//		'name',
		'userId',
		'filepath',
		'description',
		'createtime',
		/*
		'updatetime',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<script>
    function downloadAll(){
        alert('11');
    }
</script>