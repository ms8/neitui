

    <div class="clearfix">
        <div class="content_l">
            <!-- 创建职位  -->
            <dl class="c_section">
                <dt>
                <h2><em></em>创建职位</h2>
                </dt>
                <dd>
                    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
                </dd>
            </dl>

        </div>
        <div class="content_r">
            <div>
                <ul>
                    <li><a href="<?php echo Yii::app()->baseUrl.'/mscompany/dashboard'?>">基本信息维护</a></li>
                    <li><a href="<?php echo Yii::app()->baseUrl.'/msjobs/create'?>">职位信息发布</a></li>
                    <li><a href="<?php echo Yii::app()->baseUrl.'/msjobs/create'?>">查看简历</a></li>
                </ul>
            </div>
        </div>
    </div>




