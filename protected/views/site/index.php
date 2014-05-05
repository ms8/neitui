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
                    <div class="job_search pad-top-5">
                        <dl class="dl-horizontal">
                            <dt>城市</dt>
                            <dd>
                                <a class="active" href="<?php echo Yii::app()->baseUrl."/"?>">全部</a>
                                <a href="<?php echo Yii::app()->baseUrl."/"?>">北京</a>
                                <a class="disabled" href="javascript:;" data-toggle="tooltip" title="久等了，此城市还没开通服务！">上海</a>
                                <a class="disabled" href="javascript:;" data-toggle="tooltip" title="久等了，此城市还没开通服务！">广州</a>
                                <a class="disabled" href="javascript:;" data-toggle="tooltip" title="久等了，此城市还没开通服务！">深圳</a>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>技能</dt>
                            <dd>
                                <a id="all"  href="<?php echo Yii::app()->baseUrl
                                    .'/site/index?skill=all&code=all'?>">全部</a>
                                <?php
                                foreach($skills as $skill){
                                    ?>
                                    <a id="<?php echo $skill->code?>" href="<?php echo Yii::app()->baseUrl
                                        .'/site/index?skill='.$skill->name.'&code='.$skill->code?>">
                                        <?php echo $skill->name?>
                                    </a>
                                <?php }?>
                            </dd>
                        </dl>
                    </div>
                    <div>
                        <?php if ($jobs->count() != 0) {  ?>
                            <table class="table jobs">
                                <thead>
                                <tr>
                                    <th style="width: 10%"></th>
                                    <th style="width: 25%"></th>
                                    <th style="width: 28%"></th>
                                    <th style="width: 30%"></th>
                                    <th style="width: 7%"></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php  foreach($jobs as $job) { ?>
                                    <tr>
                                        <td rowspan="2" style="padding: 5px;">
                                            <img  src="<?php echo Yii::app()->baseUrl."/".$job['logo']?>" alt="<?php echo $job['title'];?>">
                                        </td>
                                        <td>
                                            <p>
                                                <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job['jid'] ?>"><?php echo $job['title'];?></a>
                                            </p>
                                        </td>
                                        <td>
                                            <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$job['cid'] ?>">
                                                <?php echo CHtml::encode(Helper::truncate_utf8_string($job['name'],15));?>
                                            </a>
                                        </td>
                                        <td>
                                            <p><?php  echo CHtml::encode(Helper::truncate_utf8_string($job['tags'],25)); ?></p>
                                        </td>
                                        <td>
                                            <?php  echo date("m/d",strtotime($job['createtime'])); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <p>[要求]<?php echo CHtml::encode(Helper::truncate_utf8_string($job['description'],130));?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php }else {
                            echo "<div class='text-center empty-content'>抱歉，暂时没有此类岗位信息！</div>";}
                        ?>
                    </div>
                    <div class="text-center" >
                        <?php
                        //分页widget代码:
                        $this->widget('CLinkPager',array('pages'=>$pages,'selectedPageCssClass'=>'active','hiddenPageCssClass'=>'disabled', 'htmlOptions'=>array('class'=>'pagination')));
                        ?>
                    </div>
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
                        <li class="weixin"><img  src="<?php echo Yii::app()->baseUrl.CSS_PATH.'images/erweima.jpg'?>" alt="快入职微信号"/></li>
                        <li class="weibo">
                            <img  src="<?php echo Yii::app()->baseUrl.CSS_PATH.'images/weibo.png'?>" alt="快入职微博号"/>
                            <div class="follow-weibo"><wb:follow-button uid="5099334861" type="red_2" width="136" height="24" ></wb:follow-button></div>
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
    function submitjl(){
        $.ajax({
            type:'POST',
            dataType:'json',
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
        var code = "<?php
        if(isset($_GET['code'])){
            echo $_GET['code'];
        }else {
            echo 'all';
        }
        ?>";
        $("#"+code).addClass("active");

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
        $('.register_radio li input').click(function(e){
            $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
        });
        //没开通城市
        $('.job_search .disabled').tooltip({
            animation:true,
            trigger:'hover' //触发tooltip的事件
        });
    });
</script>