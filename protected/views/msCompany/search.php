
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
                <p>姓名：<?php echo $person->realname?></p>
                <p>联系方式：<?php echo $person->phone?></p>
                <p>邮箱：<?php echo $person->username?></p>
                <p>学历：<?php echo $person->degreename?></p>
                <p>毕业学校：<?php echo $person->universityname?></p>
                <p>所获奖励：<?php echo $person->jiangliname?></p>
                <p>技能：<?php echo $person->skill?></p>
                <p>项目经历：<?php echo $person->projects?></p>
                <p>培训经历：<?php echo $person->peixun?></p>
            </div>
        <?php } ?>
    </div>
</section>