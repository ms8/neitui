<?php
/* @var $this MsZpdetailTagController */
/* @var $model MsZpdetailTag */

$this->breadcrumbs=array(
	'Ms Zpdetail Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsZpdetailTag', 'url'=>array('index')),
	array('label'=>'Manage MsZpdetailTag', 'url'=>array('admin')),
);
?>

<h1>Create MsZpdetailTag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>