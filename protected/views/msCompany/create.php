<?php
/* @var $this MsCompanyController */
/* @var $model MsCompany */

$this->breadcrumbs=array(
	'Ms Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MsCompany', 'url'=>array('index')),
	array('label'=>'Manage MsCompany', 'url'=>array('admin')),
);
?>

<h1>您还没填写公司验证信息，请填写相关信息，验证通过后可发布相关职位和浏览简历</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>