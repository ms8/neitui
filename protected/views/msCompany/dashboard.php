<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'umeditor/css/umeditor.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.config.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/zh-cn.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'json2.js', CClientScript::POS_BEGIN);
?>
<section id="action-box">
    <div class="container  pad-25">
        <?php if($model->status == '1'){ ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>注意!</strong>
                公司信息未验证，暂时不能发布招聘信息和阅读简历
            </div>
        <?php }?>
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="media">
                        <a class="pull-left intro-logo" href="#">
                            <img width="190" height="190" alt="<?php echo $model->name?>"
                                 src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->name?></h4>
                            <div id="intro-info" class="c_intro">
                                <div class="intro-des"><?php echo $model->description?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper widget">
                    <div>
                        <div class="subpage-title noline">
                            <h5>招聘职位</h5>
                        </div>
<!--                        <div id="job-new" class="c_detail pad-bottom-25" style="display: none">-->
                        <div class="modal fade" id="job-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog"  style="width:750px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">新增职位</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">职位信息：</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name=MsJobs[title] placeholder="职位信息">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">城市：</label>
                                                <div class="col-sm-8">
                                                    <?php foreach($citys as $city){  ?>
                                                        <label class="radio-inline">
                                                            <input type="radio"  name="city" <?php if($city->code=='beijing'){?>checked<?php }?> value="<?php echo $city->code?>" />
                                                            <?php echo $city->name ?>
                                                        </label>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">职位描述：</label>
                                                <div class="col-sm-8">
                                                    <script type='text/plain' id='MsJobs_description'></script>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="job-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                        <button type="button"  id="job-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->

                        </div>

                    </div>
                    <div class="absolute-right-20">
                        <a href="javascript:;" class="icon-operate"  id="job-add" ><i class="icon-plus-sign-alt"></i></a>
                    </div>
                    <div id="accordion" class="panel-group">
                        <?php foreach($jobs as $job){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapse<?php echo $job->id?>" job-id="<?php echo $job->id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                            <span class="job-title"><?php echo $job->title?></span>
                                            <span class="job-city"><?php echo $job->cityname?></span>
                                            <span class="job-citycode" style="display: none"><?php echo $job->citycode?></span>
                                            <span class="job-time"><?php echo $job->createtime?></span>
                                        </a>
                                        <a href="javascript:;" class="job-operate"><i class="icon-edit"></i></a>
                                        <a href="javascript:;" class="job-operate"><i class="icon-trash"></i></a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse<?php echo $job->id?>" style="height: 0px;">
                                    <div class="panel-body"></div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>基本信息</h5>
                    </div>
                    <div class="text-right absolute-right-20">
                        <a href="javascript:;" class="icon-operate"  id="info-update" ><i class="icon-edit"></i></a>
                    </div>
                    <div id="info-show" class="c_detail">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">名称：</label>
                                <div class="col-sm-8">
                                    <span class="info-name"><?php echo $model->name?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">主页：</label>
                                <div class="col-sm-8">
                                    <span class="info-home">
                                        <a href="<?php echo $model->website?>" target="_blank"><?php echo $model->website?> </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">地址：</label>
                                <div class="col-sm-8">
                                    <span class="info-address"><?php echo $model->address?></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="info-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">编辑基本信息</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="info-form" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">logo：</label>
                                            <div class="col-sm-6">
                                                <input type="file" size="60" maxlength="100" name="logo" name="logo" value=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">名称：</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="MsCompany_name" value="<?php echo $model->name?>" class="form-control"
                                                       name="MsCompany[name]" maxlength="100" size="60"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">主页：</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="MsCompany_website" value="<?php echo $model->website?>" class="form-control"
                                                       name="MsCompany[website]" maxlength="100" size="60" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">地址：</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="MsCompany_address" value="<?php echo $model->address?>"  class="form-control"
                                                       name="MsCompany[address]" maxlength="100" size="60" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">职位描述：</label>
                                            <div class="col-sm-8">
                                                <script type="text/plain" id="myEditor"><?php echo $model->description?></script>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="info-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                    <button type="button"  id="info-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->

                    </div>

                </div>
                <div class="widget text" style="position: relative">
                    <div class="subpage-title noline">
                        <h5>公司印象</h5>
                    </div>
                    <div class="absolute-right-20">
                        <a  id="tag-add" class="icon-operate" href="javascript:;"><i class="icon-plus-sign-alt"></i></a>
                    </div>
                    <div id="tag-info" class="r_box">
                        <input  id="MsCompany_tags" type="hidden" value="<?php echo $model->tags?>" />
                        <ul id="hasLabels" class="tagcloud-list">
                            <?php
                            $tags = explode(' ',$model->tags);
                            foreach($tags as $tag){
                                ?>
                                <li>
                                    <span><?php echo $tag?></span>
                                    <a  class="tag-remove" href="javascript:;" title="删除"><i class="icon-remove"></i></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    //职位所在城市列表
    var cityHtml = "";
    <?php foreach($citys as $city){  ?>
        cityHtml += '<label class="radio-inline">';
        cityHtml += '<input type="radio"  name="city" <?php if($city->code=='beijing'){?>checked<?php }?> value="<?php echo $city->code?>" />';
        cityHtml += '<?php echo $city->name ?>';
        cityHtml += '</label>';
    <?php }?>
    //菜单选中公司
    $(".nav li.active").removeClass("active");
    $(".nav li:eq(2)").addClass("active");

    //职位详细信息
    $.ajax({
        type:'POST',
        dataType:'json',
        url:'<?php echo Yii::app()->createUrl("msjobs/view")."/".$model->id?>',
        success:function(data) {
            for(var i = 0; i < data.length; i++){
                var $content = $("#collapse"+data[i].job.id+" .panel-body");
                var tempHtml = "<div class='description'>"+data[i].job.description + "</div>";
                if(data[i].status == "0"){
                    tempHtml += "<div class='text-center status'><button class='btn btn-flat flat-color'  onclick='submitjl("+data[i].job.id+")'>投简历</button></div>";
                }else{
                    tempHtml += '<div class="text-center status"><button class="btn btn-default" type="button" disabled="disabled">该职位已投</button></div>';
                }
                $content.html(tempHtml);

            }
        }
    });

    //编辑基本信息
    var um = UM.getEditor('myEditor',{
        toolbar:[
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |'
        ]
        ,initialFrameWidth:500 //初始化编辑器宽度,默认500
        ,initialFrameHeight:200  //初始化编辑器高度,默认500
    });
    $("#info-update").click(function(){
        $("#info-edit").modal("show");
    })
    $("#info-cancel").live('click',function(){
        $("#info-show").show();
        $("#info-edit").hide();
    });
    $("#info-save").click(function(){
        var tempHtml = $("#myEditor").html();
        $("#info-form").ajaxSubmit({
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update' ?>",
            dataType:"html",
            type:"post",
            data:{MsCompany:{description:encodeURIComponent(tempHtml)}},
            success:function(data){
                data = JSON.parse(data);
                $("#intro-info").prevAll("h4").html(data.name);
                $("#info-show .info-name").html(data.name);
                $("#info-show .info-home").html(data.website);
                $(".intro-logo img").attr("src","<?php echo Yii::app()->baseUrl.'/'?>"+data.logo);
                $("#info-show .info-address").html(data.address);
                $("#intro-info .intro-des").html(tempHtml);
                $("#info-edit").modal("hide");
            }
        });
    })

    //编辑公司印象
    var popoverObj = $('#tag-add').popover({
        placement:"left",
        html:true,
        container:"body",
        title:"",
        content:'<ul class="recent-posts" style="width:300px">' +
               '<li> <input type="text" id="tags-new" class="form-control pad-bottom-5"' +
            'name="MsCompany[tags]" maxlength="500" size="60" /></li>'+
            '<li><i class="icon-quote-left icon-x pull-left icon-muted"></i>多个印象标签通过空格分开，例如：高富帅 白富美<i class="icon-quote-right icon-x pull-right icon-muted"></i></li>'+
        '<li class="text-right">'+
       ' <button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" id="tag-cancel" >取消</button>'+
        '<button  type="button" class="btn btn-flat flat-success btn-bordered btn-rounded tag-save" id="tag-save">保存</button>'+
        '</li>'+
        '</ul>"'
    });

    //编辑标签
    $("#hasLabels .tag-remove").live("click",function(){
        var $that = $(this),
            tags = $("#MsCompany_tags").val(),
            removeTag = $that.prev("span").html();
        $("#MsCompany_tags").val($.trim(tags.replace(removeTag, "")));
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsCompany:{tags: $.trim(tags.replace(removeTag, ""))}},
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update'?>",
            success:function(data) {
                $that.parent().remove();
            }
        });
    });
    $("#tag-save").live("click",function(){
        var $that = $(this),
            tags = $("#MsCompany_tags").val(),
            newTags =$.trim($("#tags-new").val());
        //如果新标签为空，隐藏弹窗口并返回
        if($.trim(newTags) == ""){
            $("#tag-add").popover("hide");
            return;
        }
        //新标签有内容继续处理
        tags += " "+ newTags;
        $("#MsCompany_tags").val(tags);
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsCompany:{tags: tags}},
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update'?>",
            success:function(data) {
                var tagsArr = newTags.split(" ");
                for(var j = 0 ;j <  tagsArr.length ; j++ ){
                       var liHtml = '<li><span>' + tagsArr[j] +'</span><a  class="tag-remove" href="javascript:;" title="删除"><i class="icon-remove"></i></a></li>'
                    $("#hasLabels").append(liHtml);
                }
                //隐藏popover，使用hide会出现z-index值大遮住标签删除操作情况
                var self = $("#tag-add").popover().data("bs.popover");
                self.leave(self);
            }
        });
    });
    $("#tag-cancel").live("click",function(){
        //隐藏popover，使用hide会出现z-index值大遮住标签删除操作情况
        var self = $("#tag-add").popover().data("bs.popover");
        self.leave(self);
    });
    $("body").click(function(e){
        if($(".popover").length == 0 || $(".popover:hidden").length > 0){
            return;
        }
        var target = (e.srcElement)?e.srcElement:e.target;
        if($(target).parents('.popover-content').length == 0 && !$(target).hasClass("popover-content")
            && !$(target).hasClass("icon-plus-sign-alt")){
            //隐藏popover，使用hide会出现z-index值大遮住标签删除操作情况
            var self = $("#tag-add").popover().data("bs.popover");
            self.leave(self);
        }

    })

    //新增职位
    $("#job-add").click(function(){
        $('#job-new').modal('show')
    })
    UM.getEditor('MsJobs_description',{
        toolbar:[
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |'
        ]
        ,initialFrameWidth:500 //初始化编辑器宽度,默认500
        ,initialFrameHeight:150  //初始化编辑器高度,默认500
    });
    $("#job-save").click(function(){
        var title = $("#job-new input[name='MsJobs[title]']").val();
        var citycode = $("#job-new input[name='city']:checked").val();
        var jobDesHtml = $("#MsJobs_description").html();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsJobs:{title:title,citycode:citycode,description:jobDesHtml}},
            url:"<?php echo Yii::app()->baseUrl.'/msjobs/create'?>",
            success:function(data) {
                var nowTime = new Date();
                var jobHtml = '<div class="panel panel-default">' +
                                    '<div class="panel-heading">'+
                                        '<h4 class="panel-title">'+
                                            '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" job-id="'+ data.id +'" href="#collapse'+ data.id +'">'+
                                            '&nbsp<span class="job-title">'+ data.title +'</span>'+
                                            '&nbsp<span class="job-city">'+ data.cityname +'</span>'+
                                            '&nbsp<span class="job-terms">'+ data.createtime +'</span>'+
                                            '</a>'+
                                             '<a class="job-operate" href="javascript:;"><i class="icon-edit"></i></a>'+
                                             '<a class="job-operate" href="javascript:;"><i class="icon-trash"></i></a>'+
                                        '</h4>'+
                                    '</div>'+
                                    '<div style="height: 0px;" id="collapse'+ data.id + '" class="panel-collapse collapse">'+
                                        '<div class="panel-body"><div class="description">'+ data.description  + '</div>'+
                                            '<div class="text-center status">' +
                                                '<button onclick="submitjl('+ data.id +')"  class="btn btn-flat flat-color btn-rounded">投简历</button>' +
                                            '</div>' +
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                $("#accordion").prepend(jobHtml);
                $("#job-new").modal("hide");

            }
        });
    })
    $("#job-cancel").click(function(){
        $("#job-new").hide();
        $("#job-add").show();
    })
    //编辑职位
    $(".job-operate .icon-edit").live("click",function(){
        var $jobInfo = $(this).parent().prev();
        $("#accordion .panel-title a").not(".collapsed").each(function(){
            var collapseId = $(this).attr("href");
            $(collapseId).collapse('hide');
            $(this).addClass("collapsed");

        })
        var jobId = $jobInfo.removeClass("collapsed").attr("href");
        if($(jobId+" form").length == 0){
            var desOperate = $(".panel-body .status",jobId).clone().hide();
            var editForm = '<div id="job-edit" class="c_detail pad-bottom-25">'+
                                '<form class="form-horizontal" role="form">'+
                                    '<div class="form-group">'+
                                        '<label for="inputEmail3" class="col-sm-3 control-label">职位信息：</label>'+
                                        '<div class="col-sm-8">'+
                                            '<input type="text" class="form-control" name=MsJobs[title] placeholder="职位信息">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="inputEmail3" class="col-sm-3 control-label">城市：</label>'+
                                        '<div class="col-sm-8">'+
                                            cityHtml +
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label for="inputEmail3" class="col-sm-3 control-label">职位描述：</label>'+
                                        '<div class="col-sm-8">'+
                                            "<script type='text/plain' id='job-edit-description"+ $jobInfo.attr("job-id")+ "'>"+ $(".panel-body .description",jobId).html()+"<\/script>"+
                                        '</div>'+
                                    '</div>'+
                                '</form>'+

                                '<div class="text-center operate">'+
                                    '<button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" onclick="editCancel('+$jobInfo.attr("job-id")+')">取消</button>'+
                                    '<button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" onclick="editSave('+$jobInfo.attr("job-id")+')">保存</button>'+
                                '</div>'+
                    '</div>';

            $(".panel-body",jobId).html(editForm).append(desOperate);
            //给编辑框赋值
            $("input[name='MsJobs[title]']",jobId).val($(".job-title",$jobInfo).html());
            $("input[name='city']",jobId).each(function(){
                if($(this).val() == $(".job-citycode",$jobInfo).text() ){
                    $(this).attr("checked",true);
                }
            });
            UM.getEditor('job-edit-description'+ $jobInfo.attr("job-id"),{
                toolbar:[
                    'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                    'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                    '| justifyleft justifycenter justifyright justifyjustify |'
                ]
                ,initialFrameWidth:500 //初始化编辑器宽度,默认500
                ,initialFrameHeight:200  //初始化编辑器高度,默认500
            });
        }else{
            $(jobId+" form").show();
            $(jobId+" .operate").show();
            $(jobId+" .description").hide();
            $(jobId+" .status").hide();
        }
        $(jobId).collapse('show');
    })
    function editSave(jobId){
        var $panelBody = $("#collapse"+jobId + " .panel-body");
        var title = $("input[name='MsJobs[title]']",$panelBody).val();
        var citycode = $("input[name='city']:checked",$panelBody).val();
        var jobDesHtml = $("#job-edit-description"+jobId).html();

        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsJobs:{title:title,citycode:citycode,description:jobDesHtml}},
            url:"<?php echo Yii::app()->baseUrl.'/msjobs/update/'?>"+jobId,
            success:function(data) {
                console.log(data);
                var $panel = $("#collapse"+jobId).parent();
                $(".job-title",$panel).text(data.title);
                $(".job-city",$panel).text(data.cityname);
                $(".job-citycode",$panel).text(data.citycode);
                $(".job-time",$panel).text(data.createtime);
                $(".panel-body form",$panel).hide();
                $(".panel-body .operate",$panel).hide();
                $(".panel-body",$panel).prepend("<div class='description'>"+  data.description +"</div>");
                $(".panel-body .status",$panel).show();
            }
        });
    }
    function editCancel(jobId){
        var $panelBody = $("#collapse"+jobId + " .panel-body");
        var jobDesHtml = $("#job-edit-description"+jobId).html();
        var $panel = $("#collapse"+jobId).parent();
        $(".panel-body form",$panel).hide();
        $(".panel-body .operate",$panel).hide();
        $(".panel-body",$panel).prepend("<div class='description'>"+ jobDesHtml +"</div>");
        $(".panel-body .status",$panel).show();
    }
    $(".job-operate .icon-trash").live("click",function(){
        var $that = $(this);
        var jobId = $(this).parent().prevAll('a[job-id]').attr("job-id");
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{ajax:true},
            url:"<?php echo Yii::app()->baseUrl.'/msjobs/delete/'?>"+jobId,
            success:function(data) {
                $that.parents(".panel").remove();
                console.log(data);
            }
        });
    })

</script>