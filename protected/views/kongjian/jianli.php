
<div class="top3">
    我的简历
</div>
<!--<div class="mynav">-->
<!--    <a --><?php //if($this->action->id == 'info'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/info'); ?><!--">基本设置</a>-->
<!--    <a --><?php //if($this->action->id == 'changepwd'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/changepwd'); ?><!--">修改密码</a>-->
<!--    <a --><?php //if($this->action->id == 'jianli' || $this->action->id == 'jianliupload'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/jianli'); ?><!--">我的简历</a>-->
<!--    <a --><?php //if($this->action->id == 'myscore'){ ?><!--class="bai"--><?php //} ?><!-- href="--><?php //echo $this->createUrl('/kongjian/myscore'); ?><!--">我的积分</a>-->
<!--</div>-->


    <div class="con clear">
        <form action="?r=kongjian/jianli" method="post" enctype="multipart/form-data">
            <input type="file" name="jianlifile">
            <input id="jianliSubmit" type="submit"  class="btn" value="上传简历">
        </form>
        <?php if($jianlis != null && count($jianlis)>0){?>
        <div class="left2">
            <div class="huatilist" style="margin-top: 30px;">
                <div class="huatilist1">
                        <div class="huatilist2" style="width: 250px">简历</div>
                        <div  style="width: 50px;float: left">操作</div>
                        <div class="huatilist3" style="width: 170px">修改时间</div>
                        <div class="huatilist4" style="width: 200px">备注</div>
                </div>
                <?php foreach ($jianlis as $key => $value) {?>
                    <div class="huatilist1">
                        <div class="huatilist2" style="width: 250px">
                            <a href="<?php echo Yii::app()->createUrl('kongjian/jianlidownload',array('id'=>$value->id)); ?>">
                                <?php  echo $value->name ?>
                            </a>
                        </div>
                        <div style="width: 50px;float: left">
                            <img id="<?php echo $value->id?>" onclick="deleteJianli(this)" style="margin-top: 10px;cursor:pointer;" src="<?php echo  Yii::app()->baseUrl.'/'.IMAGES_TOOLICON_PHOTO.'delete.png'; ?>">
                        </div>
                        <div class="huatilist3"  style="width: 170px">
                            <?php  echo $value->updatetime ?>
                        </div>
                        <div class="huatilist4"  style="width: 200px">
                            <?php  echo $value->description ?>
                        </div>
                    </div>
                <?php  }  ?>
            </div>
        </div>

        <?php }else{?>
            <div class="top3">
                你还没上传简历哦~速度上传简历吧，可以上传word格式文档
                <br>或者avi,mpeg1,mpeg2,mpeg4,wmv,mp4格式的视频文件简介
                <br>~我们免费帮您投递~
            </div>
        <?php
        } if($message != null && $message != ''){ ?>
            <h3 style="color:red"><?php echo $message?></h3>
        <?php
          }?>

        <!-- 发现小组右侧 -->
        <?php //$this->renderPartial('_explore_right',array('tagSelected'=>$tagSelected)); ?>
        
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
                url:'?r=kongjian/deletejianli',
                success:function(json) {
                    var result = json.result;
                    if(result == "ok"){
                        alert('成功删除！');
                        window.location.href="?r=kongjian/jianli";
                    }else{
                        alert('删除失败！');
                    }
                }
            });
        }
    }
</script>