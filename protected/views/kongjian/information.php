<section class="pad-25" id="action-box">
    <div class="container">
<!--        <div class="alert alert-success alert-dismissable">-->
<!--            <strong>信息维护</strong>-->
<!--            &nbsp;&nbsp;完善你的信息，让公司全都找到你~-->
<!--        </div>-->
        <ul id="infoType" class="portfolio-filter nav nav-pills" style="padding:0px">
            <li class="active">
                <a data-filter="base" href="#">基本信息</a>
            </li>
            <li>
                <a data-filter="school" href="#">学校信息</a>
            </li>
            <li>
                <a data-filter="projects" href="#">项目经历</a>
            </li>
        </ul>

        <div class="action-box" id="base" style="min-height: 500px;">
            <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'baseForm',
                'enableAjaxValidation'=>false,
                'action'=>Yii::app()->createUrl("/kongjian/information"),
                'htmlOptions'=>array('class'=>'form-horizontal')
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model,'realname',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model,'realname',array('size'=>50,'maxlength'=>50,
                        'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'realname'); ?>
                </div>

            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                    <?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,
                        'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'phone'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'sex',array('class'=>'col-sm-2 control-label')); ?>
                <div class="radioTag">
                    <?php echo $form->radioButtonList($model,'sex', array('1'=>'男','0'=>'女'),
                        array('separator'=>'&nbsp;',
                            'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'skill',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'skill',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'hasoffer',array('class'=>'col-sm-2 control-label')); ?>
                <div class="radioTag">
                    <?php echo $form->radioButtonList($model,'hasoffer', array('1'=>'是','0'=>'否'),
                        array('separator'=>'&nbsp;',
                            'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                </div>
            </div>
        </div>

        <div class="action-box" id="school" style="display: none;min-height: 300px;">
            <div class="form-group">
                <?php echo $form->labelEx($model,'universitytype',array('class'=>'col-sm-2 control-label')); ?>
                <div class="radioTag" >
                    <?php echo $form->radioButtonList($model,'universitytype',$uniarr,
                        array('separator'=>'&nbsp;',
                            'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'universityname',array('class'=>'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                   <?php echo $form->textField($model,'universityname',array('size'=>50,'maxlength'=>50,
                        'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'universityname'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'degree',array('class'=>'col-sm-2 control-label')); ?>
                <div class="radioTag">
                    <?php echo $form->radioButtonList($model,'degree',$degreearr,
                        array('separator'=>'&nbsp;',
                            'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'jianglitype',array('class'=>'col-sm-2 control-label')); ?>
                <div class="radioTag">
                    <?php echo $form->radioButtonList($model,'jianglitype',$jiangliarr,
                        array('separator'=>'&nbsp;',
                            'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                </div>
            </div>
        </div>

        <div class="action-box" id="projects" style="display: none;min-height: 510px;">
            <div class="form-group">
                <?php echo $form->labelEx($model,'projects',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'projects',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'peixun',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'peixun',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

        </div>

        <div class="form-group">
            <input type="submit" value="保存" name="yt0" class="btn btn-flat flat-color"
                   style="margin:-50px 0 0 695px;font-size:15px;width:80px;height:50px" >
        </div>

        <?php $this->endWidget(); ?>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        //菜单选中个人中心
        $("#header .nav li.active").removeClass("active");
        $("#header .nav li:eq(2)").addClass("active");

        var $container = $('#isotope-portfolio-container');
        var $filter = $('.portfolio-filter');
        $('.portfolio-filter a').click(function () {
            $("#infoType  li.active").removeClass("active");
            $(this).parent().attr("class",'active');
            var selector = $(this).attr('data-filter');
            $("#base").hide();
            $("#school").hide();
            $("#projects").hide();
            $("#"+selector).show();
            return false;
        });

    })
    function submit(){
        $("#infoForm").submit();
    }

</script>