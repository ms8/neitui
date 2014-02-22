<?php
/* @var $this MsDictionaryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Dictionaries',
);

$this->menu=array(
	array('label'=>'创建字典', 'url'=>array('create')),
	array('label'=>'管理字典', 'url'=>array('admin')),
);
?>

<h1>字典列表</h1>

<?php
$dataProvider->pagination->pageSize=15;
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{summary}{items}{pager}',
));
?>
