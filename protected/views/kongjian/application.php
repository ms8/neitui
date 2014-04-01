<section class="pad-25" id="action-box">
    <div class="container">
        <div class="alert">
            <strong>已投递的职位</strong>
        </div>
        <div class="action-box">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 30%">公司</th>
                    <th style="width: 30%">职位</th>
                    <th style="width: 30%">投递时间</th>
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