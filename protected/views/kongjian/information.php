<section class="pad-25" id="action-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="media">
                        <a class="pull-left intro-image" href="#">
                            <img  alt="<?php echo $model->realname?>"
                                 src="<?php echo Yii::app()->baseUrl.'/'.$model->image?>" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->realname?></h4>
                            <div id="intro-info" class="c_intro">
                                <div class="intro-des">
                                    <p><?php echo $model->description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper widget">
                    <div class="subpage-title noline">
                        <h5>项目经历</h5>
                    </div>
                    <div class="project-show c-detail">
                        <?php echo $model->projects?>
                    </div>


                </div>
                <div class="post-wrapper widget pad-bottom-25">
                    <div class="subpage-title noline">
                        <h5>培训经历</h5>
                    </div>
                    <div class="peixun-show c-detail">
                        <?php echo $model->peixun?>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>基本信息</h5>
                    </div>
                    <div id="info-show" class="c_detail">
                        <div class="form-horizontal" style="padding:10px">
                            <div style="margin-top:5px">
                                <label  >性别：</label>
                                <span class="info-sex">
                                    <?php  if($model->sex != null){echo $model->sex == 1 ? '男':'女';} ?>
                                 </span>
                            </div>
                            <div style="margin-top:5px">
                                <label >手机号：</label>
                                <span class="info-phone">
                                    <?php echo $model->phone?>
                                </span>
                            </div>
                            <div style="margin-top:5px">
                                <label >邮箱：</label>
                                <span>
                                    <?php echo $model->username?>
                                </span>
                            </div>
                            <div style="margin-top:5px">
                                <label >技能：</label>
                                <span class="info-skill">
                                    <?php echo $model->skill?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>学校信息</h5>
                    </div>
                    <div class="c_detail">
                        <div class="form-horizontal" id="college-show" style="padding:10px">
                            <div style="margin-top:5px">
                                <label  >类型：</label>
                                <span class="college-type">
                                    <?php echo $model->universitytypename;?>
                                 </span>
                            </div>
                            <div style="margin-top:5px">
                                <label  >学历：</label>
                                <span class="college-degree">
                                    <?php echo $model->degreename?>
                                 </span>
                            </div>
                            <div style="margin-top:5px">
                                <label  >名称：</label>
                                <span class="college-name">
                                    <?php echo $model->universityname?>
                                 </span>
                            </div>
                            <div style="margin-top:5px">
                                <label  >专业：</label>
                                <span class="college-major">
                                    <?php echo $model->major?>
                                 </span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        //菜单选中个人中心
        $("#header .nav li.active").removeClass("active");
        $("#header .nav li:eq(2)").addClass("active");
    })
</script>