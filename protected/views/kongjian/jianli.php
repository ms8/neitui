<section class="pad-25" id="action-box">
    <div class="container">
        <div class="alert alert-success alert-dismissable">
            <strong>已投递的职位</strong>
        </div>

        <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"
              action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>">
            <label for="inputPassword3" class="col-sm-1 control-label">简历:</label>
            <div class="col-sm-6">
                <input type="file" name="jianlifile" class=" class="form-control">
            </div>
            <button id="jianliSubmit" class="btn btn-danger"  type="submit">上传简历</button>
        </form>

        <div class="action-box">
                <table class="table">
                    <thead>
                        <tr>
                            <th>简历</th>
                            <th>修改时间</th>
                            <th>操作</th>
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
                            你还没上传简历哦~速度上传简历吧，可以上传word格式文档
                            <br>或者avi,mpeg1,mpeg2,mpeg4,wmv,mp4格式的视频文件简介
                            <br>~我们免费帮您投递~
                        </div>
                    <?php }?>
                    </tbody>
                </table>
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
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(2)").addClass("active");
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
</script>