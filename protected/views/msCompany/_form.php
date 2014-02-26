<?php
/* @var $this MsCompanyController */
/* @var $model MsCompany */
/* @var $form CActiveForm */
?>

<div class="form" style="margin-left: 20px;">

    <form method="post" action="<?php echo Yii::app()->baseUrl.'/mscompany/create'?>"
          id="ms-company-form" enctype="multipart/form-data">

        <div class="row">
            <label for="MsCompany_name">公司名称</label>
            <input type="text" id="MsCompany_name" name="MsCompany[name]" maxlength="100" size="60">			</div>

        <div class="row">
            <label for="MsCompany_logo">公司Logo</label>
            <input type="file" size="60" maxlength="100" name="logo" id="MsCompany_logo">
        </div>

        <div class="row">
            <label for="MsCompany_website">公司首页</label>
            <input type="text" id="MsCompany_website" name="MsCompany[website]" maxlength="100" size="60">
        </div>

        <div class="row">
            <label for="MsCompany_email">公司Email</label>
            <input type="text" id="MsCompany_email" name="MsCompany[email]" maxlength="100" size="60">
        </div>

        <div class="row">
            <label for="MsCompany_address">公司地址</label>
            <input type="text" id="MsCompany_address" name="MsCompany[address]" maxlength="100" size="60">
        </div>

        <div class="row">
            <label for="MsCompany_telephone">公司联系电话</label>
            <input type="text" id="MsCompany_telephone" name="MsCompany[telephone]" maxlength="50" size="50">
        </div>

        <div class="row">
            <label for="MsCompany_tags">公司标签</label>
            <input type="text" id="MsCompany_tags" name="MsCompany[tags]" maxlength="500" size="60">
        </div>

        <div class="row">
            <label for="MsCompany_description">公司简介</label>
            <input type="text" id="MsCompany_description" name="MsCompany[description]" maxlength="1000" size="60">
        </div>

        <div class="row buttons">
            <input type="submit" value="提交" name="yt0">
        </div>

    </form>

</div><!-- form -->

