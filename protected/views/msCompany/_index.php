<?php
if ($index%4===0 && $index !=0){
    echo "</div><div class='row items'>";
}
?>

<div class="col-sm-6 col-md-3 team-member-wrap">
    <div class="team-member">
        <div class="member-thumb row">
            <div class="col-md-6">
                <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>"><img alt="Member Image" class="img-responsive" src="<?php echo Yii::app()->baseUrl.'/'.$data->logo?>"></a>
            </div>
            <div class="col-md-6">
                <h5 class="member-name"><?php echo CHtml::encode($data->name); ?></h5>
            </div>
        </div>
        <div class="member-details">
            <div class="member-content">
                <span class="position">
                    <strong>【公司印象】</strong>
                    <?php echo CHtml::encode(Helper::truncate_utf8_string($data->tags,21));?>
                </span>
<!--                <p>【公司介绍】 --><?php //echo CHtml::encode($data->description); ?><!--</p>-->
                <?php
                    $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$data->id));
                    $i = 0;
                    foreach($jobs as $job){
                        if($i ==0) echo "<ul>";
                        if($i == 4){
                            echo  "</ul><div class='text-left' style='padding-left:5px;'><strong><i class='icon-hand-right'></i>&nbsp共".count($jobs)."个招聘职位</strong></div>";
                            break;
                        }else{
                            echo "<li>".$job->title;"</li>";
                            if(count($jobs) == ($i+1)) echo"</ul>";
                        }
                        $i++;
                    }
                ?>
            </div>
            <p class="text-center"><a class="btn btn-flat flat-color" href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>">查看详情</a></p>
        </div>
    </div>

</div>