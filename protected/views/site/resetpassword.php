<!--<div class="login_wrapper">-->
<!--    <form id="resetForm" action="--><?php //echo Yii::app()->baseUrl.'/site/resetpassword'?><!--">-->
<!--    <div class="login_box">-->
<!--            <div style="float: left;width:57%">-->
<!--                <input id="username" type="hidden" name="username" value="--><?php //echo $username?><!--">-->
<!--                <input id="serialnum" type="hidden" name="serialnum" value="--><?php //echo $serialnum?><!--">-->
<!--                <input id="password" type="password" maxlength="64" name="password"-->
<!--                       placeholder="输入新的密码" value="" style="width:96%;height: 40px;">-->
<!--            </div>-->
<!--            <div style="float: right">-->
<!--                <input  type="submit" class="btn" value="重置密码" id="reset" >-->
<!--            </div>-->
<!--    </div>-->
<!--    </form>-->
<!--    <div class="login_box_btm"></div>-->
<!--</div>-->
<form id="resetForm" action="<?php echo Yii::app()->baseUrl.'/site/resetpassword'?>"
    <div style="width:40%;margin:100px 0 0 400px;" class="input-group">
        <input id="username" type="hidden" name="username" value="<?php echo $username?>">
        <input id="serialnum" type="hidden" name="serialnum" value="<?php echo $serialnum?>">
        <input type="password" placeholder="输入新的密码" name="password" maxlength="64" id="password"
               class="form-control">
        <span  style="height:43px" id="reset" class="input-group-addon" >重置密码</span>
    </div>
</form>

<script type="text/javascript">
    $("#reset").live("click",function(){
        $("#resetForm").submit();
    });
</script>