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
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'photowall.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/skins.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'retouch/stylesheet.css');

    //    Yii::app()->clientScript->registerCssFile('common.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.JS_GLOBAL.'twitter.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.JS_GLOBAL.'jflickrfeed.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.JS_GLOBAL.'twitter.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.JS_GLOBAL.'twitter.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.JS_GLOBAL.'twitter.js');
    ?>
    <style type="text/css">
    </style>
</head>

<body style="margin:0 auto;overflow:hidden;">
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
                        <li class="dropdown">
                            <a href="<?php echo Yii::app()->baseUrl?>">首页</a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo Yii::app()->createUrl('/mscompany/index')?>">公司</a>
                        </li>
                        <?php if(!Yii::app()->user->isGuest){?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/application')?>">投递职位</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/information')?>">个人信息</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/jianli')?>">我的简历</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('/kongjian/changepwd')?>">修改密码</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo Yii::app()->createUrl('/site/logout')?>">退出</a>
                            </li>
                        <?php }else{?>
                            <li class="dropdown">
                                <a href="<?php echo Yii::app()->createUrl('/site/login')?>">登录</a>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo Yii::app()->createUrl('/site/register')?>">注册</a>
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
</body>
<script type="text/javascript">

</script>
</html>
