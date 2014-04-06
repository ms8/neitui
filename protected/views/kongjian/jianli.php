<section class="pad-25">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>简历管理</h5>
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
                            <div class="top3">
                                你还没上传简历哦~速度上传简历吧~，众多名企在等你~
                            </div>
                        <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>上传简历</h5>
                    </div>
                    <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"
                          action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>">
                        <input id="lefile" type="file"  name="jianlifile" style="display:none">
                        <div class="input-group">
                            <input id="photoCover" class="form-control" type="text" >
                            <span class="input-group-addon" onclick="$('input[id=lefile]').click();">
                                选择简历
                            </span>
                        </div>
                        <div class="pad-top-25">
                            <button id="jianliSubmit" class="col-md-12 btn btn-flat flat-color"  type="submit">上传简历</button>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div>
<!--            <ul id="infoType" class="portfolio-filter nav nav-pills" style="padding:0px;margin-bottom:15px">-->
<!--            <li class="active">-->
<!--                <a data-filter="manage" href="#">简历管理</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a data-filter="upload" href="#">上传简历</a>-->
<!--            </li>-->
<!--        </ul>-->

        <div id="upload"  style="display: none">
            <div class="action-box">
<!--                <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"-->
<!--                      action="--><?php //echo Yii::app()->baseUrl.'/kongjian/jianli'?><!--">-->
<!--                    <input id="lefile" type="file"  name="jianlifile" style="display:none">-->
<!--                    <div class="input-group" style="width:60%;float: left">-->
<!--                        <input id="photoCover" class="form-control" type="text" >-->
<!--                    <span class="input-group-addon" onclick="$('input[id=lefile]').click();">-->
<!--                        选择简历-->
<!--                    </span>-->
<!--                    </div>-->
<!--                    <div style="float: left;margin:2px 100px">-->
<!--                        <button id="jianliSubmit" class="btn btn-flat flat-color"  type="submit">上传简历</button>-->
<!--                    </div>-->
<!--                    <div style="clear: both;"></div>-->
<!--                </form>-->
            </div>
        </div>

        <div id="manage" >
<!--            <div class="action-box">-->
<!--                    --><?php //if($jianlis != null && count($jianlis)>0){ ?>
<!--                <table class="table">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>简历</th>-->
<!--                        <th>修改时间</th>-->
<!--                        <th>操作</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                        --><?php //foreach ($jianlis as $key => $value) {?>
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    <a href="--><?php //echo Yii::app()->createUrl('kongjian/jianlidownload',array('id'=>$value->id)); ?><!--">-->
<!--                                        --><?php // echo $value->name ?>
<!--                                    </a>-->
<!--                                </td>-->
<!--                                <td>--><?php // echo $value->updatetime ?><!--</td>-->
<!--                                <td>-->
<!--                                    <button id="--><?php //echo $value->id?><!--" class="btn btn-flat flat-color" onclick="deleteJianli(this)">删除</button>&nbsp;&nbsp;-->
<!--                                    --><?php //if($value->flag == '1'){?>
<!--                                        &nbsp;默认简历&nbsp;-->
<!--                                    --><?php //}else{?>
<!--                                        <button class="btn btn-flat flat-color" onclick="setDefault(--><?php //echo $value->id?><!--)">设置默认</button>-->
<!--                                    --><?php //}?>
<!--                                </td>-->
<!--                            </tr>-->
<!--                        --><?php //} ?>
<!--                    --><?php //}else{ ?>
<!--                        <div class="top3">-->
<!--                            你还没上传简历哦~速度上传简历吧~，众多名企在等你~-->
<!--                        </div>-->
<!--                    --><?php //}?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
        </div>


    </div>
</section>

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
    $(function(){
        //菜单选中个人中心
        $("#header .nav li.active").removeClass("active");
        $("#header .nav li:eq(2)").addClass("active");
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
                    window.location.reload();
                }else if(data=='0'){
                    alert('抱歉，修改失败');
                }
            }
        });
    }

    $('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val());
    });

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