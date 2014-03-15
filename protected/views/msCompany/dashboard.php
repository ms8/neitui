<section>
    <div class="row">
        <?php $this->renderPartial('_tab',array('index'=>'dashboard')); ?>

        <div class="col-md-6" style="margin-top:40px;width:52%">
            <div class="panel panel-default">
                <div class="panel-heading">公司信息维护</div>
                <div class="panel-body fade in">
                    <?php if($model->status == '1'){ ?>
                        <div style="color: red;margin-bottom:20px">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                    <?php }?>

                    <!--公司基本信息  -->
                    <dl class="c_section">
                        <dt>
                        <h2><em></em>基本信息</h2>
                        </dt>
                        <dd>
                            <div id="info-show" class="c_detail" style="margin-bottom: 0px;">
                                <div class="c_logo">
                                    <div id="logoShow">
                                        <img width="190" height="190" alt="<?php echo $model->name?>"
                                             src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
                                    </div>
                                </div>
                                <div class="c_box">
                                    <h3 ><?php echo $model->name?></h3>
                                    <div class="clear"></div>
                                    <span>主页：</span>
                                    <a href="<?php echo $model->website?>" target="_blank">
                                        <?php echo $model->website?>
                                    </a>

                                    <h5>地址：<?php echo $model->address?></h5>
                                </div>
                                <div class="clear"></div>
                                <div style="float: right">
                                    <button class="btn" id="info-update" onclick="showEdit()">修改信息</button>
                                </div>

                            </div>

                            <div id="info-edit" class="c_detail"
                                 style="margin-bottom: 0px;display: none;min-height: 140px;">
                                <form method="post" action="<?php echo Yii::app()->baseUrl.'/mscompany/update'?>"
                                      id="ms-company-form" enctype="multipart/form-data">
                                    <div class="c_logo">
                                        <div id="logoShow">
                                            <input type="file" size="60" maxlength="100" name="logo"
                                                   id="MsCompany_logo" value="dfsf">
                                        </div>

                                    </div>
                                    <div class="c_box">
                                        <span>名称：</span>
                                        <input type="text" id="MsCompany_name" value="<?php echo $model->name?>"
                                               name="MsCompany[name]" maxlength="100" size="60">
                                        <div class="clear"></div>
                                        <span>主页：</span>
                                        <input type="text" id="MsCompany_website" value="<?php echo $model->website?>"
                                               name="MsCompany[website]" maxlength="100" size="60">
                                        <div class="clear"></div>
                                        <span>地址：</span>
                                        <input type="text" id="MsCompany_address" value="<?php echo $model->address?>"
                                               name="MsCompany[address]" maxlength="100" size="60">
                                    </div>
                                    <div style="float: right">
                                        <button type="button" class="btn" id="info-cancel" >取消</button>
                                        <button type="button" class="btn" id="info-save">保存</button>
                                    </div>
                                </form>
                            </div>
                        </dd>
                    </dl>

                    <!--[if IE 7]> <br /> <![endif]-->

                    <!--公司印象  -->
                    <dl class="c_section">
                        <dt>
                        <h2><em></em>公司印象</h2>
                        </dt>
                        <dd>
                            <div id="tag-info" class="r_box">
                                <ul id="hasLabels" class="reset clearfix">
                                    <?php
                                    $tags = explode(' ',$model->tags);
                                    foreach($tags as $tag){
                                        ?>
                                        <li><span><?php echo $tag?></span></li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                                <div style="float: right">
                                    <button class="btn" id="tags-update" >修改标签</button>
                                </div>
                            </div>
                            <div id="tag-edit" class="r_box" style="display: none">
                                <form method="post" action="<?php echo Yii::app()->baseUrl.'/mscompany/update'?>"
                                      id="tag-update-form" >
                                    <input type="text" id="MsCompany_tags" value="<?php echo $model->tags?>"
                                           name="MsCompany[tags]" maxlength="500" size="60">
                                    <div style="float: right">
                                        <button type="button" class="btn" id="tag-cancel" >取消</button>
                                        <button  class="btn" id="tag-save">保存</button>
                                    </div>
                                </form>
                            </div>
                        </dd>
                    </dl>

                    <!--公司简介  -->
                    <dl class="c_section">
                        <dt>
                        <h2><em></em>公司介绍</h2>
                        </dt>
                        <dd>
                            <div id="intro-info" class="c_intro">
                                <?php echo $model->description?>
                                <div style="float: right">
                                    <button class="btn" id="intro-update" >修改介绍</button>
                                </div>
                            </div>
                            <div id="intro-edit" class="r_box" style="display: none">
                                <form method="post" action="<?php echo Yii::app()->baseUrl.'/mscompany/update'?>"
                                      id="intro-update-form" >
                                    <input type="text" id="MsCompany_description" value="<?php echo $model->description?>"
                                           name="MsCompany[description]" maxlength="1000" size="60">
                                    <div style="float: right">
                                        <button type="button" class="btn" id="intro-cancel" >取消</button>
                                        <button  class="btn" id="intro-save">保存</button>
                                    </div>
                                </form>
                            </div>
                        </dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function showEdit(){
        $("#info-show").hide();
        $("#info-edit").show();
    }
    $("#info-cancel").live('click',function(){
        $("#info-show").show();
        $("#info-edit").hide();
    });
    $("#info-save").live('click',function(){
        $("#ms-company-form").submit();
    });

    $("#tags-update").live('click',function(){
        $("#tag-info").hide();
        $("#tag-edit").show();
    });
    $("#tag-cancel").live('click',function(){
        $("#tag-info").show();
        $("#tag-edit").hide();
    });
    $("#intro-update").live('click',function(){
        $("#intro-info").hide();
        $("#intro-edit").show();
    });
    $("#intro-cancel").live('click',function(){
        $("#intro-info").show();
        $("#intro-edit").hide();
    });
</script>