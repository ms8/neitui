<?php
/* @var $this MsCompanyController */
/* @var $dataProvider CActiveDataProvider */
?>
<section>
    <div class="container  pad-top-25">
        <div class="widget">
<!--            <div class="subpage-title noline">-->
<!--                <h5>招聘公司</h5>-->
<!--            </div>-->
            <section class="pad-25">
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
    </div>
</section>
<script type="text/javascript">
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");

        $('#filters .disabled').popover({
            placement:"bottom",
            html:true,
            trigger:'hover',
            container:"body",
            title:"",
            content:'抱歉，上海、广州、深圳的同学们还得等等'
        });
    })
</script>