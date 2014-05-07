<section>
    <div class="container">
        <div class="row pad-25">
            <div class="clearfix col-md-9 main">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5 id="company-name"><?php echo $model->name?></h5>
                    </div>
                    <div class="media widget-content">
                        <a href="<?php echo $model->website?>" target="_blank" class="pull-left intro-logo">
                            <img alt="快入职 | 应届生招聘 |<?php echo $model->name?>"  class="media-object" src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
                        </a>
                        <div class="media-body">
                            <?php if($model->status == '1'){ ?>
                                <div style="color: red">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                            <?php }?>
                            <p><?php echo $model->description?></p>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>招聘职位</h5>
                    </div>
                    <div id="accordion" class="panel-group">
                        <table id="jobs" class="table jobs">
                            <thead>
                            <tr>
                                <th style="width: 30%">职位</th>
                                <th style="width: 25%">城市</th>
                                <th style="width: 35%">发布时间</th>
                                <th style="width: 10%">查看</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($jobs as $job) {?>
                                <tr id="<?php echo $job['job']->id?>">
                                    <td>
                                        <a href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job['job']->id?>">
                                            <span class="job-title"><?php echo $job['job']->title?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="job-city"><?php echo $job['job']->cityname?></span>
                                    </td>
                                    <td>
                                        <span class="job-time"><?php echo $job['job']->createtime?></span>
                                    </td>
                                    <td>
                                        <a href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job['job']->id?>"><i class="icon-eye-open"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 sidebar">
                <div class="widget popular-posts">
                    <div class="subpage-title noline">
                        <h5>基本信息</h5>
                    </div>
                    <div class="c_detail widget-content">
                        <form class="form-horizontal" role="form">
                            <?php if($model->website != null && $model->website != ''){ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5">网址：</label>
                                <div class="col-sm-7">
                                    <span class="info-name">
                                        <a href="<?php echo $model->website?>" target="_blank">
                                            <?php echo $model->website?>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <?php } if($model->address != null && $model->address != ''){?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5">地址：</label>
                                <div class="col-sm-7">
                                    <span class="info-name">
                                       <?php echo $model->address?>
                                    </span>
                                </div>
                            </div>
                            <?php } if($model->tags != null && $model->tags != ''){?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5">标签：</label>
                                <div class="col-sm-7">
                                    <div class="info-tags">
                                        <ul  class="tagcloud-list">
                                            <?php
                                            $tags = empty($model->tags) ? array() : explode(' ',$model->tags);
                                            foreach($tags as $tag){
                                                ?>
                                                <li>
                                                    <span><?php echo $tag?></span>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(1)").addClass("active");

    });
</script>