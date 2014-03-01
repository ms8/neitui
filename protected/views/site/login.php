<div class="login_wrapper">
    <div class="login_header">
        <div class="header">
            <div class="row">
                <div class="col-md-2 col-sm-8">
                    <!-- Header -->
                    <h2 style="margin-bottom:0px"><a href="">面试吧</a></h2>
                    <span class="sub-header">mianshi8.com</span>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div style="padding: 12px 1px;color: #FFFFFF;font-size: 20px">
                        应届生的公司内推平台
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="" id="resubmitToken">
    <div class="login_box">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'loginForm',
            'enableAjaxValidation'=>false,
            'action'=>Yii::app()->baseUrl.'/site/login',
            'htmlOptions'=>array('class'=>'login'),
        )); ?>
<!--            <input type="text" placeholder="请输入登录邮箱地址" tabindex="1" name="email" id="email">-->
<!--            <input type="password" placeholder="请输入密码" tabindex="2" name="password" id="password">-->
            <?php echo $form->textField($model,'username',array('class'=>'inp1','value'=>'','placeholder'=>'用户名')); ?>
            <?php echo $form->passwordField($model,'password',array('class'=>'inp1','placeholder'=>'密码')); ?>
            <span id="beError" style="display:none;" class="error"></span>
            <label for="remember" class="fl"><input type="checkbox" name="autoLogin" checked="checked" value="" id="remember"> 记住我</label>
            <a target="_blank" class="fr" href="http://www.lagou.com/reset.html">忘记密码？</a>
            <input type="submit" value="登 &nbsp; &nbsp; 录" id="submitLogin">

        <?php $this->endWidget(); ?>
        <div class="login_right">
            <div>还没有帐号？</div>
            <a class="registor_now" href="http://www.lagou.com/register.html">立即注册</a>
            <div class="login_others">使用以下帐号直接登录:</div>
            <a title="使用新浪微博帐号登录" class="icon_wb" target="_blank" href="http://www.lagou.com/ologin/auth/sina.html"></a>
            <a title="使用腾讯QQ帐号登录" target="_blank" class="icon_qq" href="http://www.lagou.com/ologin/auth/qq.html"></a>
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