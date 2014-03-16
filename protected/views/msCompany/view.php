<section>
    <div class="container">
        <div class="row">
            <div class="clearfix col-md-9 main">
                <div class="post-wrapper">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="<?php echo $model->name?>"  class="media-object" style="width: 190px; height: 190px;" src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->name?></h4>
                            <?php if($model->status == '1'){ ?>
                                <div style="color: red">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                            <?php }?>
                            <p><?php echo $model->description?></p>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper">
                    <div class="subpage-title">
                        <h5>招聘职位</h5>
                    </div>
                    <div id="accordion" class="panel-group">
                        <?php foreach($jobs as $job){?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#collapse<?php echo $job->id?>" job-id="<?php echo $job->id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                        <span title="Java" class="pos"><?php echo $job->title?></span>
                                        <span class="job-terms"><?php echo $job->createtime?></span>
                                        <span class="job-city"><?php echo $job->cityname?></span>
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse<?php echo $job->id?>" style="height: 0px;">
                                <div class="panel-body"></div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
<!--                    <ul id="jobList" class="job-details-list">-->
<!--                        --><?php //foreach($jobs as $job){?>
<!--                            <li>-->
<!--                                    <a target="_blank"-->
<!--                                   href="--><?php //echo Yii::app()->baseUrl.'/msjobs/view/'.$job->id?><!--">-->
<!--                                        <span title="Java" class="pos">--><?php //echo $job->title?><!--</span>-->
<!--                                        <span class="job-terms">--><?php //echo $job->createtime?><!--</span>-->
<!--                                        <span class="job-city">--><?php //echo $job->cityname?><!--</span>-->
<!--                                    </a>-->
<!--                            </li>-->
<!--                        --><?php //}?>
<!--                    </ul>-->
                </div>

            </div>
            <div class="col-md-3 sidebar">
                <div class="widget popular-posts">
                    <div class="subpage-title">
                        <h5>基本信息</h5>
                    </div>
                    <dl class="dl-horizontal companyInfo">
                        <dt>地点</dt>
                        <dd>北京</dd>
                        <dt>领域</dt>
                        <dd>互联网</dd>
                        <dt>规模</dt>
                        <dd>150</dd>
                        <dt>网址</dt>
                        <dd><a href="<?php echo $model->website?>" target="_blank">
                                <?php echo $model->website?>
                            </a></dd>
                        <dt>地址</dt>
                        <dd><?php echo $model->address?></dd>
                    </dl>
                </div>
                <div class="widget tagcloud">
                    <div class="subpage-title">
                        <h5>公司印象</h5>
                    </div>
                    <ul class="tagcloud-list">
                        <?php
                        $tags = explode(' ',$model->tags);
                        foreach($tags as $tag){
                            ?>
                            <li><a href="#"><?php echo $tag?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 弹出对话框上传简历-->
<div class="modal fade" id="uploadDiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">上传并投递简历</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data"    class="form-horizontal" >
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">选择简历:</label>
                        <div class="col-sm-9">
                            <input type="file" name="jianlifile" class=" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">设置为默认简历：</label>
                        <div class="col-sm-9">
                             <input name="companyid" value="<?php echo $model->id?>" type="hidden">
                            <input name="jobid"  type="hidden">
                            <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;
                            <input type="radio" value="0" name="flag" >否
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            <button id="jianliSubmit" class="btn btn-danger"  type="button">上传简历</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- 弹出对话框让用户选择简历-->
<div id="chooseDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div style="height: 40px;background-color: #088b69">
        <div style="float: left">投递该职位</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="choose-close">X</div>
    </div>

    <div style="height: 220px;background-color: #71bd90;padding-top:50px">
        <form id="chooseForm" class="login" method="post" enctype="multipart/form-data"
              action="<?php echo Yii::app()->baseUrl.'/kongjian/apply'?>">
            <div class="col-sm-6">
                <input name="companyid" value="<?php echo $model->id?>" type="hidden">
                <input name="jobid"  type="hidden">
                <input name="jianliid" id="jianliid" value="" type="hidden">
                <div id="jianlis">
                </div>
                投递其他职位时默认使用该简历：<br>
                <input type="radio" value="1" name="defaultflag" checked>是 &nbsp;&nbsp;&nbsp;
                <input type="radio" value="0" name="defaultflag" >否
            </div>
            <button class="btn btn-danger" id="choose_td" type="button">投简历</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    //投简历
    function submitjl(id){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'jobid':id},
            url:'<?php echo Yii::app()->baseUrl.'/msjobs/apply'?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $('#myModal').modal('show')
                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv input[name='jobid']").val(id);
                    $("#uploadDiv").modal('show');
                }else if(data == '2'){ //投递成功，刷新页面
                    $("#collapse"+id+" .panel-body .status").html('<button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>');
                }else{ //让用户选择投递的简历，并设置为默认投递的简历
                    var i=0, length=data.length, jianli;
                    var html_str = "";
                    for(; i<length; i++) {
                        jianli = data[i];
                        html_str += "<div><input type='radio' name='chosen' value='"+jianli.id+"'>"
                            +jianli.name+"</div>";
                    }
                    $("#jianlis").append(html_str);
                    $("#chooseDiv").show();
                }
            }
        });
    };
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");

        //上传简历
        $("#jianliSubmit").click(function(){
                var targetEle = $(".status","#collapse"+$("input[name='jobid']",this.form).val());
                $(this.form).ajaxSubmit({
                    url:"<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>",
                    dataType:"json",
                    success:function(data){
                        if(data.status == 1){
                            $("#uploadDiv").modal('hide');
                            targetEle.html('<button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>');
                        }
                    }
                });
        })


        //展开职位信息
        $('#accordion').on('show.bs.collapse', function (options,target) {
            var jobId = $(target).attr("job-id");
            var $content = $("#collapse"+jobId+" .panel-body");
            if($content.html() == "") {
                $.ajax({
                    type:'POST',
                    dataType:'json',
                    url:'<?php echo Yii::app()->createUrl('msjobs/view')?>'+"/"+jobId,
                    success:function(data) {
                        var tempHtml = "<p>"+data.description+"</p>"
                        if(data.finish == "0"){
                            tempHtml += "<div class='text-center status'><button class='btn btn-flat flat-color' id='submitbt' onclick='submitjl("+jobId+")'>投简历</button></div>";
                        }else{
                            tempHtml += '<div class="text-center status"><button class="btn btn-default" type="button" disabled="disabled">该职位已投</button></div>';
                        }
                        $content.html(tempHtml);
                    }
                });
            }

        })
    })
</script>