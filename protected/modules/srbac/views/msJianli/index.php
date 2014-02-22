<?php
/* @var $this MsJianliController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Jianlis',
);

$this->menu=array(
	array('label'=>'创建简历', 'url'=>array('create')),
	array('label'=>'管理简历', 'url'=>array('admin')),
);
?>

<h1>简历列表</h1>

<?php
$dataProvider->pagination->pageSize=15;
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'ajaxUpdate'=>false,
    'template'=>'{pager}{summary}{items}{pager}',
));
?>