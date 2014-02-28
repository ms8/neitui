
<div class="clearfix">
    <div class="content_l">
        <?php if($model->status == '1'){ ?>
        <div style="color: red">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
        <?php }?>
        <div class="c_detail">
            <div class="c_logo">
                <div id="logoShow">
                    <img width="190" height="190" alt="<?php echo $model->name?>"
                         src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
                </div>
            </div>
            <div class="c_box">
                <h2 ><?php echo $model->name?></h2>
                <div class="clear"></div>
                <span>主页：</span>
                    <a href="<?php echo $model->website?>" target="_blank">
                        <?php echo $model->website?>
                    </a>

                <h5>地址：<?php echo $model->address?></h5>
            </div>
            <div class="clear"></div>
        </div>

        <!--[if IE 7]> <br /> <![endif]-->

        <!--公司简介  -->
        <dl class="c_section">
            <dt>
            <h2><em></em>公司介绍</h2>
            </dt>
            <dd>
                <div class="c_intro">
                    <?php echo $model->name?>&nbsp;&nbsp;
                    <?php echo $model->description?>
                </div>
            </dd>
        </dl>

        <!--有招聘职位  -->
        <dl class="c_section">
            <dt>
            <h2><em></em>招聘职位</h2>
<!--            <span class="jobsTotal">该公司近两月共有 <i>1</i> 个职位正在招聘</span>-->
            </dt>
            <dd>
                <ul id="jobList" class="reset c_jobs">
                    <?php foreach($jobs as $job){?>
                        <li>
                            <a target="_blank"
                               href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$job->id?>">
                                <h3>
                                    <span title="Java" class="pos"><?php echo $job->title?></span>
                                    <span><?php echo $job->cityname?></span>
                                </h3>
                                <span><?php echo $job->createtime?></span>
                            </a>
                        </li>
                    <?php }?>
                </ul>

            </dd>
        </dl>
        <!-- <div id="flag"></div> -->

    </div>

    <div class="content_r">
        <div class="r_box">
            <h3 >公司印象</h3>
            <div class="clear"></div>
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
        </div>


    </div>
</div>
