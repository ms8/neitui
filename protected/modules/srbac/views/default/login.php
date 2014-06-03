<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客户信息管理系统</title>
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo $this->module->assetUrl; ?><!--/css/common.css" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetUrl;?>/css/styles.css" />
<script src="/js/jquery.js"></script>

</head>

<body id="login">

<div id="wrapper">
    <div id="content">
        <div id="header">
            <h1><a href=""><img alt="平台管理系统" src="<?php echo $this->module->assetUrl;?>/images/logo.png"></a></h1>
        </div>
        <div class="banner320" id="darkbanner">
            <h2>Login</h2>
        </div>
        <div id="darkbannerwrap">
        </div>
        <form method="post" >
            <fieldset class="form">
                <p>
                    <label for="user_name">账号:</label>
                    <input id="LoginForm_username" type="text" name="LoginForm[username]" class="form-control">
                </p>
                <p>
                    <label for="user_password">密码:</label>
                    <input id="LoginForm_password" type="password" name="LoginForm[password]" class="form-control">
                </p>
                <button name="Submit" class="positive" type="submit">
                    <img alt="Announcement" src="<?php echo $this->module->assetUrl;?>/images/key.png">登录
                </button>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
