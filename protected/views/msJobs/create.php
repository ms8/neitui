<div class="mian-content-inner">
    <?php $this->renderPartial('_tab',array('index'=>'jobCreate')); ?>

    <div class="col-md-6" style="margin-top:40px;width:52%">
        <div class="panel panel-default">
            <div class="panel-heading">创建职位</div>
            <div class="panel-body fade in">
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
        </div>
    </div>
</div>





