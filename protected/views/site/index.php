<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'photowall.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.proximity.min.js', CClientScript::POS_BEGIN);
?>

<!-- Main Container -->
<!--<section id="main-content">-->
<!-- Container -->
<section class="pad-top-25" id="our-services">
    <div class="container">
        <div  class="filters" id="filters" data-option-key="filter">
            <span id="filter-up">公司所在城市：</span>
            <a href="<?php echo Yii::app()->baseUrl."/"?>" data-option-value="*" class="active_sort">北京</a>
            <span class="text-sep">/</span>
            <a class="disabled"  data-toggle="tooltip" title="抱歉，上海、广州、深圳的同学们还得等等">
                上海<span class="text-sep">&nbsp/&nbsp</span>广州<span class="text-sep">&nbsp/&nbsp</span>深圳
            </a>
        </div>
    </div>
    <!-- /.container -->
</section>
<section class="pad-top-25">
    <div class="container">
        <ul id="pe-thumbs" class="pe-thumbs">
            <?php foreach($companys as $company){?>
                <li>
                    <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$company['company']->id?>">
                        <img src="<?php echo Yii::app()->baseUrl.'/'.$company['company']->logo?>" />
                        <div class="pe-description">
                            <h3><?php echo $company['company']->name?></h3>
<!--                            <div class="subpage-title">-->
<!--                                <h5>招聘信息</h5>-->
<!--                            </div>-->
                            <ul>
                            <?php $i = 0 ;
                                  foreach($company['jobs'] as $job){
                                      if($i == 3){
                                          echo  "<li>共".count($company['jobs'])."个职位信息</li>";
                                          break;
                                      }else{
                                          echo "<li>".$job->title."</li>";
                                          $i++;
                                      }
                                  }
                            ?>
                            </ul>
                        </div>
                    </a>
                </li>
            <?php }?>
        </ul>
    </div>
</section>
<!-- End Projects -->
<section class="pad-25" id="action-box">
    <div class="container">
        <div class="action-box">
            <h3>有时候，选择比努力更重要，IT类应届生求职，就选快入职！</h3>
            <a class="btn btn-flat flat-color"  onclick="submitjl()" id="submitbt" href="javacript:;">马上投简历</a>
        </div>
        <!-- /.action-box -->
    </div>
    <!-- /.container -->
</section>
<!--    <button style="margin-left: 200px;width:20%;border-color: #D01C00;" onclick="submitjl()" id="submitbt" class="tjl-btn">马上投简历</button>-->

<!--<div class="header">-->
<!--    <div class="row">-->
<!---->
<!--        <div class="col-md-12 col-sm-12">-->
<!--            <div class="search">-->
<!--                <button class="tjl-btn"  id="submitbt" onclick="submitjl()">马上投简历</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--    </section>-->

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
                投递其他职位时默认使用该简历：<br>
                <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;
                <input type="radio" value="0" name="flag" >否
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
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
        var jianli_id = $('input[name="chosen"]:checked').val();
        $("#jianliid").val(jianli_id);
        $("#chooseForm").submit();
    });

    function submitjl(){
        $.ajax({
            type:'POST',
            dataType:'json',
//            data:{'jobid':id},
            url:'<?php echo Yii::app()->createUrl('msjobs/jlUpload')?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $("#loginDiv").show();
                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv").show();
                }
            }
        });
    };
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.register_radio li input').click(function(e){
            $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
        });
        $('#filters .disabled').tooltip({
            placement:"bottom"
        })
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
                    minOpacity	: 0.5
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

                            $li.css( 'z-index', 100 );

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