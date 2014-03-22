<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="baidu-site-verification" content="t4WhrRxoqk" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="all" />
    <meta name="author" content="mianshi8@qq.com" />
    <meta name="Copyright" content="mianshi8" />
    <title><?php echo $this->pageKeyword['title'];  ?></title>
    <meta name="keywords" content="<?php echo $this->pageKeyword['keywords'];  ?>" >
    <meta name="description" content="<?php echo $this->pageKeyword['description'];  ?>" >
    <meta property="qc:admins" content="" />
    <meta property="wb:webmaster" content="" />
    <?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery-1.7.1.min.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.form.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.proximity.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_GLOBAL.'bootstrap.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.config.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.min.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/zh-cn.js');

    //    Yii::app()->clientScript->registerCssFile('common.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'style.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'main.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'bootstrap.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'grid.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'jquery.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'astyle.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'flexslider.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'css.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'fontello/css/font-awesome.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'style.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'settings-ie8.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'font-awesome/css/font-awesome.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'photowall.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/skins.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/stylesheet.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'umeditor/css/umeditor.css');

    ?>
    <style type="text/css">
    </style>
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
                    <a href="<?php echo Yii::app()->baseUrl?>" class="navbar-brand"><span>快</span>入职</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <?php if(Yii::app()->request->getUrl()==Yii::app()->homeUrl){?>
                        <li class="dropdown active">
                        <?php }else{?>
                        <li class="dropdown">
                        <?php }?>
                            <a href="<?php echo Yii::app()->baseUrl?>">首页</a>
<!--                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">首页</a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li class="active"><a href="index.html">Home Layout 1</a></li>-->
<!--                                <li><a href="index-2.html">Home Layout 2</a></li>-->
<!--                                <li><a href="index-3.html">Home Layout 3</a></li>-->
<!--                            </ul>-->
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo Yii::app()->createUrl('/mscompany/index')?>">公司</a>
<!--                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">公司</a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="elements.html">UI Elements</a></li>-->
<!--                                <li><a href="buttons.html">Buttons</a></li>-->
<!--                                <li><a href="icons.html">Icons</a></li>-->
<!--                                <li><a href="pricing.html">Pricing Tables</a></li>-->
<!--                            </ul>-->
                        </li>
                        <?php if(!Yii::app()->user->isGuest){
                                $user=Member::model()->findByPk(Yii::app()->user->id);
                                if($user->type == '1'){
                        ?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心<i class="icon-sort-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/application')?>">投递职位</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/information')?>">个人信息</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/jianli')?>">我的简历</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/changepwd')?>">修改密码</a></li>
                                </ul>
                            </li>
                        <?php   }else{ ?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心<i class="icon-sort-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/dashboard')?>">公司信息</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/msjobs/create')?>">职位信息</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/jianlis')?>">收到的简历</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/mscompany/changepwd')?>">修改密码</a></li>
                                </ul>
                            </li>
                        <?php
                                }
                        ?>
                            <li class="dropdown">
                                <a href="<?php echo Yii::app()->createUrl('/site/logout')?>">退出</a>
                            </li>
                        <?php
                        } else {?>
                            <li class="dropdown">
<!--                                <a href="--><?php //echo Yii::app()->createUrl('/site/login')?><!--">登录</a>-->
                                <a href="#"  data-toggle="modal" data-target="#myModal">登录</a>
                            </li>
                            <li class="dropdown">
                                <a href="#"data-toggle="modal" data-target="#registerModal">注册</a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">关于我们</a>
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
<footer class="footer" id="footer-1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget about-us">
                    <div class="footer-brand"><span>快</span>入职</div>
                    <p>快入职（隶属于北京搞起来科技有限公司）是专注应届生IT的招聘网站，以众多优质IT资源为依托，发布圈内招聘信息，为求职者提供人性化、个性化、专业化的信息服务，以让优质人才和优秀企业及时相遇为己任。</p>
                </div>
                <!-- /.about-us -->

            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <div class="widget popular-posts">
                    <div class="subpage-title">
                        <h5>联系我们</h5>
                    </div>
                    <ul class="recent-posts">
                        <li>
                            <span>邮箱</span>
                            <h5>
                                shenyd@kuairuzhi.com
                            </h5>
                        </li>
                        <li>
                            <span>电话</span>
                            <h5>
                                15811205600
                            </h5>
                        </li>
                        <li>
                            <span>QQ</span>
                            <h5>
                                394604262
                            </h5>
                        </li>
                    </ul>
                </div>
                <!-- /.popular-posts -->
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <div class="widget stay-connedted">
                    <div class="subpage-title">
                        <h5>关注我们</h5>
                    </div>
                    <ul class="social-links">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
                <!-- /.tagcloud -->
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <div class="widget flickr-photos">
                    <div class="subpage-title">
                        <h5>合作伙伴</h5>
                    </div>
                    <ul class="flickr-photos-list">
                        <li>
                            <a href="http://farm8.staticflickr.com/7373/10412001266_483a1e4c9d_b.jpg">
                                <img alt="Jackie Martinez (#9963)" src="http://farm8.staticflickr.com/7373/10412001266_483a1e4c9d_s.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="http://farm4.staticflickr.com/3705/10278343103_dd92d24d07_b.jpg">
                                <img alt="Tim Atlas - Lost in the Waiting Album Cover" src="http://farm4.staticflickr.com/3705/10278343103_dd92d24d07_s.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="http://farm9.staticflickr.com/8552/10217169844_a83bb0c26f_b.jpg">
                                <img alt="Ortofon Concorde S-120 (#1211)" src="http://farm9.staticflickr.com/8552/10217169844_a83bb0c26f_s.jpg">
                            </a>
                        </li>
                        </ul>
                </div>
                <!-- /.flickr-photos -->
            </div>
            <!-- /.col-md-3 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>

<!-- Modal login-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">登录</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?php echo Yii::app()->createUrl('site/login')?>" class="login-form" >
                    <div class="form-group">
                        <label >用户名</label>
                        <input type="text" required="" placeholder="用户名"  id="username" class="form-control">

                    </div>
                    <div class="form-group">
                        <label >密码</label>
                        <input type="password" required=""  placeholder="密码" id="password" class="form-control">
                        <span id="errMsg" style="display:none;color: red"></span>
                    </div>
                    <div class="form-group">
                        <label for="remember">
                            <input type="checkbox" name="autoLogin" checked="checked" id="remember">
                            记住我
                        </label>
                        <a target="_blank"  href="<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/forgetpassword'?>">忘记密码？</a>
                    </div>
                    <button class="btn btn-flat flat-color" type="button" onclick="login()">登录</button>
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
                <form role="form" method="post" action="<?php echo Yii::app()->createUrl('site/login')?>" class="login-form" >
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-flat flat-success btn-bordered">
                            <input type="radio" value="1" name="type" id="type1"> 应聘者
                        </label>
                        <label class="btn btn-flat flat-success btn-bordered">
                            <input type="radio" value="2" name="type" id="type2"> 企业
                        </label>
                    </div>
                    <div class="form-group">
                        <label >用户名</label>
                        <input type="text" required="" onblur="checkUser(this)" placeholder="请输入邮箱地址"  id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >密码</label>
                        <input type="password" required=""  placeholder="密码" id="rpassword" class="form-control">
                        <span id="errRegMsg" style="display:none;color: red"></span>
                    </div>
                    <div class="form-group">
                        <label for="checkbox" class="fl">
                            <input type="checkbox" class="checkbox valid" checked="checked" name="checkbox" id="checkbox">
                            我已阅读并同意
                            <a target="_blank" href="<?php echo Yii::app()->createUrl('/site/privacy')?>">《快入职用户协议》</a>
                        </label>
                    </div>
                    <button class="btn btn-flat flat-color" type="button" onclick="register()">注册</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->
</body>

<script type="text/javascript">
    function login(){
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username,'password':password},
            url:'<?php echo Yii::app()->createUrl('site/login')?>',
            success:function(data) {
                if(data == 'fail'){
                    $("#errMsg").text('用户名或密码错误');
                    $("#errMsg").show();
                }else {
                    window.location.href="<?php echo Yii::app()->baseUrl?>"+data;
                }
            }
        });
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
                    $("#beError").hide();
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
