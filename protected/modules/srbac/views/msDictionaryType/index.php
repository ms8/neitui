<?php
/* @var $this MsDictionaryTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Dictionary Types',
);

$this->menu=array(
	array('label'=>'创建字典类型', 'url'=>array('create')),
	array('label'=>'管理字典类型', 'url'=>array('admin')),
);
?>

<h1>字典类型列表</h1>

<?php
$dataProvider->pagination->pageSize=15;
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{summary}{items}{pager}',
));
?>
