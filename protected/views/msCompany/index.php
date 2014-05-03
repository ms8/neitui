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
                "itemsCssClass"=>"companys",
//                "id"=>'companys',
                 'template'=>'{items}{pager}',
//                 'template'=>'<div class="list">{items}</div>{pager}',
                'pager'=>array(
                    'class'=>'CLinkPager',
//                    'cssFile'=>"pagination",
                    'htmlOptions'=>array('class'=>'pagination'),
                    'selectedPageCssClass'=>'active',
                    'hiddenPageCssClass'=>'disabled',
                ),
            )); ?>
             </section>
        </div>
    </div>
</section>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/modernizr.custom.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/masonry.pkgd.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/imagesloaded.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/classie.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/AnimOnScroll.js');
?>
<script type="text/javascript">
    var container = $('.companys .team-member-wrap');
    var masonryContainer = $( '.companys');
    container.imagesLoaded(function(){
            container.fadeIn();
            masonryContainer.masonry({
                    itemSelector : '.team-member-wrap',
                    isAnimated: true
                });
   });

//    $( '#companys .items').masonry({
//        columnWidth: 0,
//        transitionDuration : 0,
//        itemSelector: '.team-member-wrap'
//    });
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");
//        new AnimOnScroll( document.getElementById( 'companys'), {
//            minDuration : 0.4,
//            maxDuration : 0.7,
//            viewportFactor : 0.2  items
//        } );


    })

</script>