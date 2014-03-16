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
<section>
    <div class="container">
    <div  class="sort_by_cat pad-top-25" id="filters" data-option-key="filter">
        <span id="filter-up">公司所在城市：</span>
        <a href="#filter" data-option-value="*" class="active_sort">北京</a>
        <span class="text-sep">/</span>
        <a class="" href="#filter" data-option-value=".css_sort">上海</a>
        <span class="text-sep">/</span>
        <a class="" href="#filter" data-option-value=".html_sort">广州</a>
        <span class="text-sep">/</span>
        <a class="" href="#filter" data-option-value=".psd_sort">深圳</a>
    </div>
    <section class="pad-top-25">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_index',
    "itemsCssClass"=>"row items",
     'template'=>'<div class="list">{items}</div>{pager}',
    'pager'=>array(
        'class'=>'CLinkPager',
        'cssFile'=>"pagination",
        'htmlOptions'=>array('class'=>'pagination'),
        'selectedPageCssClass'=>'active',
        'hiddenPageCssClass'=>'disabled',
    ),
)); ?>
     </section>
     </div>
</section>
<script type="text/javascript">
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");
    })
</script>