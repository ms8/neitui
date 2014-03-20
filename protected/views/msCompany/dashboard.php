<section class="page-title-wrapper" id="page-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>公司基本信息维护</h4>
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-xs-6 hidden-xs">

                <ol class="breadcrumb pull-right">
                    <li><?php if($model->status == '1'){ ?>
                            <div style="color: red;">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                        <?php }?></li>
                </ol>
            </div>
            <!-- /.col-xs-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="pad-25" id="action-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img width="190" height="190" alt="<?php echo $model->name?>"
                             src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>" />
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $model->name?></h4>
                        <div id="intro-info" class="c_intro">
                            <div><?php echo $model->description?></div>
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
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <div class="subpage-title">
                        <h5>基本信息</h5>
                    </div>
                    <div id="info-show" class="c_detail">
                        <dl class="dl-horizontal companyInfo-edit">
                            <dt>公司名称：</dt>
                            <dd><?php echo $model->name?></dd>
                            <dt>主页：</dt>
                            <dd><a href="<?php echo $model->website?>" target="_blank">
                                    <?php echo $model->website?>
                                </a></dd>
                            <dt>地址：</dt>
                            <dd><?php echo $model->address?></dd>
                        </dl>
                        <div style="float:right">
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
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="widget text" style="padding-right: 15px;">
                    <div class="subpage-title">
                        <h5>公司印象</h5>
                    </div>
                    <div id="tag-info" class="r_box">
                        <ul id="hasLabels" class="tagcloud-list">
                            <?php
                            $tags = explode(' ',$model->tags);
                            foreach($tags as $tag){
                                ?>
                                <li><a href="#"><?php echo $tag?></a></li>
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
                            <div style="float:right">
                                <button type="button" class="btn" id="tag-cancel" >取消</button>
                                <button  class="btn" id="tag-save">保存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section>
<script>
    //菜单选中公司
    $(".nav li.active").removeClass("active");
    $(".nav li:eq(2)").addClass("active");
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