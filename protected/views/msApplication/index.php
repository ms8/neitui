<?php
/* @var $this MsApplicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Applications',
);

$this->menu=array(
	array('label'=>'Create MsApplication', 'url'=>array('create')),
	array('label'=>'Manage MsApplication', 'url'=>array('admin')),
);
?>

<h1>Ms Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
