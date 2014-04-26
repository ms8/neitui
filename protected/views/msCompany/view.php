<section>
    <div class="container">
        <div class="row pad-25">
            <div class="clearfix col-md-9 main">
                <div class="widget">
                    <div class="media">
                        <a href="<?php echo $model->website?>" target="_blank" class="pull-left intro-logo">
                            <img alt="快入职 | 应届生招聘 |<?php echo $model->name?>"  class="media-object" src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
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
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>招聘职位</h5>
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
                    <div class="subpage-title noline">
                        <h5>基本信息</h5>
                    </div>
                    <div class="c_detail">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">名称：</label>
                                <div class="col-sm-8">
                                    <span class="info-name"><?php echo $model->name?></span>
                                </div>
                            </div>
                            <?php if($model->website != null && $model->website != ''){ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">网址：</label>
                                <div class="col-sm-8">
                                    <span class="info-name">
                                        <a href="<?php echo $model->website?>" target="_blank">
                                            <?php echo $model->website?>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <?php } if($model->address != null && $model->address != ''){?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4">地址：</label>
                                <div class="col-sm-8">
                                    <span class="info-name">
                                       <?php echo $model->address?>
                                    </span>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div class="widget tagcloud">
                    <div class="subpage-title noline">
                        <h5>公司印象</h5>
                    </div>
                    <ul class="tagcloud-list">
                        <?php
                        if($model->tags != null && $model->tags != ''){
                            $tags = explode(' ',$model->tags);
                            foreach($tags as $tag){
                                echo '<li><a href="#">'. $tag .'</a></li>';
                            }
                        }else{
                            echo '太低调了,还没公布公司印象.';
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
                        <label for="inputPassword3" class="col-sm-2 control-label">选择简历:</label>
                        <div class="col-sm-9">
<!--                            <input type="file" name="jianlifile" class=" class="form-control">-->
                            <input id="lefile" type="file"  name="jianlifile" style="display:none">
                            <div class="input-group">
                                <input id="photoCover" class="form-control" type="text" >
                            <span id="apply" class="input-group-addon" onclick="$('input[id=lefile]').click();">
                                选择简历
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
<!--                        <label for="inputPassword3" class="col-sm-3 control-label">设置为默认简历：</label>-->
<!--                        <div class="col-sm-9">-->
<!--                             <input name="companyid" value="--><?php //echo $model->id?><!--" type="hidden">-->
<!--                            <input name="jobid"  type="hidden">-->
<!--                            <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;-->
<!--                            <input type="radio" value="0" name="flag" >否-->
<!--                        </div>-->
                        <label for="inputPassword3" style="line-height: 30px;" class="col-sm-3 control-label">设置为默认简历：</label>
                        <div class="col-sm-5">
                            <input name="companyid" value="<?php echo $model->id?>" type="hidden">
                            <input name="jobid"  type="hidden">
                            <div class="radio" name="flag">
                                <ins class="checked" value="1" ></ins>
                                <span>是</span>
                            </div>
                            <div class="radio" name="flag">
                                <ins class="" value="0" ></ins>
                                <span>否</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-11 control-label">
                            <button id="jianlisubmit" class="btn btn-flat flat-color"  style="padding:10px 16px;border-radius:3px" type="button">上传简历</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- 弹出对话框让用户选择简历-->
<!--<div id="chooseDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">-->
<!--    <div style="height: 40px;background-color: #088b69">-->
<!--        <div style="float: left">投递该职位</div>-->
<!--        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="choose-close">X</div>-->
<!--    </div>-->
<!---->
<!--    <div style="height: 220px;background-color: #71bd90;padding-top:50px">-->
<!--        <form id="chooseForm" class="login" method="post" enctype="multipart/form-data"-->
<!--              action="--><?php //echo Yii::app()->baseUrl.'/kongjian/apply'?><!--">-->
<!--            <div class="col-sm-6">-->
<!--                <input name="companyid" value="--><?php //echo $model->id?><!--" type="hidden">-->
<!--                <input name="jobid"  type="hidden">-->
<!--                <input name="jianliid" id="jianliid" value="" type="hidden">-->
<!--                <div id="jianlis">-->
<!--                </div>-->
<!--                投递其他职位时默认使用该简历：<br>-->
<!--                <input type="radio" value="1" name="defaultflag" checked>是 &nbsp;&nbsp;&nbsp;-->
<!--                <input type="radio" value="0" name="defaultflag" >否-->
<!--            </div>-->
<!--            <button class="btn btn-danger" id="choose_td" type="button">投简历</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<!-- 弹出对话框上传简历-->
<div class="modal fade" id="chooseDiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">选择简历</h4>
            </div>
            <div class="modal-body">
                <form  action="<?php echo Yii::app()->baseUrl.'/kongjian/apply'?>" role="form" method="post" enctype="multipart/form-data"   id="chooseForm"   class="form-horizontal" >
                    <input name="companyid" value="<?php echo $model->id?>" type="hidden">
                    <input name="jobid" id="jobid"  type="hidden">
                    <input name="jianliid" id="jlid" value="" type="hidden">
                    <input name="defaultflag" id="isdefault" value="1" type="hidden">
                    <div id="jianlis" class="form-group">
<!--                        <label for="inputPassword3" class="col-sm-3 control-label">选择简历:</label>-->
<!--                        <div class="col-sm-9">-->
<!--                            <input type="file" name="jianlifile" class=" class="form-control">-->
<!--                        </div>-->
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" style="line-height: 30px;" class="col-sm-3 control-label">设置为默认简历：</label>
                        <div class="col-sm-5"  id="setDefault" >
                            <div class="radio" name="isdefault">
                                <ins class="checked" value="1" ></ins>
                                <span>是</span>
                            </div>
                            <div class="radio" name="isdefault">
                                <ins class="" value="0" ></ins>
                                <span>否</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">
                            <button id="choose_td" class="btn btn-flat flat-color" type="button">投简历</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    $("#choose_td").live('click',function(){
        //var jianli = $('input[name="chosen"]:checked').val();
        //$("#jianliid").val(jianli);
        if($("#jianlis .radio .checked").length <=0){
            alert("请选择简历");
            return;
        }
        if($("#setDefault .radio .checked").length <=0){
            alert("该简历是否作为默认简历？");
            return;
        }
        $("#chooseForm").submit();
    });

    $('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val());
    });

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
                    $("#jianlis").empty();
                    for(; i<length; i++) {
                        jianli = data[i];
//                        html_str += "<div><input type='radio' name='chosen' value='"+jianli.id+"'>"
//                            +jianli.name+"</div>";
                        //
                        html_str += '<div class="radio" name="jlid"><ins   value="'
                            +jianli.id+'"></ins><span>'+jianli.name+'</span></div>';
                    }
                    $("#jobid").val(id);
                    $("#jianlis").append(html_str);
                    $("#chooseDiv").modal('show');
                }
            }
        });
    };
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");

        //上传简历
        $("#jianlisubmit").click(function(){
                var targetEle = $(".status","#collapse"+$("input[name='jobid']",this.form).val());
                $(this.form).ajaxSubmit({
                    url:"<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>",
                    dataType:"json",
                    success:function(data){
                        if(data.status == 1){
                            $("#uploadDiv").modal('hide');
                            targetEle.html('<button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>');
                        }else{
                            alert(data.message);
                        }
                    }
                });
        });


        //职位信息
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'<?php echo Yii::app()->createUrl("msjobs/view")."/".$model->id?>',
            success:function(data) {
                for(var i = 0; i < data.length; i++){
                    var $content = $("#collapse"+data[i].job.id+" .panel-body");
                    var tempHtml = "<p>"+data[i].job.description+"</p>"
                    if(data[i].status == "0"){
                        tempHtml += "<div class='text-center status'><button class='btn btn-flat flat-color' " +
                            <?php
                            if(!Yii::app()->user->isGuest){
                                $user = Member::model()->findByPk(Yii::app()->user->id);
                                if($user!=null && $user->type=='2'){ //企业用户不能投简历
                                ?>
                            "disabled='disabled' "+
                        <?php }
                        }?>

                            "id='submitbt' onclick='submitjl("+data[i].job.id+")'>投简历</button></div>";
                    }else{
                        tempHtml += '<div class="text-center status"><button class="btn btn-default" type="button" disabled="disabled">该职位已投</button></div>';
                    }
                    $content.html(tempHtml);

                }
            }
        });

    });

    (function($) {
        $.icheck = {
            init: function() {
                var _this = this;
                _this._checkbox = "checkbox";
                _this._radio = "radio";
                _this._disabled = "disabled";
                _this._enable = "enable";
                _this._checked = "checked";
                _this._hover = "hover";
                _this._arrtype = [_this._checkbox, _this._radio];
                _this._mobile = /ipad|iphone|ipod|android|blackberry|windows phone|opera mini|silk/i.test(navigator.userAgent);
                $.each(_this._arrtype, function(k, v) {
                    _this.click(v);
                    if(!_this._mobile){
                        _this.mouseover(v);
                        _this.mouseout(v);
                    }
                });
            },
            click: function(elem) {
                var _this = this;
                elem = "." + elem;
                $(document).on("click", elem, function() {
                    var $this = $(this),
                        _ins = $this.find("ins");
                    if (!(_ins.hasClass(_this._disabled) || _ins.hasClass(_this._enable))) {
                        if ( !! _ins.hasClass(_this._checked)) {
                            _ins.removeClass(_this._checked).addClass(_this._hover);
                        } else {
                            var _name ="";
                            if (/radio/ig.test(elem)) {
                                _name =$this.attr("name");
                                $(elem + "[name=" + _name + "]").find("ins").removeClass(_this._checked);
                            }
                            $(elem).find("ins").removeClass(_this._hover);
                            _ins.addClass(_this._checked);
                            //给与id它的name 相同的input 赋值
                            $("#"+_name).val(_ins.attr("value"));
//                            var ttt = _ins.attr("value");
//                            ttt="";
                        }
                    }
                });
            },
            mouseover: function(elem) {
                var _this = this;
                elem = "." + elem;
                $(document).on("mouseover", elem, function() {
                    var $this = $(this);
                    var _ins = $this.find("ins");
                    if (!(_ins.hasClass(_this._disabled) || _ins.hasClass(_this._enable) || _ins.hasClass(_this._checked))) {
                        _ins.addClass(_this._hover);
                        $this.css("cursor","pointer");
                    } else{
                        $this.css("cursor","default");
                    }
                });
            },
            mouseout: function(elem) {
                var _this = this;
                elem = "." + elem;
                $(document).on("mouseout", elem, function() {
                    $(elem).find("ins").removeClass(_this._hover);
                });
            }
        };

        $.icheck.init();

    })(jQuery);
</script>