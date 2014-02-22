<?php
/* @var $this MsZpdetailTagController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Zpdetail Tags',
);

$this->menu=array(
	array('label'=>'Create MsZpdetailTag', 'url'=>array('create')),
	array('label'=>'Manage MsZpdetailTag', 'url'=>array('admin')),
);
?>

<h1>Ms Zpdetail Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
