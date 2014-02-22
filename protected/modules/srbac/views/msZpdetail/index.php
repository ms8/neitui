<?php
/* @var $this MsZpdetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Zpdetails',
);

$this->menu=array(
	array('label'=>'创建公司信息', 'url'=>array('create')),
	array('label'=>'管理公司信息', 'url'=>array('admin')),
);
?>

<h1>公司职位列表</h1>

<?php
$dataProvider->pagination->pageSize=15;
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{summary}{items}{pager}',
));
?>
