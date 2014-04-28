<?php
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'photowall.css');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.proximity.min.js', CClientScript::POS_BEGIN);
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <section class="pad-top-25">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>招聘职位</h5>
                    </div>
                    <div class="job_search">
                        <dl class="dl-horizontal">
                            <dt>城市</dt>
                            <dd>
                                <a class="active" href="/job?city=0">全部</a>
                                <a href="/job?city=11">北京</a>
                                <a href="/job?city=12">上海</a>
                                <a href="/job?city=13">广州</a>
                                <a href="/job?city=14">深圳</a>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>行业</dt>
                            <dd>
                                <a class="active" href="/job?city=0">全部</a>
                                <a href="/job?city=11">互联网</a>
                                <a href="/job?city=12">游戏</a>
                                <a href="/job?city=13">电子商务</a>
                                <a href="/job?city=14">金融</a>
                                <a href="/job?city=14">IT/软件</a>
                                <a href="/job?city=14">其他</a>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>技能</dt>
                            <dd>
                                <a class="active" href="/job?city=0">全部</a>
                                <a href="/job?city=11">JAVA</a>
                                <a href="/job?city=12">C++/C</a>
                                <a href="/job?city=13">Andriod</a>
                                <a href="/job?city=14">WEB前端</a>
                                <a href="/job?city=14">数据库</a>
                                <a href="/job?city=14">测试</a>
                                <a href="/job?city=14">运维</a>
                                <a href="/job?city=14">其他</a>
                            </dd>
                        </dl>

                    </div>
                    <div class="panel-group" >
                        <?php foreach($jobs as $row):?>
                            <?php echo $row["logo"]?>&nbsp;&nbsp;
                            <?php echo $row["cid"]?>&nbsp;&nbsp;
                            <?php echo $row["name"]?>&nbsp;&nbsp;
                            <?php echo $row["jid"]?>&nbsp;&nbsp;
                            <?php echo $row["title"]?>&nbsp;&nbsp;
                            <?php echo $row["createtime"]?>&nbsp;&nbsp;
                            <?php echo $row["description"]?>
                            <br>
                        <?php endforeach;?>
                        <?php
                        //分页widget代码:
                        $this->widget('CLinkPager',array('pages'=>$pages,'selectedPageCssClass'=>'active','hiddenPageCssClass'=>'disabled', 'htmlOptions'=>array('class'=>'pagination')));
                        ?>
                    </div>
                </div>

            </section>
            <!-- End Projects -->
            <section class="pad-25" id="action-box">
                <div class="action-box">
                    <h3>IT类应届生专场，众多精挑细选的职位在等你，快去看看吧！</h3>
                    <a class="btn btn-flat flat-color"  style="padding: 10px 15px;font-size: 13px;" id="submitbt" href="<?php echo Yii::app()->baseUrl.'/mscompany/index'?>">最新发布职位</a>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="pad-top-25">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>关注我们</h5>
                    </div>
                    <ul class="social-links">
                        <li class="weixin"><img  src="/neitui/assets/default/css//images/erweima.jpg" alt="快入职微信号"></li>
                        <li class="weibo">
                            <img  src="/neitui/assets/default/css//images/weibo.png" alt="快入职微博号">
                            <wb:follow-button uid="5099334861" type="red_2" width="130" height="24" ></wb:follow-button>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="pad-top-5">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>热门企业</h5>
                    </div>
                    <div class="company-show">
                        <ul class="flickr-photos-list">
                            <?php foreach($companys as $company){?>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$company['company']->id?>">
                                        <img  alt="<?php echo $company['company']->name?>" src="<?php echo Yii::app()->baseUrl.'/'.$company['company']->logo?>" />
                                        <div class="des"><strong><?php echo $company['company']->name?></strong></div>
                                    </a>

                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

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
    $(document).ready(function() {
        $('.register_radio li input').click(function(e){
            $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
        });
    });
</script>