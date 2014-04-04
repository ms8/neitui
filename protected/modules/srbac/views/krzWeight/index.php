<?php
/* @var $this KrzWeightController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Krz Weights',
);

$this->menu=array(
	array('label'=>'Create KrzWeight', 'url'=>array('create')),
	array('label'=>'Manage KrzWeight', 'url'=>array('admin')),
);
?>

<h1>Krz Weights</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
