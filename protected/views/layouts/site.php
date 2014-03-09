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
                    <a href="index.html" class="navbar-brand"><span>快</span>入职</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">首页</a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="index.html">Home Layout 1</a></li>
                                <li><a href="index-2.html">Home Layout 2</a></li>
                                <li><a href="index-3.html">Home Layout 3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">公司</a>
                            <ul class="dropdown-menu">
                                <li><a href="elements.html">UI Elements</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="pricing.html">Pricing Tables</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">个人中心</a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="team.html">Our Team</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="faqs.html">FAQs</a></li>
                                <li><a href="404.html">Error 404</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">登陆</a>
                            <ul class="dropdown-menu">
                                <li><a href="portfolio-2.html">Portfolio 2 Columns</a></li>
                                <li><a href="portfolio-3.html">Portfolio 3 Columns</a></li>
                                <li><a href="portfolio-4.html">Portfolio 4 Columns</a></li>
                                <li><a href="portfolio-item-1.html">Portfolio Item 1</a></li>
                                <li><a href="portfolio-item-2.html">Portfolio Item 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">注册</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-1.html">Blog Layout 1</a></li>
                                <li><a href="blog-2.html">Blog Layout 2</a></li>
                                <li><a href="blog-3.html">Blog Layout 3</a></li>
                                <li><a href="blog-4.html">Blog Layout 4</a></li>
                                <li><a href="post-1.html">Post Layout 1</a></li>
                                <li><a href="post-2.html">Post Layout 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">关于我们</a>
                            <ul class="dropdown-menu">
                                <li><a href="contact-1.html">Contact 1</a></li>
                                <li><a href="contact-2.html">Contact 2</a></li>
                            </ul>
                        </li>
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
    $(document).ready(function() {
        $('.register_radio li input').click(function(e){
            $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
        });
        $("div[name='menu']").hover(function(){
            if($("div[name='menu-active']").attr('class') == 'menu-active' ){
                $("div[name='menu-active']").attr('class','menu');
            }
        },function(){
            if($("div[name='menu-active']").attr('class') == 'menu' ){
                $("div[name='menu-active']").attr('class','menu-active');
            }
        });
    });

    $("div[class^='menu']").live('click',function(){
        var id = $(this).attr('id');
        if(id==""){ //首页
            window.location.href="<?php echo Yii::app()->baseUrl?>";
        }else{
            window.location.href="<?php echo Yii::app()->createUrl('/mscompany/index')?>";
        }
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
