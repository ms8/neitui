<?php
/* @var $this MsCompanyController */
/* @var $dataProvider CActiveDataProvider */
?>
<section>
    <div class="container  pad-top-25">
        <div class="widget">
            <section class="pad-25">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_index',
                "itemsCssClass"=>"companys",
//                 'ajaxOptions'=>"{dataType:'json',success:abcd}",
                 'template'=>'{items}',
//                 'template'=>'<div class="list">{items}</div>{pager}',
                'pager'=>array(
                    'class'=>'CLinkPager',
                    'htmlOptions'=>array('class'=>'pagination'),
                    'selectedPageCssClass'=>'active',
                    'hiddenPageCssClass'=>'disabled',
                ),
            )); ?>
                <div id="loading" class="text-center" style="display: none;"><strong>努力加载中……</strong></div>
             </section>
        </div>
    </div>
</section>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/masonry.pkgd.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'GridLoadingEffects/imagesloaded.js');
?>
<script type="text/javascript">
    var imagesLoading = false,
        masNode = $('.companys');

    function initMasonry() {
        var items = $('.companys .team-member-wrap').css('opacity', 0);
        imagesLoading = true;
        items.imagesLoaded(function(){
            imagesLoading = false;
            items.css('opacity', 1);
            masNode.masonry({
                itemSelector: '.team-member-wrap',
                isFitWidth: true
            });
        });
    }
    function appendToMasonry(data) {
        var newItemContainer = $('<div/>');
        for(var i = 0,len = data.length; i < len ; i++){
            var elem = '<div class="col-sm-6 col-md-3 team-member-wrap">'+
                '<div class="team-member">'+
                '<div class="member-thumb row">'+
                '<div class="col-sm-6 col-md-6">'+
                '<a href="<?php echo Yii::app()->baseUrl."mscompany/view/" ?>'+data[i].company.id+'">'+
                '<img src="<?php echo Yii::app()->baseUrl."/"?>' + data[i].company.logo + '" class="img-responsive" alt="'+ data[i].company.name +'">'+
                '</a>'+
                '</div>'+
                '<div class="col-sm-6 col-md-6">'+
                '<h5 class="member-name">'+ data[i].company.name + '</h5>'+
                '</div>'+
                '</div>'+
                '<div class="member-details">'+
                '<div class="member-content">'+
                '<ul class="job-list">' ;

                for(var j = 0,length = data[i].jobs.length; j < length ; j++){
                    elem +=  '<li><a href="<?php echo Yii::app()->baseUrl."/msjobs/view/"?>'+ data[i].jobs[j].id+ '" target="_blank">'+ data[i].jobs[j].title+ '</a></li>';
                }
                elem +='</ul>' +
                '<div style="padding:5px 0 0 4px;" class="text-left"><i class="icon-time"></i>&nbsp;'+ data[i].jobs[0].createtime + '</div>  ' +
                '</div>'+
                '<p class="text-center"><a href="<?php echo Yii::app()->baseUrl."mscompany/view/" ?>'+ data[i].id +'" class="btn btn-flat flat-primary"">查看详情</a></p>'+
                '</div>'+
                '</div>'+
                '</div>';
            newItemContainer.append(elem);
        }
        var items = newItemContainer.find('.team-member-wrap').css('opacity', 0);
        masNode.append(items);

        imagesLoading = true;
        items.imagesLoaded(function(){
            imagesLoading = false;
            items.css('opacity', 1);
            masNode.masonry('appended',  items);
        });
    }
    initMasonry();
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");
        var pageSize = 2;
        $(window).scroll(function() {
            if($(document).height() - $(window).height() - $(document).scrollTop() < 50) {
                if(!imagesLoading) {
                    imagesLoading = true;
                    $("#loading").show();
                    $.ajax({
                        type: "POST",
                        dataType:"json",
                        url: "<?php echo Yii::app()->baseUrl ?>/mscompany/index?MsCompany_page="+pageSize+"&ajax=yw0",
                        success: function(msg){
                            pageSize++;
                            appendToMasonry(msg);
                            $("#loading").hide();
                        }
                    });
                }

            }

        });

    })

</script>