<section class="pad-25" id="action-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="media widget-content">
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
                    <div class="c_detail">
                        <ul class="project-details-list">
                            <?php if($model->sex != null && $model->sex != ''){ ?>
                            <li>
                                <h5>性别：</h5>
                                <div class="project-terms">
                                    <span class="info-sex">
                                        <?php  if($model->sex != null){echo $model->sex == 1 ? '男':'女';} ?>
                                     </span>
                                </div>
                            </li>
                            <?php } if($model->phone != null && $model->phone != ''){?>
                            <li>
                                <h5>手机：</h5>
                                <div class="project-terms">
                                    <span class="info-phone">
                                        <?php echo $model->phone?>
                                    </span>
                                </div>
                            </li>
                            <?php } if($model->username != null && $model->username != ''){?>
                            <li>
                                <h5>邮箱：</h5>
                                <div class="project-terms">
                                    <span>
                                        <?php echo $model->username?>
                                    </span>
                                </div>
                            </li>
                            <?php } if($model->skill != null && $model->skill != ''){?>
                            <li>
                                <h5>技能：</h5>
                                <div class="project-terms">
                                    <span class="info-skill">
                                        <?php echo $model->skill?>
                                    </span>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>学校信息</h5>
                    </div>
                    <div  class="c_detail">
                        <ul class="project-details-list">
                            <?php if($model->universitytypename != null && $model->universitytypename != ''){ ?>
                            <li>
                                <h5>类型：</h5>
                                <div class="project-terms">
                                    <span class="college-type">
                                        <?php echo $model->universitytypename;?>
                                     </span>
                                </div>
                            </li>
                            <?php } if($model->degreename != null && $model->degreename != ''){?>
                            <li>
                                <h5>学历：</h5>
                                <div class="project-terms">
                                    <span class="college-degree">
                                        <?php echo $model->degreename?>
                                     </span>
                                </div>
                            </li>
                            <?php } if($model->universityname != null && $model->universityname != ''){?>
                            <li>
                                <h5>名称：</h5>
                                <div class="project-terms">
                                    <span class="college-name">
                                        <?php echo $model->universityname?>
                                     </span>
                                </div>
                            </li>
                            <?php } if($model->major != null && $model->major != ''){?>
                            <li>
                                <h5>专业：</h5>
                                <div class="project-terms">
                                    <span class="college-major">
                                        <?php echo $model->major?>
                                     </span>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
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