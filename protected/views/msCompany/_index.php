<?php
if ($index%4===0 && $index !=0){
    echo "</div><div class='row items'>";
}
?>

<div class="col-sm-6 col-md-3 team-member-wrap">
    <div class="team-member">
        <div class="member-thumb row">
            <div class="col-md-6">
                <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>"><img alt="Member Image" class="img-responsive img-thumbnail" src="<?php echo Yii::app()->baseUrl.'/'.$data->logo?>"></a>
            </div>
            <div class="col-md-6">
                <h5 class="member-name"><?php echo CHtml::encode($data->name); ?></h5>
            </div>
        </div>
        <div class="member-details">
            <div class="member-content">
                <span class="position">【吸引力】 <?php echo CHtml::encode($data->tags); ?></span>
                <p>【公司介绍】 <?php echo CHtml::encode($data->description); ?></p>
                <p>【招聘职位】 <?php echo CHtml::encode($data->description); ?></p>
            </div>
            <p class="text-center"><a class="btn btn-flat flat-color" href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>">查看详情</a></p>
        </div>
    </div>

</div>