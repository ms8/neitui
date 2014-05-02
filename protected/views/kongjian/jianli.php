<section class="pad-25">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5 style="float: left">简历管理</h5>
                        <form name="uploadForm" enctype="multipart/form-data" method="post">
                            <input id="uploadTest" onchange="submitform()" type="file" name="jianlifile" style="display:none">
                            <button id="uploadJianli" class="btn btn-flat flat-color" style="margin-right: 38px;float: right;padding:2px 10px" onclick="$('input[id=uploadTest]').click()" type="button">上传简历</button>
                        </form>
                    </div>
                    <?php if($jianlis != null && count($jianlis)>0){ ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>简历</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($jianlis as $key => $value) {?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('kongjian/jianlidownload',array('id'=>$value->id)); ?>">
                                        <i class="icon-file-text"></i>&nbsp<?php  echo $value->name ?>
                                    </a>
                                </td>
                                <td><?php  echo $value->updatetime ?></td>
                                <td>
                                    <button id="<?php echo $value->id?>" class="btn btn-flat flat-color" onclick="deleteJianli(this)">删除</button>&nbsp;&nbsp;
                                    <?php if($value->flag == '1'){?>
                                        &nbsp;默认简历&nbsp;
                                    <?php }else{?>
                                        <button class="btn btn-flat flat-color" onclick="setDefault(<?php echo $value->id?>)">设置默认</button>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php }else{ ?>
                            <div class="top3" style="padding:15px">
                                你还没上传简历哦~速度上传简历吧~，众多名企在等着你~
                            </div>
                        <?php }?>
                        </tbody>
                    </table>
                </div>

<!--                <div class="widget">-->
<!--                    <div class="subpage-title noline">-->
<!--                        <h5>上传简历</h5>-->
<!--                    </div>-->
<!---->
<!--                </div>-->

                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>已投递的职位</h5>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 40%">公司</th>
                                <th style="width: 35%">职位</th>
                                <th style="width: 25%">投递时间</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($jobs as $key => $value) {?>
                                <tr>
                                    <td>
                                        <a target="_blank" href="<?php echo Yii::app()->createUrl('mscompany/view/',array('id'=>$value->company_id)); ?>">
                                            <i class="icon-eye-open"></i>&nbsp&nbsp<?php  $company = MsCompany::model()->findByPk($value->company_id);
                                            echo $company->name ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a target="_blank"href="<?php echo Yii::app()->createUrl('msjobs/view/',array('id'=>$value->job_id)); ?>">
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
            </div>


            <div class="col-md-3">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>热门职位</h5>
                    </div>
                    <div style="padding: 10px;">
                        <?php foreach($others as $other){?>
                            <div style="margin-top: 10px;">
                                <a style="font-size:13px"target="_blank" href="<?php echo Yii::app()->baseUrl.'/msjobs/view/'.$other->id?>">
                                    <?php echo CHtml::encode(Helper::truncate_utf8_string($other->title,8));?>
                                </a>
                                <em style="float: right;font-size:13px"><?php echo substr($other->createtime,0,10)?></em>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
    </div>



        <input type="hidden" id="message" value="<?php echo $message?>">

    </div>
</section>


<script>
    function submitform(){
        document.uploadForm.action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>";
        document.uploadForm.submit();
    }

    $(function(){
        //菜单选中个人中心
        $("#header .nav li.active").removeClass("active");
        $("#header .nav li:eq(2)").addClass("active");

        var returnMsg = $("#message").val();
        if(returnMsg != ''){
            alert(returnMsg);
        }
    })
    function deleteJianli(imgObj){
        var id = $(imgObj).attr('id');
        var r=confirm("确定删除这份简历吗？");
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
//                    window.location.reload();
                    window.location.href = window.location.href;//避免重复提交表单
                }else if(data=='0'){
                    alert('抱歉，修改失败');
                }
            }
        });
    }

//    $('input[id=lefile]').change(function() {
//        $('#photoCover').val($(this).val());
//    });

//    $(function(){
//        $('.portfolio-filter a').click(function () {
//            $("#infoType  li.active").removeClass("active");
//            $(this).parent().attr("class",'active');
//            var selector = $(this).attr('data-filter');
//            $("#manage").hide();
//            $("#upload").hide();
//            $("#"+selector).show();
//            return false;
//        });
//    });


</script>