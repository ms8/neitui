<div class="col-md-2" style="margin:40px 10px 0 185px;">
    <div class="panel panel-default">
        <div class="panel-heading" id="dashboard">公司信息</div>
        <div class="panel-heading" id="jobCreate">修改密码</div>
        <div class="panel-heading" id="jianlis">收到的简历</div>
        <div class="panel-heading" id="changepwd">修改密码</div>
    </div>
</div>

<input type="hidden" id="index" value="<?php echo $index?>">

<script type="text/javascript">
    var index = $("#index").val();
    $("#"+index).attr('class','panel-heading-active');
    $("div[class^='panel-heading']").live('click',function(){
       var id = $(this).attr('id');
       window.location.href="<?php echo Yii::app()->createUrl('/mscompany')?>"+"/"+id;
    });
</script>