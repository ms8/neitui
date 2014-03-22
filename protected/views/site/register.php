<div class="login_wrapper">
    <div class="login_box">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'loginForm',
            'enableAjaxValidation'=>false,
            'action'=>Yii::app()->baseUrl.'/site/register',
        )); ?>
            <input id="Member_type" type="hidden" name="Member[type]"  value="" >
            <div style="float: left;width:57%">
                <ul class="register_radio clearfix">
                    <li>
                        应聘者
                        <input type="radio" name="type" value="1">
                    </li>
                    <li>
                        企业用户
                        <input type="radio" name="type" value="2">
                    </li>
                </ul>

<!--                <input type="text" placeholder="请输入常用邮箱地址" style="width:96%;height: 40px;" tabindex="1" name="email" id="email">-->
<!--                <span id="beError" style="display:none;" class="error"></span>-->
<!--                <input type="password" style="width:96%;height: 40px;" placeholder="请输入密码" tabindex="2" name="password" id="password">-->
<!--                -->
                <?php echo $form->textField($model,'username',array('style'=>'width:96%;height: 40px;',
                    'value'=>'','onblur'=>'checkUser(this)','placeholder'=>'请输入邮箱地址')); ?>
                <?php echo $form->passwordField($model,'password',array('style'=>'width:96%;height: 40px;','placeholder'=>'请输入密码')); ?>
                <span id="beError" class="error" style="display:none;"></span>
                <label for="checkbox" class="fl">
                    <input type="checkbox" class="checkbox valid" checked="checked" name="checkbox" id="checkbox">
                    我已阅读并同意
                    <a target="_blank" href="<?php echo Yii::app()->createUrl('/site/privacy')?>">《快入职用户协议》</a>
                </label>

            </div>
            <div style="float: right">
                <input  value="注册" id="submitLogin" >
            </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="login_box_btm"></div>
</div>

<script>
    //动态给背景上深绿色
    var style = $("body").attr("style");
    style = style+'background-color:#0D956F';
    $("body").attr("style",style);
    var user_confict = false;
    function checkUser(obj){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':$(obj).val()},
            url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/checkUser'?>',
            success:function(data) {
                if(data == '1'){
                    $("#beError").text('用户名已被注册');
                    $("#beError").show();
                    user_confict = true;
                }else{
                    $("#beError").hide();
                    user_confict = false;
                }
            }
        });
    }
    $("#submitLogin").live("click",function(){
        var type = $('input[name="type"]:checked').val();
        if(type == undefined){
            alert('您是应聘者还是企业用户呢？请选择对应的角色。')
            return;
        }
        var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
        var email_val = $("#Member_username").val();
        if(user_confict){
            alert('用户名已被注册,请更换另一个用户名');
            return;
        }
        if(!search_str.test(email_val)){
            alert('请填写正确的邮箱地址');
            $('#Member_username').focus();
            return false;
        }
        if($("#checkbox").attr("checked")!='checked'){
            alert('非常抱歉，您需要同意我们的注册协议才能注册');
            return false;
        }
        $("#Member_type").val(type);
        $("#loginForm").submit();
    });



</script>

