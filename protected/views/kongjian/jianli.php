<div class="mian-content-inner">
    <div class="row">
        <div class="col-md-8">
            <!--<div class="mynav">-->
            <!--    <a --><?php //if($this->action->id == 'info'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/info'); ?><!--">基本设置</a>-->
            <!--    <a --><?php //if($this->action->id == 'changepwd'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/changepwd'); ?><!--">修改密码</a>-->
            <!--    <a --><?php //if($this->action->id == 'jianli' || $this->action->id == 'jianliupload'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/jianli'); ?><!--">我的简历</a>-->
            <!--    <a --><?php //if($this->action->id == 'myscore'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/myscore'); ?><!--">我的积分</a>-->
            <!--</div>-->
            <div class="panel panel-default">
                <div class="panel-heading">已投递职位</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>公司</th>
                            <th>职位</th>
                            <th>投递时间</th>
                            <!--                            <th>备注</th>-->
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($jobs as $key => $value) {?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('mscompany/view',array('id'=>$value->company_id)); ?>">
                                        <?php  $company = MsCompany::model()->findByPk($value->company_id);
                                        echo $company->name ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('msjobs/view',array('id'=>$value->job_id)); ?>">
                                        <?php  $job = MsJobs::model()->findByPk($value->job_id);
                                        echo $job->title ?>
                                    </a>
                                </td>
                                <td>
                                    <?php  echo $value->createtime ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                     </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">简历</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>简历</th>
                            <th>修改时间</th>
                            <th>操作</th>
<!--                            <th>备注</th>-->
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($jianlis != null && count($jianlis)>0){ ?>
                        <?php foreach ($jianlis as $key => $value) {?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('kongjian/jianlidownload',array('id'=>$value->id)); ?>">
                                        <?php  echo $value->name ?>
                                    </a>
                                </td>
                                <td><?php  echo $value->updatetime ?></td>
                                <td>
                                    <a href="javascript;;" id="<?php echo $value->id?>" onclick="deleteJianli(this)"><i class="icon-remove"></i></a>
                                    <?php if($value->flag == '1'){?>
                                        &nbsp;默认简历&nbsp;
                                    <?php }else{?>
                                        <button class="btn" onclick="setDefault(<?php echo $value->id?>)">设置默认</button>
                                    <?php }?>
                                </td>

<!--                                <td>--><?php // echo $value->description ?><!--</td>-->
                            </tr>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="top3">
                            你还没上传简历哦~速度上传简历吧，可以上传word格式文档
                            <br>或者avi,mpeg1,mpeg2,mpeg4,wmv,mp4格式的视频文件简介
                            <br>~我们免费帮您投递~
                        </div>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">投递简历</div>
                <div class="panel-body fade in">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p> 1元，能买二分之一个安全套，能坐二分之一地铁，能获得一份高质量简历。投递简历，马上享有！
                            <a class="alert-link" href="javascript:;">活动详情</a>
                        </p>
                    </div>
                    <form action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">简历:</label>
                            <div class="col-sm-6">
                                <input type="file" name="jianlifile" class=" class="form-control">
                            </div>
                        </div>


                        <p>
                            <button id="jianliSubmit" class="btn btn-danger btn-lg btn-block"  type="submit">上传简历</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(Yii::app()->user->isGuest){?>
<script>
    $('.addGroup').click(function(){
        var r=confirm("您尚未登陆，是否登陆？");
        if(r){
            location.href = "<?php echo Yii::app()->createUrl('public/login'); ?>"; 
        }else{
            return false;
        }
        return false;
    });
</script>

<?php }else{?>
<script>
    $('.addGroup').click(function(){
       var gid  = $.trim($(this).attr('id'));
       var mid  = <?php echo Yii::app()->user->id; ?>;
       var node =$(this);
           if(gid!='' && mid!=''){
                $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('/group/add'); ?>",
                dataType:'json',
                data: "gid="+gid+"&mid="+mid,
                success: function(data){
                  if(data.status==1){
                    node.parent().html(' √已加入');
                    return false;
                  }else{
                    alert(data.info);
                    return false;
                  }
                }
              });
           }else{
                return false;
           }


    });


</script>

<?php } ?>

<script>
    function deleteJianli(imgObj){
        var id = $(imgObj).attr('id');
        var r=confirm("确定删除这份简历吗？")
        if (r==true)
        {
            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'id':id},
                url:'<?php echo Yii::app()->createUrl('/kongjian/deletejianli'); ?>',
                success:function(json) {
                    var result = json.result;
                    if(result == "ok"){
                        alert('成功删除！');
                        window.location.href="<?php echo Yii::app()->createUrl('/kongjian/jianli'); ?>";
                    }else{
                        alert('删除失败！');
                    }
                }
            });
        }
    }

    /*设置默认简历*/
    function setDefault(id){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'id':id},
            url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/kongjian/setDefault'?>',
            success:function(data) {
                if(data == '1'){ //修改成功，刷新页面
                    window.location.reload();
                }else if(data=='0'){
                    alert('抱歉，修改失败');
                }
            }
        });
    }
</script>