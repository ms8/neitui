<?php
/* @var $this MsCompanyController */
/* @var $dataProvider CActiveDataProvider */
//
//$this->breadcrumbs=array(
//	'Ms Companies',
//);
//
//$this->menu=array(
//	array('label'=>'Create MsCompany', 'url'=>array('create')),
//	array('label'=>'Manage MsCompany', 'url'=>array('admin')),
//);
?>
<section>
    <div class="container">
    <div  class="filters pad-top-25" id="filters" data-option-key="filter">
        <span id="filter-up">公司所在城市：</span>
        <a href="<?php echo Yii::app()->baseUrl."/"?>" data-option-value="*" class="active_sort">北京</a>
        <span class="text-sep">/</span>
        <a class="disabled"  data-toggle="tooltip" title="抱歉，上海、广州、深圳的同学们还得等等">
            上海<span class="text-sep">&nbsp/&nbsp</span>广州<span class="text-sep">&nbsp/&nbsp</span>深圳
        </a>
    </div>
    <section class="pad-top-25">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_index',
    "itemsCssClass"=>"row items",
     'template'=>'<div class="list">{items}</div>{pager}',
    'pager'=>array(
        'class'=>'CLinkPager',
//        'cssFile'=>"pagination",
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

        $('#filters .disabled').tooltip({
            placement:"bottom"
        })
    })
</script>