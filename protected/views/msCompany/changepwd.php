<section class="pad-25" id="action-box" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="subpage-title noline">
            <h5>修改密码</h5>
        </div>
        <div class="action-box">
            <form name="resetPassword"  id="resetPassword" class="form-horizontal" action="<?php echo Yii::app()->createUrl('site/directReset');?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">新密码:</label>
                    <div class="col-sm-5">
                        <input name="password" class="form-control" type="password" placeholder="输入新密码">
                    </div>
                    <label  class="col-sm-4  errorMessage text-left" error-message="password">
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">确认新密码:</label>
                    <div class="col-sm-5">
                        <input name="password_confirm" class="form-control" type="password" placeholder="确认新密码">
                    </div>
                    <label  class="col-sm-4  errorMessage text-left" error-message="password_confirm">
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button style="margin-top: 5px" id="resetPwd" class="btn btn-flat flat-color"  type="button">重置密码</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function(){
        //菜单选中公司
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(2)").addClass("active");

        //表单校验
        var validator = new FormValidator('resetPassword', [{
            name: 'password',
            display: '新密码',
            rules: 'required'
        },{
            name: 'password_confirm',
            display: '确认密码',
            rules: 'required|matches[password]'}
        ], function(errors, event) {
            if (errors.length > 0) {
                for(var i = 0; i < errors.length ; i++){
                    $("label[error-message='"+errors[i].name +"']").empty().append(errors[i].message);
                }
            }
        });
        //提交表单
        $("#resetPwd").click((function(validate){
            return function(){
                if(validate._validateForm($("#resetPassword")[0])){
                    $(".errorMessage").each(function(){
                        $(this).empty();
                    });
                    $("#resetPassword").ajaxSubmit({
                        url:"<?php echo Yii::app()->createUrl('site/directReset'); ?>",
                        dataType:"json",
                        type:"post",
                        success:function(data){
                            var $target = $('#resetPwd');
                            if($("#successPopover").length == 0 ){
                                $target.popover({
                                    placement:"right",
                                    html:true,
                                    trigger:"manual",
                                    container:"body",
                                    title:"",
                                    content:'<div id="successPopover">密码已经修改</div>'
                                });
                            }
                            $target.popover('show');
                            setTimeout(function(){
                                $target.popover('hide');
                            },2000);
                        }
                    })
                }
            }
        })(validator))

    })
</script>
