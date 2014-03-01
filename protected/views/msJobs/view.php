<div class="clearfix">
    <div class="content_l">
        <dl class="job_detail">
            <dt>
            <h1 >
                <?php echo $model->title?>
            </h1>

            </dt>
            <dd class="job_request">
                <div>发布时间：<?php echo $model->createtime?></div>
            </dd>
            <div class="clear"></div>
            <dd class="job_bt">
                <h3 class="description">职位描述</h3>
                <p>
                    <?php echo $model->description?>
                </p>
            </dd>

            <dd>
                <div>
                    <button class="btn" id="submitbt" onclick="submitjl(<?php echo $model->id?>)">投简历</button>
                </div>
            </dd>
        </dl>
        <div id="weibolist"></div>
    </div>
    <div class="content_r">
        <dl class="job_company">
            <div style="width: 190px;height: 110px;">
                <a target="_blank" href="<?php echo $company->website?>">
                    <img style="display:block;width: 190px;height: 110px;" alt="<?php echo $company->name?>"
                         src="<?php echo Yii::app()->baseUrl.'/'.$company->logo?>" class="b2">
                </a>
            </div>
            <div style="">
                <?php echo $company->name?>
            </div>
            <dd>
                <ul class="c_feature reset">
                    <?php if($company->website != null){?>
                    <li>
                        <span>主页</span>
                        <a rel="nofollow" title="<?php echo $company->website?>" target="_blank" href="<?php echo $company->website?>">
                            <?php echo $company->website?>
                        </a>
                    </li>
                    <?php }?>
                    <?php if($company->address != null){?>
                        <li>
                            <span>地址</span>
                            <?php echo $company->address?>
                        </li>
                    <?php }?>
                </ul>
            </dd>
        </dl>
    </div>
</div>

<script>
    function submitjl(id){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'jobid':id},
            url:'<?php echo Yii::app()->baseUrl.'/msjobs/apply'?>',
            success:function(data) {
                var i=0, length=data.length, service;
                for(; i<length; i++) {
                    service = data[i];
                    $("#service_zone").append("<option value='"+service.id+"'>"+service.name+"</option>");
                }
            }
        });
    });
</script>