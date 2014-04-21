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
                        <form class="form-horizontal"  role="form">
                            <div class="form-group">
                                <label  class="col-sm-5">姓名：</label>
                                <div class="col-sm-7">
                                    <span class="info-realname"><?php echo $model->realname?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">手机号：</label>
                                <div class="col-sm-7">
                                    <span class="info-phone">
                                        <?php echo $model->phone?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">性别：</label>
                                <div class="col-sm-7">
                                    <span class="info-sex">
                                        <?php  if($model->sex != null){echo $model->sex == 1 ? '男':'女';} ?>
                                     </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">技能特长：</label>
                                <div class="col-sm-7">
                                    <span class="info-skill">
                                          <?php echo $model->skill?>
                                     </span>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>学校信息</h5>
                    </div>
                    <div class="c_detail">
                        <form class="form-horizontal" id="college-show" role="form">
                            <div class="form-group">
                                <label  class="col-sm-5">学校类型：</label>
                                <div class="col-sm-7">
                                    <span class="college-type">
                                        <?php echo $model->universitytypename;?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">学校名称：</label>
                                <div class="col-sm-7">
                                    <span class="college-name">
                                        <?php echo $model->universityname?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">学历：</label>
                                <div class="col-sm-7">
                                    <span class="college-degree">
                                        <?php  echo $model->degreename; ?>
                                     </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">获得奖励：</label>
                                <div class="col-sm-7">
                                    <span class="college-jiangli">
                                          <?php echo $model->jiangliname?>
                                     </span>
                                </div>
                            </div>
                        </form>
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