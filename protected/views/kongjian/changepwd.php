<div class="mian-content-inner">
    <div class="row" style="background-color:#f5f5f5">

        <?php $this->renderPartial('_tab',array('index'=>'changepwd')); ?>

        <div class="col-md-6" style="margin-top:40px;width:52%">
            <div class="panel panel-default">
                <div class="panel-heading">信息维护</div>
                <div class="panel-body fade in">
                    <form action="<?php echo Yii::app()->createUrl('site/directReset');?>">
                        新密码:<input name="password" type="password" placeholder="输入新密码">
                        <button id="resetPwd" class="btn btn-danger"  type="submit">重置密码</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        //菜单选中个人中心
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(2)").addClass("active");
    })
</script>