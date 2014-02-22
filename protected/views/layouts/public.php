<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->pageKeyword['title']  ?></title>
<meta name="keywords" content="<?php echo $this->pageKeyword['keywords']  ?>" >
<meta name="description" content="<?php echo $this->pageKeyword['description']  ?>" >
<link href="favicon.ico" type="image/x-icon" rel=icon>
<link href="favicon.ico" type="image/x-icon" rel="shortcut icon">

</head>

<body>
<!--     <div class="con">
    <div class="head1">
                <div class="logo">
                    <a href="/">
                        <img src="/upload/sitelogo/<?php echo  Helper::siteConfig()->site_logo; ?>" />
                    </a>
                </div>
            </div>
    </div> -->
    <div class="httop1">
        <div class="httop11">
            <ul class="nav">
                <li><a href="<?php echo Yii::app()->baseUrl;?>/">首页</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/mszhaopinhui'); ?>">招聘会</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/group'); ?>">公司</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/article'); ?>">学院</a></li>
                <!--<a href="<?php //echo Yii::app()->createUrl('/tongcheng'); ?>">活动</a>-->
                <!--<a href="<?php echo Yii::app()->createUrl('/tupian'); ?>">美图</a>-->
               <!--<a href="<?php echo Yii::app()->createUrl('/taoke'); ?>">淘客</a>-->
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
    <div class="loginHead">
      
<?php echo $content ?>
    </div>
    <div class="con">
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


