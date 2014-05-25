<div class="container">
    <section class="pad-top-25">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="widget" STYLE="min-height: 400px;padding-top: 50px;">
                    <form  id="connectLogin" role="form" method="post"  class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="username">请选择账户类型：</label>
                            <div class="col-sm-3">
                                <div data-toggle="buttons" class="btn-group">
                                    <label class="btn btn-flat flat-success btn-bordered">
                                        <input type="radio"  name="type"  value="1"> 应聘者
                                    </label>
                                    <label class="btn btn-flat flat-success btn-bordered">
                                        <input type="radio"  name="type" value="2"> 企业
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="username">邮箱地址：</label>
                            <div class="col-sm-3">
                                <input type="input" class="form-control" name="email" value="" />
                                <input type="hidden" name="password" value="<?php echo $user->openid?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-2">
                                <button onclick="registerQQ()" class="btn btn-flat flat-color  col-sm-12" type="button" >下一步</button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
        </div>
    </section>

</div>
<script type="text/javascript">
    function registerQQ(){
        var username = $("#connectLogin input[name='password']").val();
        var password = $("#connectLogin input[name='password']").val();
        var type = $('#connectLogin input[name="type"]:checked').val();
        var email = $("#connectLogin input[name='email']").val();
        if(type == undefined){
            alert('您是应聘者还是企业用户呢？请选择对应的角色。')
            return;
        }
        var search_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
        if(!search_str.test(email)){
            alert('请填写正确的邮箱地址');
            return false;
        }

        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'username':username,'password':password,'type':type,'email':email},
            url:'<?php echo Yii::app()->createUrl('site/register')?>',
            success:function(data) {
                if(data == 'fail'){
                    $("#errRegMsg").text('注册失败');
                    $("#errRegMsg").show();
                }else {
                    window.location.href="<?php echo Yii::app()->baseUrl?>"+data;
                }
            }
        });
    }
</script>