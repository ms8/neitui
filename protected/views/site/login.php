<div class="login_wrapper">
    <div class="login_box">
        <div>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'loginForm',
                'enableAjaxValidation'=>false,
                'action'=>Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/login',
                'htmlOptions'=>array('class'=>'login form-horizontal','role'=>'form'),
            )); ?>
    <!--            <input type="text" placeholder="请输入登录邮箱地址" tabindex="1" name="email" id="email">-->
    <!--            <input type="password" placeholder="请输入密码" tabindex="2" name="password" id="password">-->
            <div class="row">
                <div class="col-md-8" style="margin-top: 40px;">
                    <?php echo $form->textField($model,'username',array('class'=>'inp1','value'=>'','placeholder'=>'用户名')); ?>
                    <?php echo $form->passwordField($model,'password',array('class'=>'inp1','placeholder'=>'密码')); ?>
                    <span id="beError" style="display:none;" class="error"></span>
                    <div>
                    <label for="remember"><input type="checkbox" name="autoLogin" checked="checked" value="" id="remember"> 记住我</label>
                    <a target="_blank"  href="<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/forgetpassword'?>">忘记密码？</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="submit" value="登 &nbsp; &nbsp; 录" id="submitLogin" />
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <div class="login_right">
                <div class="col-md-3" style="height: 50px;line-height: 50px;">还没有帐号？</div>
                <div class="col-md-9"> <a class="registor_now" href="http://www.lagou.com/register.html">立即注册</a>
                    <a title="使用新浪微博帐号登录" class="icon_wb" target="_blank" href="http://www.lagou.com/ologin/auth/sina.html"></a>
                    <a title="使用腾讯QQ帐号登录" target="_blank" class="icon_qq" href="http://www.lagou.com/ologin/auth/qq.html"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="login_box_btm"></div>
</div>

<input type="hidden" value="<?php echo $msg?>" id="msg">

<script type="text/javascript">

    $("#submitLogin").click(
        function(){
//            $("input").parent().next().html('');
            $('#login-form').submit();
        }
    );
    $(document).ready(function(){
        var msg = $("#msg").val();
        if(msg != ""){
            $("#beError").text(msg);
            $("#beError").show();
        }
    });
</script>