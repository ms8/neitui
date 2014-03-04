<div class="login_wrapper">
    <div class="login_box">
            <div style="float: left;width:57%">
                <input id="Member_username" type="text" maxlength="64" name="Member[username]"
                       placeholder="请填写注册邮箱" onblur="checkUser(this)" value=""
                       style="width:96%;height: 40px;">
                <span id="beError" class="error" style="display:none;"></span>
            </div>
            <div style="float: right">
                <input  type="button" class="btn" value="找回密码" id="apply" >
            </div>
    </div>
    <div class="login_box_btm"></div>
</div>

<script>
    function checkUser(obj){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':$(obj).val()},
            url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/checkUser'?>',
            success:function(data) {
                if(data == '0'){
                    $("#beError").text('该邮箱不是本站用户');
                    $("#beError").show();
                }else{
                    $("#beError").hide();
                }
            }
        });
    }
    $("#apply").live("click",function(){
        var username = $("#Member_username").val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username},
            url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/checkUser'?>',
            success:function(data) {
                if(data == '0'){
                    $("#beError").text('该邮箱不是本站用户');
                    $("#beError").show();
                }else{
                    $("#beError").hide();
                    var email = $("#Member_username").val();
                    $.ajax({
                        type:'POST',
                        dataType:'json',
                        data:{'username':email},
                        url:'<?php echo Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/forget'?>',
                        success:function(data) {
                            if(data == '1'){
                                alert('修改密码的链接已经发到您的邮箱:'+email+',请前往修改密码。');
                            }else if(data=='-1'){
                                window.location.href="<?php echo Yii::app()->baseUrl?>";
                            }else{
                                alert('抱歉，邮件发送失败，请检查该邮箱地址是否正确');
                            }
                        }
                    });
                }
            }
        });
    });

</script>

