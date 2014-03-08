

<!-- Main Container -->
<!--<section id="main-content">-->
<!-- Container -->
<div  class="content">
    <div class="mian-content" id="portfolio">

        <div style="visibility: visible; opacity: 1;" class="sort_by_cat" id="filters" data-option-key="filter">
            <div id="filter-up"></div>
            <a href="#filter" data-option-value="*" class="active_sort">北京</a>
            <span class="text-sep">/</span>
            <a class="" href="#filter" data-option-value=".css_sort">上海</a>
            <span class="text-sep">/</span>
            <a class="" href="#filter" data-option-value=".html_sort">广州</a>
            <span class="text-sep">/</span>
            <a class="" href="#filter" data-option-value=".psd_sort">深圳</a>
        </div>

        <section class="pe-container">
            <ul id="pe-thumbs" class="pe-thumbs">
                <?php foreach($companys as $company){?>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$company->id?>">
                            <img src="<?php echo Yii::app()->baseUrl.'/'.$company->logo?>" />
                            <div class="pe-description">
                                <h3><?php echo $company->name?></h3>
                                <p><?php echo $company->description?></p>
                            </div>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </section>
    <!--<div class="header">-->
    <!--    <div class="row">-->
    <!--        <div class="col-md-12 col-sm-12">-->
    <!--            <div class="description">-->
    <!--                你还在挤招聘会吗？海量公司供你选择，24小时回复-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Begin Projects-->



</div>
<!-- End Projects -->

    <div class="search" style="margin:30px auto 0 auto;width:259px;border-radius: 6px;" >
        <button onclick="submitjl()" id="submitbt" class="tjl-btn">马上投简历</button>
    </div>
<!--    <button style="margin-left: 200px;width:20%;border-color: #D01C00;" onclick="submitjl()" id="submitbt" class="tjl-btn">马上投简历</button>-->

<!--<div class="header">-->
<!--    <div class="row">-->
<!---->
<!--        <div class="col-md-12 col-sm-12">-->
<!--            <div class="search">-->
<!--                <button class="tjl-btn"  id="submitbt" onclick="submitjl()">马上投简历</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

</div>
<!--    </section>-->

<!-- 弹出登录框-->
<div id="loginDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div id="header" style="height: 40px;background-color: #088b69">
        <div style="float: left">登录</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="login-close">X</div>
    </div>

    <div id="content" style="height: 170px;background-color: #71bd90;padding-top:50px">
        <form id="loginForm" class="login" method="post" action="<?php echo Yii::app()->baseUrl.'/site/login'?>">
            <input type="hidden" name="loginflag" value="0">
            <div style="margin: 0px 0 10px 20px;">
                <label>用户名</label>
                <input id="username" name="LoginForm[username]">
            </div>
            <div style="margin-left: 20px;">
                <label>密码</label>
                <input id="password" name="LoginForm[password]">
            </div>
        </form>
    </div>

    <div id="footer" style="height: 50px;">
        <button id="loginbt" style="float: right;margin-top:-30px;margin-right:20px;width:50px;height:30px">登录</button>
    </div>
</div>
<!-- -->
<!-- 弹出对话框上传简历-->
<div id="uploadDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div style="height: 40px;background-color: #088b69">
        <div style="float: left">上传简历并投递该职位</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="upload-close">X</div>
    </div>

    <div style="height: 220px;background-color: #71bd90;padding-top:50px">
        <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"
              action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>">
            <label for="inputPassword3" class="col-sm-1 control-label">简历:</label>
            <div class="col-sm-6">
                <input type="file" name="jianlifile" class=" class="form-control">
            </div>
            <button id="jianliSubmit" class="btn btn-danger"  type="submit">上传简历</button>
            <div style="clear:both"></div>
            <div class="col-sm-5">
                投递其他职位时默认使用该简历：<br>
                <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;
                <input type="radio" value="0" name="flag" >否
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    $("#login-close").live('click',function(){
        $("#loginDiv").hide();
    });
    $('#loginbt').live('click',function(){
        $("#loginForm").submit();
    });
    $("#upload-close").live('click',function(){
        $("#uploadDiv").hide();
    });
    $("#choose-close").live('click',function(){
        //清除里面动态生成的内容
        $("#jianlis").empty();
        $("#chooseDiv").hide();
    });
    $("#choose_td").live('click',function(){
        var jianli_id = $('input[name="chosen"]:checked').val();
        $("#jianliid").val(jianli_id);
        $("#chooseForm").submit();
    });

    function submitjl(){
        $.ajax({
            type:'POST',
            dataType:'json',
//            data:{'jobid':id},
            url:'<?php echo Yii::app()->createUrl('msjobs/jlUpload')?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $("#loginDiv").show();
                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv").show();
                }
            }
        });
    };
</script>
