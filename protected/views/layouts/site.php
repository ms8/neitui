<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta name="baidu-site-verification" content="t4WhrRxoqk" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" >
    <meta name="robots" content="all" />
    <meta name="author" content="admin@kuairuzhi.com" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl.CSS_PATH.'images/favicon.ico'?>" />
    <title><?php echo $this->pageKeyword['title'];  ?></title>
    <meta name="keywords" content="<?php echo $this->pageKeyword['keywords'];  ?>" >
    <meta name="description" content="<?php echo $this->pageKeyword['description'];  ?>" >
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.JS_PATH.'html5shiv.js'?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl.JS_PATH.'respond.min.js'?>"></script>
    <![endif]-->
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'font-awesome/css/font-awesome.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/skins.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/stylesheet.css');
    Yii::app()->clientScript->registerCoreScript('jquery');
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.form.js');
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_GLOBAL.'bootstrap.min.js');
//    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'validate.min.js');
    ?>
</head>

<body style="margin:0 auto;">
<div class="color-skin-1" id="utter-wrapper">
    <header data-offset-top="10" data-spy="affix" class="header affix-top" id="header">
        <nav role="navigation" class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="http://www.kuairuzhi.com/" class="navbar-brand">
                        <img alt="快入职" src="<?php echo Yii::app()->baseUrl.CSS_PATH.'/images/logo.png'?>" width="240px" />
<!--                        快<span>入职</span>-->
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <?php if(Yii::app()->request->getUrl()==Yii::app()->homeUrl){?>
                        <li class="dropdown active">
                        <?php }else{?>
                        <li class="dropdown">
                        <?php }?>
                            <a href="<?php echo Yii::app()->baseUrl."/"?>">首页</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo Yii::app()->createUrl('/mscompany/index')?>">公司</a>
                        </li>
                        <?php if(!Yii::app()->user->isGuest){
                                $user=Member::model()->findByPk(Yii::app()->user->id);
                                if($user->type == '1'){
                        ?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心<i class="icon-sort-down"></i></a>
                                <ul class="dropdown-menu">
<!--                                    <li><a href="--><?php //echo Yii::app()->createUrl('/kongjian/application')?><!--">投递职位</a></li>-->
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/dashboard')?>">个人信息</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/jianli')?>">我的简历</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/changepwd')?>">修改密码</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/site/logout')?>">退出</a></li>
                                </ul>
                            </li>
                        <?php   }else{ ?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心<i class="icon-sort-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/dashboard')?>">公司信息</a></li>
<!--                                    <li><a href="--><?php //echo Yii::app()->createUrl('/msjobs/create')?><!--">职位信息</a></li>-->
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/jianlis')?>">收到的简历</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/changepwd')?>">修改密码</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/site/logout')?>">退出</a></li>
                                </ul>
                            </li>
                        <?php
                                }
                        ?>
                            <li class="dropdown">
                                <!--                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">关于我们</a>-->
                                <a href="#"data-toggle="modal" data-target="#adviceModal">意见反馈</a>
                            </li>
                        <?php
                        } else {?>
                            <li class="dropdown">
                                <a href="#"  data-toggle="modal" data-target="#myModal">登录</a>
                            </li>
                            <li class="dropdown">
                                <a href="#"data-toggle="modal" data-target="#registerModal">注册</a>
                            </li>
                            <li class="dropdown">
                                <a href="#"data-toggle="modal" data-target="#adviceModal">意见反馈</a>
                            </li>
                        <?php }?>
                    </ul>
                    <!-- /.nav -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->
    </header>
</div>
<div class="main-wrapper">
<?php echo $content ?>
</div>
<div class="footer" id="footer-1">
    <ul>
        <li>
            <a href="<?php echo Yii::app()->baseUrl."/"?>">首页</a> |
            <a href="<?php echo Yii::app()->createUrl('/mscompany/index')?>">招聘公司</a> |
            <a href="#">关于我们</a> |
            <a href="#">联系方式</a>
        </li>
    </ul>
</div>

<!-- Modal advice-->
<div class="modal fade" id="adviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">意见反馈</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="adviceForm" action="" class="form-horizontal" >
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">您的邮箱:</label>
                        <div class="col-sm-7">
                            <input type="text" required="" placeholder="请填写您的邮箱地址，方便我们联系您"  id="emailAdvice" name="emailAdvice" class="form-control"/>
                        </div>
                        <div class="col-sm-3 errorMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">意见:</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" style="width:400px" rows="5" cols="60" id="adviceContent"
                                   name="adviceContent"
                               placeholder="请填写您的宝贵意见，快入职期待为您提供更好的服务"></textarea>
                        </div>
                        <div class="col-sm-3 errorMessage" ></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-flat flat-color col-sm-3" type="button" onclick="advice()" >提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<!-- Modal login-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">登录</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="loginForm" action="<?php echo Yii::app()->createUrl('site/login')?>" class="form-horizontal" >
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">账号:</label>
                        <div class="col-sm-7">
                            <input type="text" required="" placeholder="账号"  id="username" name="username" class="form-control"/>
                        </div>
                        <div class="col-sm-3 errorMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码:</label>
                        <div class="col-sm-7">
                            <input type="password" required=""  placeholder="密码" id="password" name="password" class="form-control"/>
                        </div>
                        <div id="loginErr" class="col-sm-3 errorMessage" ></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="">
                                <label>
                                    <input type="checkbox" name="autoLogin"  id="remember"/> 记住我
                                </label>
                                <a target="_blank"  href="<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/forgetpassword'?>">忘记密码?</a>
                                |
                                <a onclick="$('#myModal').modal('hide')" href="#"data-toggle="modal" data-target="#registerModal">没有账号? 马上注册</a>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button class="btn btn-flat flat-color col-sm-12" type="button" onclick="login()">登录</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<!-- 注册 -->
<!-- Modal login-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">注册用户</h4>
            </div>
            <div class="modal-body">
                <form name="registerForm"  id="registerForm" role="form" method="post"  class="form-horizontal" >
                    <div class="form-group">
                        <label class="col-sm-2 control-label">角色:</label>
                        <div class="col-sm-10">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-flat flat-success btn-bordered">
                                    <input type="radio" value="1" name="type" id="type1"> 应聘者
                                </label>
                                <label class="btn btn-flat flat-success btn-bordered">
                                    <input type="radio" value="2" name="type" id="type2"> 企业
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">账号:</label>
                        <div class="col-sm-9">
                            <input type="text" required="" onblur="checkUser(this)" placeholder="请输入邮箱地址"  id="email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">密码:</label>
                        <div class="col-sm-9">
                             <input name="register_password" type="password" required=""  placeholder="密码" id="rpassword" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"  style="padding:12px 5px">确认密码:</label>
                        <div class="col-sm-9">
                            <input name="register_password_confirm" class="form-control" type="password" placeholder="确认密码">
                        </div>
<!--                        <label  class="col-sm-4  errorMessage text-left" error-message="password_confirm">-->
<!--                        </label>-->
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                            <div class="">
                                <label>
                                    <input type="checkbox" class="checkbox valid" checked="checked" name="checkbox" id="checkbox"/>
                                    我已阅读并同意
                                </label>
                                <a target="_blank" href="<?php echo Yii::app()->createUrl('/site/privacy')?>">《快入职用户协议》</a>
                            </div>
                        </div>
                        <div id="errRegMsg" style="display: none" class="col-sm-3 errorMessage">用户名已经被注册</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button id="registerSubmit" class="btn btn-flat flat-color col-sm-3" type="button" >注册</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->
</body>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.form.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_GLOBAL.'bootstrap.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'validate.min.js');
?>
<script type="text/javascript">
    $(function(){
        $(document).keydown(function(e){
            var curKey = e.which;
            if(curKey == 13){
                if($("#myModal").is(":visible")){//登录框提交
                    login();
                }else if($("#registerModal").is(":visible")){//注册框提交
                    register();
                }
            }
        });

        //记住密码
        var cookie = SubCookieUtil.getAll("loginInfo");
        if (cookie != null){
            document.getElementById("remember").checked = true ;
            $("#username").val(cookie.name);
            $("#password").val(cookie.password);
        }
        $("#remember").click(function(){
            if (this.checked){
                if (cookie != null){
                    return;
                }else{
                    var now = new Date()
                    var expiresDate = new Date(now.getTime() + 1000 * 60 * 60 * 24 * 7)
                    SubCookieUtil.setAll("loginInfo",{name:$("#username").val(),password: $("#password").val()},expiresDate);
                }
            }else{
                SubCookieUtil.unsetAll("loginInfo");
            }
        })

        //表单校验
        var registerVal = new FormValidator('registerForm', [{
            name: 'register_password',
            display: '密码',
            rules: 'required'
        },{
            name: 'register_password_confirm',
            display: '确认密码',
            rules: 'required|matches[register_password]'}
        ], function(errors, event) {
            if (errors.length > 0) {
//                $("#errRegMsg").text(errors[0].name);
//                $("#errRegMsg").show();
                if (errors.length > 0) {
                    for(var i = 0; i < errors.length ; i++){
                        $("#errRegMsg").text(errors[i].message);
                    }
                    $("#errRegMsg").show();
                }
            }
        });

        //提交表单
        $("#registerSubmit").click((function(validate){
            return function(){
                if(validate._validateForm($("#registerForm")[0])){
                    register();
                }
            }
        })(registerVal));
    });


    function advice(){
        var email = $("#emailAdvice").val();
        var advice = $("#adviceContent").val();
        if(email == "" || advice == "")
            return;
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'email':email,'advice':advice},
            url:'<?php echo Yii::app()->createUrl('site/advice')?>',
            success:function(data) {
                if(data == true){
                    alert('提交成功,稍后我们将通过'+email+'这个地址与您联系\n谢谢您的宝贵意见，快入职期待为您提供更好的服务');
                }else {
                    alert('服务器正忙，请稍后提交');
                }
                $('#adviceModal').modal('toggle');
            }
        });
    }

    //表单校验
    var loginValitor = new FormValidator('loginForm', [{
        name: 'username',
        display: '账号',
        rules: 'required'
    },{
        name: 'password',
        display: '密码',
        rules: 'required'}
    ], function(errors) {
        if (errors.length > 0) {
            for(var i = 0; i < errors.length ; i++){
                $("#"+errors[i].id).parent().next().empty().append(errors[i].message);
//                $("label[error-message='"+errors[i].name +"']").empty().append(errors[i].message);
            }
        }
    });
    function login(){
        var username = $("#username").val();
        var password = $("#password").val();
        $("#loginErr").text("");
        if(loginValitor._validateForm($("#loginForm")[0])){
            $(".errorMessage").each(function(){
                $(this).empty();
            });
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'username':username,'password':password},
                url:'<?php echo Yii::app()->createUrl('site/login')?>',
                success:function(data) {
                    if(data == 'fail'){
                        $("#loginErr").text('用户名或密码错误');
                    }else {
                        window.location.href="<?php echo Yii::app()->baseUrl?>"+data;
                    }
                }
            });
        }

    }
    var user_conflict=false;
    function checkUser(obj){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':$(obj).val()},
            url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/checkUser'?>',
            success:function(data) {
                if(data == '1'){
                    $("#errRegMsg").text('用户名已被注册');
                    $("#errRegMsg").show();
                    user_conflict = true;
                }else{
                    $("#errRegMsg").hide();
                    user_conflict = false;
                }
            }
        });
    }

    function register(){
        var username = $("#email").val();
        var password = $("#rpassword").val();
        var type = $('input[name="type"]:checked').val();
        if(type == undefined){
            alert('您是应聘者还是企业用户呢？请选择对应的角色。')
            return;
        }
        var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
        if(user_conflict){
            alert('用户名已被注册,请更换另一个用户名');
            return;
        }
        if(!search_str.test(username)){
            alert('请填写正确的邮箱地址');
            $('#Member_username').focus();
            return false;
        }
        if($("#checkbox").attr("checked")!='checked'){
            alert('非常抱歉，您需要同意我们的注册协议才能注册');
            return false;
        }
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username,'password':password,'type':type},
            url:'<?php echo Yii::app()->createUrl('site/register')?>',
            success:function(data) {
                if(data == 'fail'){
                    $("#errRegMsg").text('注册失败');
                    $("#errRegMsg").show();
                }else {
                    window.location.href="<?php echo Yii::app()->baseUrl?>"+data;
                }
            }
        });
    }
</script>

</html>
