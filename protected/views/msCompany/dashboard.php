<section class="page-title-wrapper" id="page-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>公司基本信息维护</h4>
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-xs-6 hidden-xs">

                <ol class="breadcrumb pull-right">
                    <li><?php if($model->status == '1'){ ?>
                            <div style="color: red;">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                        <?php }?></li>
                </ol>
            </div>
            <!-- /.col-xs-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="pad-25" id="action-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="media">
                    <a class="pull-left intro-logo" href="#">
                        <img width="190" height="190" alt="<?php echo $model->name?>"
                             src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $model->name?></h4>
                        <div id="intro-info" class="c_intro">
                            <div class="intro-des"><?php echo $model->description?></div>
                            <div  class="text-right">
                                <button class="btn btn-flat flat-success btn-rounded" id="intro-update" >修改介绍</button>
                            </div>
                        </div>
                        <div id="intro-edit" class="r_box" style="display: none">
                                <script type="text/plain" id="myEditor"><?php echo $model->description?></script>
                                <div class="text-center pad-top-25">
                                    <button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" id="intro-cancel" >取消</button>
                                    <button  type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" id="intro-save">保存</button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper">
                    <div class="subpage-title">
                        <h5>招聘职位</h5>
                    </div>
                    <div class="text-right job-add">
                        <button type="button" class="btn btn-flat flat-color btn-rounded" id="job-add">新增职位</button>
                    </div>
                    <div id="accordion" class="panel-group">
                        <?php foreach($jobs as $job){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapse<?php echo $job->id?>" job-id="<?php echo $job->id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                            <span class="job-title"><?php echo $job->title?></span>
                                            <span class="job-city"><?php echo $job->cityname?></span>
                                            <span class="job-terms"><?php echo $job->createtime?></span>
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
                <div>
                    <div class="subpage-title">
                        <h5>基本信息</h5>
                    </div>
                    <div id="info-show" class="c_detail">
                        <dl class="dl-horizontal companyInfo-show">
                            <dt>公司名称：</dt>
                            <dd class="info-name"><?php echo $model->name?></dd>
                            <dt>主页：</dt>
                            <dd class="info-home"><a href="<?php echo $model->website?>" target="_blank">
                                    <?php echo $model->website?>
                                </a></dd>
                            <dt >地址：</dt>
                            <dd class="info-address"><?php echo $model->address?></dd>
                        </dl>
                        <div class="text-right">
                            <button class="btn btn-flat flat-color btn-rounded" id="info-update" onclick="showEdit()">修改信息</button>
                        </div>

                    </div>

                    <div id="info-edit" class="c_detail" style="margin-bottom: 0px;display: none;min-height: 140px;">
                        <dl class="dl-horizontal companyInfo-edit">
                            <dt>logo：</dt>
                            <dd class="info-name">
                                <input type="file" size="60" maxlength="100" name="logo" id="MsCompany_logo" value=""/>
                            </dd>
                            <dt>名称：</dt>
                            <dd class="info-name">
                                <input type="text" id="MsCompany_name" value="<?php echo $model->name?>" class="form-control"
                                       name="MsCompany[name]" maxlength="100" size="60"/>
                            </dd>
                            <dt>主页：</dt>
                            <dd class="info-name">
                                <input type="text" id="MsCompany_website" value="<?php echo $model->website?>" class="form-control"
                                       name="MsCompany[website]" maxlength="100" size="60" />
                            </dd>
                            <dt>地址：</dt>
                            <dd class="info-name">
                                <input type="text" id="MsCompany_address" value="<?php echo $model->address?>"  class="form-control"
                                       name="MsCompany[address]" maxlength="100" size="60" />
                            </dd>
                        </dl>

                        <div class="text-right">
                            <button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" id="info-cancel" >取消</button>
                            <button type="button" class="btn btn-flat flat-success btn-bordered btn-rounded" id="info-save">保存</button>
                        </div>
                    </div>
                </div>
                <div class="widget text">
                    <div class="subpage-title">
                        <h5>公司印象</h5>
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
                        <a  id="tag-add" class="tag-add" href="javascript:;"><i class="icon-plus-sign-alt"></i></a>
                    </div>
<!--                    <div id="tag-edit" class="r_box" style="display: none">-->
<!--                        <form method="post" action="--><?php //echo Yii::app()->baseUrl.'/mscompany/update'?><!--"-->
<!--                              id="tag-update-form" >-->
<!--                            <input type="text" id="MsCompany_tags" value="--><?php //echo $model->tags?><!--"-->
<!--                                   name="MsCompany[tags]" maxlength="500" size="60">-->
<!--                            <div class="text-right">-->
<!--                                <button type="button" class="btn btn-flat flat-color btn-rounded" id="tag-cancel" >取消</button>-->
<!--                                <button  class="btn btn-flat flat-color btn-rounded" id="tag-save">保存</button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    //菜单选中公司
    $(".nav li.active").removeClass("active");
    $(".nav li:eq(2)").addClass("active");

    //职位详细信息
    $("#accordion .accordion-toggle").each(function(){
        var jobId = $(this).attr("job-id");
        var $content = $("#collapse"+jobId+" .panel-body");
        if($content.html() == "") {
            $.ajax({
                type:'POST',
                dataType:'json',
                url:'<?php echo Yii::app()->createUrl('msjobs/view')?>'+"/"+jobId,
                success:function(data) {
                    var tempHtml = "<p>"+data.description+"</p>"
                    if(data.finish == "0"){
                        tempHtml += "<div class='text-center status'><button class='btn btn-flat flat-color btn-rounded' id='submitbt' onclick='submitjl("+jobId+")'>投简历</button></div>";
                    }else{
                        tempHtml += '<div class="text-center status"><button class="btn btn-default btn-rounded" type="button" disabled="disabled">该职位已投</button></div>';
                    }
                    $content.html(tempHtml);
                }
            });
        }
    })
    //编辑公司描述
    var um = UM.getEditor('myEditor',{
        toolbar:[
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |'
        ]
        ,initialFrameWidth:500 //初始化编辑器宽度,默认500
        ,initialFrameHeight:200  //初始化编辑器高度,默认500
    });
    $("#intro-save").click(function(){
        var tempHtml = $("#myEditor").html();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsCompany:{description:tempHtml}},
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update'?>",
            success:function(data) {
                $("#intro-info .intro-des").html(tempHtml);
                $("#intro-info").show();
                $("#intro-edit").hide();

            }
        });
    })
    //编辑基本信息
    $("#info-save").click(function(){
        var name = $("#MsCompany_name").val(),
            website = $("#MsCompany_website").val(),
            address = $("#MsCompany_address").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsCompany:{name:name,website:website,address:address}},
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update'?>",
            success:function(data) {
                $("#info-show .info-name").html(name);
                $("#info-show .info-home").html(website);
                $("#info-show .info-address").html(address);
                $("#info-show").show();
                $("#info-edit").hide();

            }
        });
    })

    //编辑公司印象
    $('#tag-add').popover({
        placement:"bottom",
        html:true,
        title:"",
        content:'<ul class="recent-posts">' +
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
                $("#tag-add").popover("hide");
            }
        });
    });
    $("#tag-cancel").live("click",function(){
        $("#tag-add").popover("hide");
    });
    $("body").click(function(e){
        if($(".popover:hidden").length > 0){
            return;
        }
        var target = (e.srcElement)?e.srcElement:e.target;
        if($(target).parents('.popover-content').length == 0 && !$(target).hasClass("popover-content")
            && !$(target).hasClass("icon-plus-sign-alt")){
            $("#tag-add").popover("hide");
        }

    })
    function showEdit(){
        $("#info-show").hide();
        $("#info-edit").show();
    }
    $("#info-cancel").live('click',function(){
        $("#info-show").show();
        $("#info-edit").hide();
    });



    $("#intro-update").live('click',function(){
        $("#intro-info").hide();
        $("#intro-edit").show();
    });
    $("#intro-cancel").live('click',function(){
        $("#intro-info").show();
        $("#intro-edit").hide();
    });
</script>