<section class="pad-25" id="action-box">
    <div class="container">
        <div class="alert alert-success alert-dismissable">
            <strong>信息维护</strong>
            &nbsp;&nbsp;完善你的信息，让公司全都找到你~
        </div>
        <div class="action-box">

            <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'ms-students-form',
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
                <?php echo $form->labelEx($model,'universitytype',array('class'=>'col-sm-2 control-label')); ?>
                <div style="margin-top:7px">
                    <?php echo $form->radioButtonList($model,'universitytype',$uniarr,
                        array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'')) )?>
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
                <div style="margin-top:7px">
                <?php echo $form->radioButtonList($model,'degree',$degreearr,
                    array('separator'=>'&nbsp;','labelOptions'=>array()) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'jianglitype',array('class'=>'col-sm-2 control-label')); ?>
                <div style="margin-top:7px">
                <?php echo $form->radioButtonList($model,'jianglitype',$jiangliarr,
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'sex',array('class'=>'col-sm-2 control-label')); ?>
                <div style="margin-top:7px">
                <?php echo $form->radioButtonList($model,'sex', array('1'=>'男','0'=>'女'),
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'projects',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'projects',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'skill',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'skill',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'peixun',array('class'=>'col-sm-2 control-label')); ?>
                <?php echo $form->textArea($model,'peixun',array('rows'=>7, 'cols'=>70,'style'=>'width:81%','class'=>'form-control')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'hasoffer',array('class'=>'col-sm-2 control-label')); ?>
                <div style="margin-top:7px">
                <?php echo $form->radioButtonList($model,'hasoffer', array('1'=>'是','0'=>'否'),
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
                </div>
            </div>


            <div class="col-sm-10">
                <input type="submit" value="保存" name="yt0" class="btn btn-flat flat-color">
            </div>

            <?php $this->endWidget(); ?>
            <br>


        </div>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        //菜单选中个人中心
        $(".nav li.active").removeClass("active");
        $(".nav li:eq(2)").addClass("active");
    })
    function submit(){
        $("#infoForm").submit();
    }
</script>