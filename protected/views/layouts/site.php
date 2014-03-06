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
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'main.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'bootstrap.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'grid.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'jquery.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'astyle.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'flexslider.css');
//    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'css.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'fontello/css/font-awesome.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'style.css');
    //    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_GLOBAL.'settings-ie8.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'photowall.css');

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

<div class="header">
<!--    <div class="row">-->
        <div class="col-md-2 col-sm-2" style="margin-top:15px">
            <!-- Header -->
            <h3 style="margin:0">
                <a href="<?php echo Yii::app()->baseUrl?>">快入职</a>
            </h3>
            <img style="margin: -4px 0" src="<?php echo Yii::app()->CreateUrl(IMGAGES_GLOBAL.'jiantou.png')?>" alt="">
            <!--            <img style="opacity: 1;" class="defaultimg" src="--><?php //echo Yii::app()->baseUrl.CSS_BOXCOL?><!--/logo.png" alt="" />-->
            <span class="sub-header">kuairuzhi.com</span>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="menu-active" id="menu-active">
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

<?php echo $content ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('.register_radio li input').click(function(e){
            $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
        });
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
    $(function() {

        var Photo	= (function() {

            // list of thumbs
            var $list		= $('#pe-thumbs'),
            // list's width and offset left.
            // this will be used to know the position of the description container
                listW		= $list.width(),
                listL		= $list.offset().left,
            // the images
                $elems		= $list.find('img'),
            // the description containers
                $descrp		= $list.find('div.pe-description'),
            // maxScale : maximum scale value the image will have
            // minOpacity / maxOpacity : minimum (set in the CSS) and maximum values for the image's opacity
                settings	= {
                    maxScale	: 1.3,
                    maxOpacity	: 0.9,
                    minOpacity	: 0.4
//                    minOpacity	: Number( $elems.css('opacity') )
                },
                init		= function() {

                    // minScale will be set in the CSS
                    settings.minScale = _getScaleVal() || 1;
                    // preload the images (thumbs)
                    _loadImages( function() {

                        _calcDescrp();
                        _initEvents();

                    });

                },
            // Get Value of CSS Scale through JavaScript:
            // http://css-tricks.com/get-value-of-css-rotation-through-javascript/
                _getScaleVal= function() {

                    var st = window.getComputedStyle($elems.get(0), null),
                        tr = st.getPropertyValue("-webkit-transform") ||
                            st.getPropertyValue("-moz-transform") ||
                            st.getPropertyValue("-ms-transform") ||
                            st.getPropertyValue("-o-transform") ||
                            st.getPropertyValue("transform") ||
                            "fail...";

                    if( tr !== 'none' ) {

                        var values = tr.split('(')[1].split(')')[0].split(','),
                            a = values[0],
                            b = values[1],
                            c = values[2],
                            d = values[3];

                        return Math.sqrt( a * a + b * b );

                    }

                },
            // calculates the style values for the description containers,
            // based on the settings variable
                _calcDescrp	= function() {

                    $descrp.each( function(i) {

                        var $el		= $(this),
                            $img	= $el.prev(),
                            img_w	= $img.width(),
                            img_h	= $img.height(),
                            img_n_w	= settings.maxScale * img_w,
                            img_n_h	= settings.maxScale * img_h,
                            space_t = ( img_n_h - img_h ) / 2,
                            space_l = ( img_n_w - img_w ) / 2;

                        $el.data( 'space_l', space_l ).css({
                            height	: settings.maxScale * $el.height(),
                            top		: -space_t,
                            left	: img_n_w - space_l
                        });

                    });

                },
                _initEvents	= function() {

                    $elems.on('proximity.Photo', { max: 80, throttle: 10, fireOutOfBounds : true }, function(event, proximity, distance) {

                        var $el			= $(this),
                            $li			= $el.closest('li'),
                            $desc		= $el.next(),
                            scaleVal	= proximity * ( settings.maxScale - settings.minScale ) + settings.minScale,
                            scaleExp	= 'scale(' + scaleVal + ')';

                        // change the z-index of the element once it reaches the maximum scale value
                        // also, show the description container
                        if( scaleVal === settings.maxScale ) {

                            $li.css( 'z-index', 1000 );

                            if( $desc.offset().left + $desc.width() > listL + listW ) {

                                $desc.css( 'left', -$desc.width() - $desc.data( 'space_l' ) );

                            }

                            $desc.fadeIn( 800 );

                        }
                        else {

                            $li.css( 'z-index', 1 );

                            $desc.stop(true,true).hide();

                        }

                        $el.css({
                            '-webkit-transform'	: scaleExp,
                            '-moz-transform'	: scaleExp,
                            '-o-transform'		: scaleExp,
                            '-ms-transform'		: scaleExp,
                            'transform'			: scaleExp,
                            'opacity'			: ( proximity * ( settings.maxOpacity - settings.minOpacity ) + settings.minOpacity )
                        });

                    });

                },
                _loadImages	= function( callback ) {

                    var loaded 	= 0,
                        total	= $elems.length;

                    $elems.each( function(i) {

                        var $el = $(this);

                        $('<img/>').load( function() {

                            ++loaded;
                            if( loaded === total )
                                callback.call();

                        }).attr( 'src', $el.attr('src') );

                    });

                };

            return {
                init	: init
            };

        })();

        Photo.init();

    });
</script>
</html>
