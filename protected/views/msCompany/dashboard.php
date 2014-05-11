<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'umeditor/css/umeditor.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.config.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.min.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/zh-cn.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'json2.min.js', CClientScript::POS_BEGIN);
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
                    <div class="media widget-content">
                        <a class="pull-left intro-logo" href="#">
                            <img  alt="<?php echo $model->name?>" class=""
                                 src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->name?></h4>
                            <div class="text-right absolute-right-20">
                                <a href="javascript:;" class="icon-operate"  id="des-update" ><i class="icon-edit"></i></a>
                            </div>
                            <div id="intro-info" class="c_intro">
                                <div class="intro-des">
                                    <?php if($model->description==null || $model->description==""){?>
                                        请填写公司描述，例如公司发展历程、规模、研究方向和成果等信息，便于求职者更全面的了解公司。
                                    <?php }else{echo $model->description;}?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="des-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">编辑公司描述</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="des-form" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">名称：</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="MsCompany_name" value="<?php echo $model->name?>" class="form-control"
                                                       name="MsCompany[name]" maxlength="100" size="60"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">logo：</label>
                                            <div class="col-sm-6">
                                                <input type="file" size="60" maxlength="100" name="logo" name="logo" value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">公司描述：</label>
                                            <div class="col-sm-8">
                                                <script type="text/plain" id="myEditor"><?php echo $model->description?></script>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="des-cancel" class="btn btn-flat flat-success" data-dismiss="modal">取消</button>
                                    <button type="button"  id="des-save" class="btn btn-flat flat-success">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->

                    </div>

                </div>
                <div class="post-wrapper widget pad-bottom-25">
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
                                                    <input type="hidden" name=MsJobs[id] />
                                                    <input type="text" class="form-control" name=MsJobs[title] placeholder="职位信息">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">城市：</label>
                                                <div  class="radioTag">
                                                    <span>
                                                        <?php foreach($citys as $city){  ?>
                                                            <input id="<?php echo $city->code?>" type="radio"  name="city" <?php if($city->code=='beijing'){?>checked<?php }?> value="<?php echo $city->code?>" />
                                                            <label style="margin-left:15px" class="btn btn-flat flat-success btn-bordered myLabel" for="<?php echo $city->code?>"><?php echo $city->name ?></label>
                                                        <?php }?>
                                                    </span>
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
                                        <button type="button" id="job-cancel" class="btn btn-flat flat-success" data-dismiss="modal">取消</button>
                                        <button type="button"  id="job-save" class="btn btn-flat flat-success">保存</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->

                        </div>

                    </div>
                    <div class="absolute-right-20">
                        <a href="javascript:;" class="icon-operate"  id="job-add" ><i class="icon-plus-sign-alt"></i></a>
                    </div>
                    <div>
                        <table id="jobs" class="table jobs">
                            <thead>
                            <tr>
                                <th style="display: none"></th>
                                <th style="display: none"></th>
                                <th style="width: 25%">职位</th>
                                <th style="width: 25%">城市</th>
                                <th style="width: 35%">发布时间</th>
                                <th style="width: 20%">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($jobs as $job) {?>
                                <tr id="<?php echo $job->id?>">
                                    <td style="display: none">
                                          <span class="job-id"><?php echo $job->id?></span>
                                    </td>
                                    <td style="display: none">
                                        <span class="job-des"><?php echo $job->description?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job->id?>">
                                            <span class="job-title"><?php echo $job->title?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="job-city"><?php echo $job->cityname?></span>
                                    </td>
                                    <td>
                                        <span class="job-time"><?php echo $job->createtime?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job->id?>"><i class="icon-eye-open"></i></a>
                                        <a href="javascript:;" class="job-operate"><i class="icon-edit"></i></a>
                                        <a href="javascript:;" class="job-operate"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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
                        <ul class="project-details-list">
                            <li>
                                <h5>网址：</h5>
                                <div class="project-terms">
                                    <span class="info-home">
                                        <a href="<?php echo $model->website?>" target="_blank">
                                            <?php echo $model->website?>
                                        </a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <h5>地址：</h5>
                                <div class="project-terms">
                                    <span class="info-address"><?php echo $model->address?></span>
                                </div>
                            </li>
                            <li>
                                <h5>标签：</h5>
                                <div class="project-terms">
                                    <div class="info-tags">
                                        <ul  class="tagcloud-list">
                                            <?php
                                            $tags = empty($model->tags) ? array() : explode(' ',$model->tags);
                                            foreach($tags as $tag){
                                                ?>
                                                <li>
                                                    <span><?php echo $tag?></span>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
                                            <label for="inputEmail3" class="col-sm-2 control-label">标签：</label>
                                            <div class="col-sm-8">
                                                <div class="tag-edit">
                                                    <ul id="hasLabels" class="tagcloud-list">
                                                        <?php
                                                        $tags = empty($model->tags) ? array() : explode(' ',$model->tags);
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
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <input  id="MsCompany_tags" name="MsCompany[tags]" type="hidden" value="<?php echo $model->tags?>" />
                                                        <input  id="tags-new" type="text" size="60" maxlength="500" data-toggle="tooltip" title="新增多个标签空格分隔，例如：高富帅 白富美" class="form-control pad-bottom-5"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="info-cancel" class="btn btn-flat flat-success" data-dismiss="modal">取消</button>
                                    <button type="button"  id="info-save" class="btn btn-flat flat-success">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->

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
                    tempHtml += "<div class='text-center status'><button class='btn btn-flat flat-color'  disabled='disabled' onclick='submitjl("+data[i].job.id+")'>投简历</button></div>";
                }else{
                    tempHtml += '<div class="text-center status"><button class="btn btn-default" type="button" disabled="disabled">该职位已投</button></div>';
                }
                $content.html(tempHtml);

            }
        }
    });
    //编辑公司描述
    $("#des-update").click(function(){
        $("#des-edit").modal("show");
    })
    var um = UM.getEditor('myEditor',{
        toolbar:[
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |'
        ]
        ,initialFrameWidth:500 //初始化编辑器宽度,默认500
        ,initialFrameHeight:200  //初始化编辑器高度,默认500
    });
    $("#des-save").click(function(){
        $("#des-form").ajaxSubmit({
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update' ?>",
            dataType:"html",
            type:"post",
            success:function(data){
                data = JSON.parse(data);
                $("#company-name").html(data.name);
                $(".intro-logo img").attr("src","<?php echo Yii::app()->baseUrl.'/'?>"+data.logo);
                $("#intro-info .intro-des").html($("#myEditor").html());
                $("#des-edit").modal("hide");
            }
        });
    })
    //编辑基本信息
    $("#info-update").click(function(){
        $("#info-edit").modal("show");
        $("#tags-new").val("");
    })
    $("#info-cancel").live('click',function(){
        $("#info-show").show();
        $("#info-edit").hide();
    });
    $("#info-save").click(function(){
        var tempHtml = $("#myEditor").html();
        var tags = $.trim($("#MsCompany_tags").val()),
            newTags =$.trim($("#tags-new").val());
        if(typeof tags == "string" && !!tags && newTags != "") {tags = tags + " ";}
        tags += newTags;
        $("#MsCompany_tags").val(tags);
        $("#info-form").ajaxSubmit({
            url:"<?php echo Yii::app()->baseUrl.'/mscompany/update' ?>",
            dataType:"html",
            type:"post",
            success:function(data){
                data = JSON.parse(data);
                $("#info-show .info-home").html(data.website);
                $("#info-show .info-address").html(data.address);
                var liHtml = "";
                var tagsArr = $.trim(data.tags).split(" ");
                for(var j = 0 ;j <  tagsArr.length ; j++ ){
                    liHtml += '<li><span>' + tagsArr[j] +'</span></li>'
                }
                $("#info-show .info-tags .tagcloud-list").html(liHtml);
                $("#info-edit").modal("hide");
            }
        });
    })

    //编辑标签
    $("#hasLabels .tag-remove").live("click",function(){
        var $that = $(this),
            tags = $("#MsCompany_tags").val(),
            removeTag = $that.prev("span").html();
        $("#MsCompany_tags").val($.trim(tags.replace(removeTag+" ", "").replace(removeTag, "")));
        $that.parent().remove();
    });
    $("#tags-new").keydown(function(event){
        switch(event.keyCode) {
            case 32:
                var tags = $("#MsCompany_tags").val(),
                    newTags =$.trim($("#tags-new").val());
                if(typeof tags == "string" && !!tags) {tags = tags + " ";}
                tags += newTags;
                var tagsArr = newTags.split(" ");
                for(var j = 0 ;j <  tagsArr.length ; j++ ){
                    var tagsAll = $.map( $("#hasLabels span").toArray(), function(n){
                        return $(n).text();
                    });//$("#MsCompany_tags").val().split(" ");

                    if (jQuery.inArray(tagsArr[j], tagsAll) == -1 ){
                        var liHtml = '<li><span>' + tagsArr[j] +'</span><a  class="tag-remove" href="javascript:;" title="删除"><i class="icon-remove"></i></a></li>'
                        $("#hasLabels").append(liHtml);
                    }
                }

                break;
            // ...
            // 不同的按键可以做不同的事情
            // 不同的浏览器的keycode不同
        }
    });
    //标签输入框
    $('#tags-new').tooltip({
        animation:true,
        placement:'right',
        container:$(".tag-edit").parent().parent(),
        trigger:'hover' //触发tooltip的事件
    });

    //新增职位
    $("#job-add").click(function(){
        $("#job-new h4").text("新增职位");
        $("#job-new input[name='MsJobs[id]']").val("");
        $("#job-new input[name='MsJobs[title]']").val("");
        $("#beijing")[0].checked = true;
        $("#MsJobs_description").html("");
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
        var URL ,
            title = $("#job-new input[name='MsJobs[title]']").val(),
            citycode = $("#job-new input[name='city']:checked").val(),
            jobDesHtml = $("#MsJobs_description").html(),
            jobId = $("#job-new input[name='MsJobs[id]']").val();
        if( jobId == "" ){
            URL = "<?php echo Yii::app()->baseUrl.'/msjobs/create'?>";
        }else{
            URL = "<?php echo Yii::app()->baseUrl.'/msjobs/update/'?>"+jobId;
        }
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{MsJobs:{title:title,citycode:citycode,description:jobDesHtml}},
            url:URL,
            success:function(data) {
                if(jobId == ""){
                    var nowTime = new Date();
                    jobHtml = '<tr>'+
                        '<td style="display: none">'+
                        '<span class="job-id">'+ data.id + '</span>'+
                        '</td>'+
                        '<td style="display: none">'+
                        '<span class="job-des">'+ data.description + '</span>'+
                        '</td>'+
                        '<td>'+
                        '<a href="<?php echo Yii::app()->baseUrl."/msjobs/view/"?>'+ data.id + '" >'+
                        '<span class="job-title">'+ data.title+'</span>'+
                        '</a>'+
                        '</td>'+
                        '<td>'+
                        '<span class="job-city">'+ data.cityname + '</span>'+
                        '</td>'+
                        '<td>'+
                        '<span class="job-time">'+data.createtime +'</span>'+
                        '</td>'+
                        '<td>'+
                        '<a href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'?>' + data.id + '"style="margin-right:17px"><i class="icon-eye-open"></i></a>'+
                        '<a class="job-operate" href="javascript:;" style="margin-right:17px"><i class="icon-edit"></i></a>'+
                        '<a class="job-operate" href="javascript:;"><i class="icon-trash"></i></a>'+
                        '</td>'+
                        '</tr>';
                    $("#jobs tbody").prepend(jobHtml);
                }else{
                    var $editRow = $("#"+jobId);
                    $(".job-title",$editRow).text(data.title);
                    $(".job-des",$editRow).text(data.description);
                    $(".job-city",$editRow).text(data.cityname);
                    $(".job-time",$editRow).text(data.createtime);
                }
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
        $('#job-new').modal('show');
        var $jobRow = $(this).parents("tr"),
            jobId = $(".job-id" , $jobRow).text(),
            jobTitle = $(".job-title" , $jobRow).text(),
            jobCity = $(".job-city" , $jobRow).text(),
            jobDes = $(".job-des" , $jobRow).text();

        $("#job-new h4").text("编辑职位");
        $("#job-new input[name='MsJobs[id]']").val(jobId);
        $("#job-new input[name='MsJobs[title]']").val(jobTitle);
        var cityId = $("#job-new .radioTag label:contains('"+ jobCity + "')").attr("for");
        $("#"+cityId)[0].checked = true;
        $("#MsJobs_description").html(jobDes);
    })

    $(".job-operate .icon-trash").live("click",function(){
        if (confirm("确认删除？"))  {
            var $that = $(this);
            var jobId = $(".job-id",$that.parents('tr')).text();
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{ajax:true},
                url:"<?php echo Yii::app()->baseUrl.'/msjobs/delete/'?>"+jobId,
                success:function(data) {
                    $that.parents("tr").remove();
                }
            });
        };

    })

</script>