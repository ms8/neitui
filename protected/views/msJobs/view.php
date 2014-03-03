<div class="clearfix">
    <div class="content_l">
        <dl class="job_detail">
            <dt>
            <h1 >
                <?php echo $model->title?>
            </h1>

            </dt>
            <dd class="job_request">
                <div>发布时间：<?php echo $model->createtime?></div>
            </dd>
            <div class="clear"></div>
            <dd class="job_bt">
                <h3 class="description">职位描述</h3>
                <p>
                    <?php echo $model->description?>
                </p>
            </dd>

            <dd>
                <div>
                    <?php if($finish == '0'){?>
                    <button class="btn" id="submitbt" onclick="submitjl(<?php echo $model->id?>)">投简历</button>
                    <?php }else{ ?>
                        <span>该职位已投过简历</span>
                    <?php }?>
                </div>
            </dd>
        </dl>
        <div id="weibolist"></div>
    </div>
    <div class="content_r">
        <dl class="job_company">
            <div style="width: 190px;height: 110px;">
                <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$company->id?>">
                    <img style="display:block;width: 190px;height: 110px;" alt="<?php echo $company->name?>"
                         src="<?php echo Yii::app()->baseUrl.'/'.$company->logo?>" class="b2">
                </a>
            </div>
            <div style="">
                <?php echo $company->name?>
            </div>
            <dd>
                <ul class="c_feature reset">
                    <?php if($company->website != null){?>
                    <li>
                        <span>主页</span>
                        <a rel="nofollow" title="<?php echo $company->website?>" target="_blank" href="<?php echo $company->website?>">
                            <?php echo $company->website?>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($company->address != null){?>
                        <li>
                            <span>地址</span>
                            <?php echo $company->address?>
                        </li>
                    <?php }?>
                </ul>
            </dd>
        </dl>
    </div>
</div>

<!-- 弹出登录框-->
<div id="loginDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div id="header" style="height: 40px;background-color: #088b69">
        <div style="float: left">登录</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="login-close">X</div>
    </div>

    <div id="content" style="height: 170px;background-color: #71bd90;padding-top:50px">
        <form id="loginForm" class="login" method="post" action="<?php echo Yii::app()->baseUrl.'/site/login'?>">
            <div style="margin: 0px 0 10px 20px;">
                <label>用户名</label>
                <input id="username" name="LoginForm[username]">
            </div>
            <div style="margin-left: 20px;">
                <label>密码</label>
                <input id="password" name="LoginForm[password]">
            </div>
        </form>
    </div>

    <div id="footer" style="height: 50px;">
        <button id="loginbt" style="float: right;margin-top:-30px;margin-right:20px;width:50px;height:30px">登录</button>
    </div>
</div>
<!-- -->
<!-- 弹出对话框上传简历-->
<div id="uploadDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div style="height: 40px;background-color: #088b69">
        <div style="float: left">上传简历并投递该职位</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="upload-close">X</div>
    </div>

    <div style="height: 220px;background-color: #71bd90;padding-top:50px">
        <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"
              action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>">
            <label for="inputPassword3" class="col-sm-1 control-label">简历:</label>
            <div class="col-sm-6">
                <input type="file" name="jianlifile" class=" class="form-control">
            </div>
            <button id="jianliSubmit" class="btn btn-danger"  type="submit">上传简历</button>
            <div style="clear:both"></div>
            <div class="col-sm-5">
                <input name="companyid" value="<?php echo $company->id?>" type="hidden">
                <input name="jobid" value="<?php echo $model->id?>" type="hidden">
                投递其他职位时默认使用该简历：<br>
                <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;
                <input type="radio" value="0" name="flag" >否
            </div>
        </form>
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
    function submitjl(id){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'jobid':id},
            url:'<?php echo Yii::app()->baseUrl.'/msjobs/apply'?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $("#loginDiv").show();

                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv").show();
                }else if(data == '2'){ //投递成功，刷新页面
                    window.location.reload();
                }else{
                    var i=0, length=data.length, jianli;
                    for(; i<length; i++) {
                        jianli = data[i];

                    }
                }
            }
        });
    };
</script>