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
    //    Yii::app()->clientScript->registerCssFile('common.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'style.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'/font-awesome/css/font-awesome.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'main.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'grid.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'jquery.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'astyle.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'flexslider.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'css.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'fontello/css/font-awesome.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'style.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'settings-ie8.css');

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

<body  style="margin:0 auto;overflow:hidden;">
<!--<div  class="container">-->
    <div class="header">
        <!--    <div class="row">-->
        <div class="col-md-2 col-sm-2" style="margin-top:10px">
            <!-- Header -->
            <h4 style="margin:0">
                <a href="<?php echo Yii::app()->baseUrl?>">快入职</a>
            </h4>
            <img style="margin: -3px 0" src="<?php echo Yii::app()->CreateUrl(IMGAGES_GLOBAL.'jiantou.png')?>" alt="">
            <!--            <img style="opacity: 1;" class="defaultimg" src="--><?php //echo Yii::app()->baseUrl.CSS_BOXCOL?><!--/logo.png" alt="" />-->
            <span class="sub-header">kuairuzhi.com</span>
        </div>
        <div class="col-md-6 col-sm-6" style="padding-top:10px">
            <div class="menu" >
                首页
            </div>
            <div class="menu" name="menu">公司</div>
            <div class="menu" name="menu">小组</div>
        </div>
        <div class="col-md-4 col-sm-4" style="margin-top:15px">
            <!-- Social media links -->
            <?php if(Yii::app()->user->isGuest){?>
                <div class="social">
                    <button class="btn" onclick="window.open('<?php echo Yii::app()->baseUrl.'/site/register'?>')">注册</button>
                    <button class="btn" onclick="window.location.href='<?php echo Yii::app()->baseUrl.'/site/login'?>'">登录</button>
                    <!--                    <button class="btn">关于我们</button>-->
                </div>
            <?php }else{?>
                <!-- 登录后出现的个人中心信息-->
                <div class="social">
                    <a href="<?php echo Yii::app()->baseUrl.'/site/logout'?>">退出</a>
                    <a href="<?php echo Yii::app()->baseUrl.'/kongjian/jianli/'.Yii::app()->user->id?>">个人中心</a>
                </div>
                <!-- -->
            <?php }?>
        </div>
        <!--    </div>-->
    </div>
<!--    <div class="mian-content">-->
    <?php echo $content ?>
<!--    </div>-->
<!-- </div>-->

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("div[name='menu']").hover(function(){
            if($("#menu-active").attr('class') == 'menu-active' ){
                $("#menu-active").attr('class','menu');
            }
        },function(){
            if($("#menu-active").attr('class') == 'menu' ){
                $("#menu-active").attr('class','menu-active');
            }
        });
    });

</script>
</html>
