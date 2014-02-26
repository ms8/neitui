<?php
/* @var $this MsCompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ms Companies',
);

$this->menu=array(
	array('label'=>'Create MsCompany', 'url'=>array('create')),
	array('label'=>'Manage MsCompany', 'url'=>array('admin')),
);
?>

<h1>Ms Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
