<div class="container">
    <div class="row">
        <div class="col-md-9">
            <section class="pad-top-25">
                <div class="widget" style="min-height:280px;">
                    <div class="subpage-title noline">
                        <h5>
                            <?php echo $model->title?>
                            <em  style="float:right;font-size:13px;color: #aaaaaa;">
                                发布日期：<?php echo substr($model->createtime,0,10)?>
                            </em>
                        </h5>
                    </div>
                    <div style="padding:20px">
                        <?php echo $model->description?>
                        <div class="text-center status" id="jodBt">
                            <?php if($finish == '0'){?>
                                <button class="btn btn-flat flat-color"   id="submitbt" onclick="submitjl(<?php echo $model->id?>)">投简历</button>
                            <?php }else{ ?>
                                <span>该职位已投过简历</span>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="pad-top-25">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>
                            <a target="_blank" href="<?php echo $company->website?>">
                                <?php echo $company->name?>
                            </a>
                            <em  style="float:right;font-size:13px;color: #aaaaaa;">
                                公司信息
                            </em>
                        </h5>
                    </div>
                    <div class="media"  style="padding: 10px;margin-top:0px">
                        <a class="pull-left intro-logo" target="_blank" href="<?php echo $company->website?>">
                            <img src="<?php echo Yii::app()->baseUrl."/".$company->logo?>"
                                 class="media-object" alt="快入职 | 应届生招聘 |<?php echo $company->name?>">
                        </a>
                        <div class="media-body">
                            <p><?php echo $company->description?></p>
                        </div>
                        <div style="clear: both"></div>
                        <div class="media" style="margin-top:5px;">
                            <h5>【公司地址】
                                <em style="font-size:14px;color: #aaaaaa;">
                                    <?php echo $company->address?>
                                </em></h5>
                        </div>
                        <div style="clear: both"></div>
                        <div class="media" style="margin-top:0px;" >
                            <h5>【公司全部职位】</h5>
                            <div id="accordion" class="panel-group">
                                <?php foreach($jobs as $job){?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="#collapse<?php echo $job['job']->id?>" job-id="<?php echo $job['job']->id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                                    <span class="job-title"><?php echo $job['job']->title?></span>
                                                    <span class="job-city"><?php echo $job['job']->cityname?></span>
                                                    <span class="job-terms"><?php echo $job['job']->createtime?></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="panel-collapse collapse" id="collapse<?php echo $job['job']->id?>" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><?php echo $job['job']->description?></p>
                                                <div class='text-center status'>
                                                    <?php if($job['status'] == '0'){?>
                                                        <button class='btn btn-flat flat-color'
                                                            <?php if(!Yii::app()->user->isGuest){
                                                                $user = Member::model()->findByPk(Yii::app()->user->id);
                                                                if($user!=null && $user->type=='2'){ //企业用户不能投简历
                                                                    ?>
                                                                    disabled='disabled'
                                                                <?php }}?>
                                                                id='submitbt' onclick='submitjl(<?php echo $job['job']->id?>)'>投简历</button>
                                                    <?php }else{?>
                                                        <button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <!-- *******************  -->
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-3">
            <section class="pad-top-25">
                <div class="widget" style="min-height:280px;">
                    <div class="subpage-title noline">
                        <h5>其他职位</h5>
                    </div>
                    <div style="padding: 10px;">
                        <?php foreach($others as $other){?>
                            <div style="margin-top: 5px;">
                                <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$other->id?>">
                                    <?php echo $other->title?>
                                </a>
                                <em style="float: right"><?php echo substr($other->createtime,0,10)?></em>
                                </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- -->

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
                        <label for="inputPassword3" class="col-sm-2 control-label">简历:</label>
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
                        <label for="inputPassword3" style="line-height: 30px;" class="col-sm-3 control-label">设为默认简历：</label>
                        <div class="col-sm-5">
                            <input name="companyid" value="<?php echo $company->id?>" type="hidden">
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
                    <input name="companyid" value="<?php echo $company->id?>" type="hidden">
                    <input name="jobid" id="jobid"  type="hidden">
                    <input name="jianliid" id="jlid" value="" type="hidden">
                    <input name="defaultflag" id="isdefault" value="1" type="hidden">
                    <div id="jianlis" class="form-group"></div>
                    <div class="form-group">
                        <label for="inputPassword3" style="line-height: 30px;" class="col-sm-3 control-label">设为默认简历：</label>
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

<script>
    $("#login-close").live('click',function(){
        $("#loginDiv").hide();
    });
    $('#loginbt').live('click',function(){
        $("#loginForm").submit();
    });
    $("#upload-close").live('click',function(){
        $("#uploadDiv").hide();
    });
    $("#choose-close").live('click',function(){
        //清除里面动态生成的内容
        $("#jianlis").empty();
        $("#chooseDiv").hide();
    });
    $("#choose_td").live('click',function(){
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

    function submitjl(id){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'jobid':id},
            url:'<?php echo Yii::app()->baseUrl.'/msjobs/apply'?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $('#myModal').modal('show');
                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv input[name='jobid']").val(id);
                    $("#uploadDiv").modal('show');
                }else if(data == '2'){ //投递成功，刷新页面
                    $("#collapse"+id+" .panel-body .status").html('<button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>');
                    //window.location.href = window.location.href;
                }else{ //让用户选择投递的简历，并设置为默认投递的简历
                    var i=0, length=data.length, jianli;
                    var html_str = "";
                    $("#jianlis").empty();
                    for(; i<length; i++) {
                        jianli = data[i];
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

    //上传简历
    $("#jianlisubmit").click(function(){
        var targetEle = $(".status","#collapse"+$("input[name='jobid']",this.form).val());
        $(this.form).ajaxSubmit({
            url:"<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>",
            dataType:"json",
            success:function(data){
                if(data.status == 1){
                    $("#uploadDiv").modal('hide');
                    //targetEle.html('<button class="btn btn-default" type="button" disabled="disabled">该职位已投</button>');
                    //targetEle = $(".status","#jodBt");
                    //targetEle.html('<span>该职位已投过简历</span>');
                }else{
                    alert(data.message);
                }
                window.location.href = window.location.href;
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