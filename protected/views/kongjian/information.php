<section class="pad-25" id="action-box">
    <div class="container">
        <div class="action-box">
            <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'ms-students-form',
                'enableAjaxValidation'=>false,
                'action'=>Yii::app()->createUrl("/kongjian/information")
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model,'universitytype'); ?>
                <?php echo $form->radioButtonList($model,'universitytype',$uniarr,
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'universityname'); ?>
                <?php echo $form->textField($model,'universityname',array('size'=>50,'maxlength'=>50)); ?>
                <?php echo $form->error($model,'universityname'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'degree'); ?>
                <?php echo $form->radioButtonList($model,'degree',$degreearr,
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'jianglitype'); ?>
                <?php echo $form->radioButtonList($model,'jianglitype',$jiangliarr,
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'sex'); ?>
                <?php echo $form->radioButtonList($model,'sex', array('1'=>'男','0'=>'女'),
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'projects'); ?>
                <?php echo $form->textArea($model,'projects',array('rows'=>10, 'cols'=>100)); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'skill'); ?>
                <?php echo $form->textArea($model,'skill',array('rows'=>10, 'cols'=>100)); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'peixun'); ?>
                <?php echo $form->textArea($model,'peixun',array('rows'=>10, 'cols'=>100)); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'hasoffer'); ?>
                <?php echo $form->radioButtonList($model,'hasoffer', array('1'=>'是','0'=>'否'),
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
            </div>


            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? '保存' : '保存'); ?>
            </div>

            <?php $this->endWidget(); ?>
            <br>


        </div>
    </div>
</section>

<script type="text/javascript">
    function submit(){
        $("#infoForm").submit();
    }
</script>