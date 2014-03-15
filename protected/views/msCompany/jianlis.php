<div class="mian-content-inner">
    <div class="row" style="background-color:#f5f5f5">

        <?php $this->renderPartial('_tab',array('index'=>'jianlis')); ?>

        <div class="col-md-8" style="margin-top:40px;width:52%">
            <div class="panel panel-default">
<!--                <div class="panel-heading">已投递职位</div>-->
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>职位</th>
                            <th>简历</th>
                            <th>投递时间</th>
                            <!--                            <th>备注</th>-->
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($jobinfos as $jobinfo) {?>
                            <tr>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('msjobs/view',
                                        array('id'=>$jobinfo['jobid'])); ?>">
                                        <?php  echo $jobinfo['title'] ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo Yii::app()->createUrl('kongjian/jianlidownload',array('id'=>$jobinfo['jianliid'])); ?>">
                                        <?php  echo $jobinfo['jianliname'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php  echo $jobinfo['createtime'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                     </table>
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