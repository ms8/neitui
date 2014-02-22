<?php
/* @var $this MsZhaopinhuiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Zhaopinhuis',
);

$this->menu=array(
	array('label'=>'创建招聘会信息', 'url'=>array('create')),
	array('label'=>'管理招聘会信息', 'url'=>array('admin')),
);
?>

<h1>招聘会列表</h1>

<?php
    $dataProvider->pagination->pageSize=15;
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$dataProvider,
        'ajaxUpdate'=>false,
        'template'=>'{pager}{summary}{items}{pager}',
    ));
?>
