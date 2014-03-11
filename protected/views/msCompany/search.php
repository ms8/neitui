
<section class="pad-25" id="action-box">
    <div class="container">
        <div class="action-box">

            <?php
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'search-form',
                'enableAjaxValidation'=>false,
                'action'=>Yii::app()->createUrl("/mscompany/search")
            ));
            ?>
            <div class="row">
                <?php echo $form->labelEx($model,'universitytype'); ?>
                <?php echo $form->radioButtonList($model,'universitytype',$uniarr,
                    array('separator'=>'&nbsp;','labelOptions'=>array('class'=>'radiolabel')) )?>
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

            <div class="row buttons">
                <button type="submit" name="search">搜索</button>
            </div>

            <?php $this->endWidget(); ?>
    </div>
</section>

<section class="pad-25" id="action-box">
    <div class="container">
        <?php foreach($persons as $person){?>
            <div class="action-box">
                <p><?php echo $person->username?></p>
                <p><?php echo $person->degreename?></p>
                <p><?php echo $person->universityname?></p>
                <p><?php echo $person->skill?></p>
                <p><?php echo $person->projects?></p>
                <p><?php echo $person->peixun?></p>
            </div>
        <?php } ?>
    </div>
</section>