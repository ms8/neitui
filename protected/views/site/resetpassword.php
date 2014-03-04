<div class="login_wrapper">
    <form id="resetForm" action="<?php echo Yii::app()->baseUrl.'/site/resetpassword'?>">
    <div class="login_box">
            <div style="float: left;width:57%">
                <input id="username" type="hidden" name="username" value="<?php echo $username?>">
                <input id="serialnum" type="hidden" name="serialnum" value="<?php echo $serialnum?>">
                <input id="password" type="password" maxlength="64" name="password"
                       placeholder="输入新的密码" value="" style="width:96%;height: 40px;">
            </div>
            <div style="float: right">
                <input  type="submit" class="btn" value="重置密码" id="reset" >
            </div>
    </div>
    </form>
    <div class="login_box_btm"></div>
</div>

