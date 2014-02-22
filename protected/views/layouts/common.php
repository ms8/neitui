<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->pageKeyword['title']  ?></title>
<meta name="keywords" content="<?php echo $this->pageKeyword['keywords']  ?>" >
<meta name="description" content="<?php echo $this->pageKeyword['description']  ?>" >
<link href="favicon.ico" type="image/x-icon" rel=icon>
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon">
<?php 
    if($this->id != 'tongcheng'){
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'/jquery-1.7.1.min.js');
    }
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-ui.js');

    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/artDialog/skins/idialog.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/artDialog/artDialog.min.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.form.js');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/common.js');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'common.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/red.css');
?>

</head>

<body>
    <div class="httop1">
        <div class="httop11">
            <ul class="nav">
                <li><a href="<?php echo Yii::app()->baseUrl;?>/">首页</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/mszhaopinhui'); ?>">招聘会</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/group'); ?>">公司</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/xiaozu'); ?>">小组</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/article'); ?>">学院</a></li>
                <!--<a href="<?php //echo Yii::app()->createUrl('/tongcheng'); ?>">活动</a>-->
            </ul>
        </div>
        <?php if(Yii::app()->user->isGuest){?>
            <div class="httop12">
                <ul class="nav">
                    <li><a style="float:right;" href="<?php echo Yii::app()->createUrl('public/login'); ?>">登陆</a></li>
                    <li><a style="float:right;" href="<?php echo Yii::app()->createUrl('public/register'); ?>">注册</a></li>
                    <li>
                        <a style="float:right;background:none; padding: 10px 0;width: 30px;" href="<?php
                        $this->widget('ext.oauthlogin.OauthLogin',array(
                            'itemView'=>'qqurl', //效果样式
                        ));
                        ?>"><img style="margin-top:5px;" src="<?php echo Yii::app()->baseUrl;?>/images/connect_qq.png" /></a>
                    </li>
                    <li>
                        <a style="float:right;background:none;padding: 10px 0;width: 30px;" href="<?php
                        $this->widget('ext.oauthlogin.OauthLogin',array(
                            'itemView'=>'sinaurl', //效果样式
                        ));
                        ?>"><img style="margin-top:5px;" src="<?php echo Yii::app()->baseUrl;?>/images/connect_sina_weibo.png" /></a>
                    </li>

            </div>
        <?php }else{?>
            <div class="httop12">
                <!-- <a href="javascript:void(0)">提醒
                    <span class="num">
                    <span>1</span>
                    <i></i>
                    </span>
                </a> -->
                <ul class="nav">
                    <li><a href="<?php echo Yii::app()->createUrl('kongjian/index',array('uid'=>Yii::app()->user->id)); ?>" style="width: auto;">欢迎您：<?php echo Yii::app()->user->nickname;?></a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('kongjian/info'); ?>">设置</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('public/logout'); ?>">退出</a></li>
                </ul>
            </div>
        <?php }?>

    </div>  
    <div class="httop2  loginHead">
        <div class="httop21">
            <div class="logo1"> 
                <a href="<?php echo Yii::app()->createUrl('group'); ?>">公司</a>
            </div>
            <div class="link1">
                 <?php  if(!Yii::app()->user->isGuest){?>
                     <a href="<?php echo Yii::app()->createUrl('group'); ?>">我的话题</a>
                 <?php  } ?>
                <a href="<?php echo Yii::app()->createUrl('group/explore'); ?>">发现公司</a>
                <a href="<?php echo Yii::app()->createUrl('group/exploretopic'); ?>">发现话题</a>
            </div>
            <div class="sousuo1">
                <form id="searchForm" action="<?php echo Yii::app()->baseUrl; ?>/group/search/" method="get">
                    <input type="hidden" value="1" name="type" />
                    <input id="search_inp" type="text" class="inp3" name="keyword" value="<?php echo isset($_GET['keyword'])?$_GET['keyword']:'公司、话题'; ?>" /><a id="search" href="javascript:void(0)" class="inp4"></a>
                </form>
            </div>
            <script type="text/javascript">
                $("#search").click(
                    function(){
                        search = $("#search_inp").val();
                        if(search == '' || search == '公司、话题'){
                            alert('请输入要查询的关键词！');
                            return false;
                        }
                        $("#searchForm").submit();
                       // window.location.href = 'http://<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl; ?>/group/search/'+encodeURI(search);
                    }
                );

                $("#search_inp").focus(
                    function(){
                        search = $("#search_inp").val();
                        if(search == '公司、话题'){
                            $(this).val('');
                        }
                    }
                );

                $("#search_inp").blur(
                    function(){
                        search = $("#search_inp").val();
                        if(search == ''){
                            $(this).val('公司、话题');
                        }
                    }
                );
            </script>
        </div>
    </div>   
    <?php echo $content ?>
    <div class="con clear">
    <div class="footer">
            <div class="footer1">
                  <?php echo  Helper::siteConfig()->site_copyright; ?>
            </div>
            <div class="footer2">
                <?php
                    $danye = Cate::model()->findAll(array('condition'=>'type = 2 and status = 1'));
                    foreach($danye as $v){
                ?>
                <a href="<?php echo $v->danyeurl; ?>"><?php echo $v->name; ?></a> · 
                <?php
                    }
                ?>
                <div style="display:none;">
                <?php echo  Helper::siteConfig()->site_code; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=0&amp;pos=right&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->
<div class="toptype"><a title="回到顶部" href="javascript:void(0);" onClick="window.scrollTo(0,0);" class="gotop_btn" id="goTopButton" style="display:none;">&nbsp;</a></div>
<script type="text/javascript">
(function($){
  $(window).scroll(function(event){
    if($(this).scrollTop() > 0){
      if($.browser.ie6){
        $('#goTopButton').css('top', $(this).scrollTop() + $(this).height() - 170);
      }
      if($('#goTopButton').css('display') == 'none'){
        $('#goTopButton').fadeIn();
      }
    }else{
      $('#goTopButton').fadeOut();
    }
  });
})(jQuery);
</script>