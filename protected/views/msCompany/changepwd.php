<section class="pad-25" id="action-box" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="alert alert-success alert-dismissable">
            <strong>修改密码</strong>
        </div>
        <div class="action-box">
            <form class="form-horizontal" action="<?php echo Yii::app()->createUrl('site/directReset');?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">新密码:</label>
                    <div class="col-sm-5">
                        <input name="password" class="form-control" type="password" placeholder="输入新密码">
                        <button style="float: right;margin-top: 5px" id="resetPwd" class="btn btn-flat flat-color"  type="submit">重置密码</button>

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
    })
</script>
