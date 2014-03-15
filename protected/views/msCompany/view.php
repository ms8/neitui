<section>
    <div class="container">
        <div class="row">
            <div class="clearfix col-md-9 main">
                <div class="post-wrapper">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="<?php echo $model->name?>"  class="media-object" style="width: 190px; height: 190px;" src="<?php echo Yii::app()->baseUrl.'/'.$model->logo?>">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->name?></h4>
                            <?php if($model->status == '1'){ ?>
                                <div style="color: red">公司信息未验证，暂时不能发布招聘信息和阅读简历</div>
                            <?php }?>
                            <p><?php echo $model->description?></p>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper">
                    <div class="subpage-title">
                        <h5>招聘职位</h5>
                    </div>
                    <div id="accordion" class="panel-group">
                        <?php foreach($jobs as $job){?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#collapse<?php echo $job->id?>" job-id="<?php echo $job->id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                        <span title="Java" class="pos"><?php echo $job->title?></span>
                                        <span class="job-terms"><?php echo $job->createtime?></span>
                                        <span class="job-city"><?php echo $job->cityname?></span>
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse" id="collapse<?php echo $job->id?>" style="height: 0px;">
                                <div class="panel-body"></div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
<!--                    <ul id="jobList" class="job-details-list">-->
<!--                        --><?php //foreach($jobs as $job){?>
<!--                            <li>-->
<!--                                    <a target="_blank"-->
<!--                                   href="--><?php //echo Yii::app()->baseUrl.'/msjobs/view/'.$job->id?><!--">-->
<!--                                        <span title="Java" class="pos">--><?php //echo $job->title?><!--</span>-->
<!--                                        <span class="job-terms">--><?php //echo $job->createtime?><!--</span>-->
<!--                                        <span class="job-city">--><?php //echo $job->cityname?><!--</span>-->
<!--                                    </a>-->
<!--                            </li>-->
<!--                        --><?php //}?>
<!--                    </ul>-->
                </div>

            </div>
            <div class="col-md-3 sidebar">
                <div class="widget popular-posts">
                    <div class="subpage-title">
                        <h5>基本信息</h5>
                    </div>
                    <dl class="dl-horizontal companyInfo">
                        <dt>地点</dt>
                        <dd>北京</dd>
                        <dt>领域</dt>
                        <dd>互联网</dd>
                        <dt>规模</dt>
                        <dd>150</dd>
                        <dt>网址</dt>
                        <dd><a href="<?php echo $model->website?>" target="_blank">
                                <?php echo $model->website?>
                            </a></dd>
                        <dt>地址</dt>
                        <dd><?php echo $model->address?></dd>
                    </dl>
                </div>
                <div class="widget tagcloud">
                    <div class="subpage-title">
                        <h5>公司印象</h5>
                    </div>
                    <ul class="tagcloud-list">
                        <?php
                        $tags = explode(' ',$model->tags);
                        foreach($tags as $tag){
                            ?>
                            <li><a href="#"><?php echo $tag?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function(){
        $('#accordion').on('show.bs.collapse', function (options,target) {
            var jobId = $(target).attr("job-id");
            var $content = $("#collapse"+jobId+" .panel-body");
            if($content.html() == "") {
                $.ajax({
                    type:'POST',
                    dataType:'json',
                    url:'<?php echo Yii::app()->createUrl('msjobs/view')?>'+"/"+jobId,
                    success:function(data) {
                        $content.html(data.description);
                    }
                });
            }

        })
    })
</script>