<?php
//if ($index%4===0 && $index !=0){
//    echo "</div><div class='row items'>";
//}
?>

<div class="col-sm-6 col-md-3 team-member-wrap">
    <div class="team-member">
        <div class="member-thumb row">
            <div class="col-sm-6 col-md-6">
                <a href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>">
                    <img alt="<?php echo CHtml::encode($data->name); ?>" class="img-responsive" src="<?php echo ($data->logo == null || $data->logo == '') ? (Yii::app()->baseUrl.'/'.'upload/companylogo/default.png') : (Yii::app()->baseUrl.'/'.$data->logo) ?>">
                </a>
            </div>
            <div class="col-sm-6 col-md-6">
                <h5 class="member-name"><?php echo CHtml::encode($data->name); ?></h5>
            </div>
        </div>
        <div class="member-details">
            <div class="member-content">
                <?php if($data->tags != null && $data->tags != ""){?>
                <span class="position">
                    <strong>【公司印象】</strong>
                    <?php echo CHtml::encode(Helper::truncate_utf8_string($data->tags,21));?>
                </span>
                <?php } ?>
<!--                <p>【公司介绍】 --><?php //echo CHtml::encode($data->description); ?><!--</p>-->
                <?php
                    $criteria = new CDbCriteria;
                    $criteria->order = 'createtime desc';
                    $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$data->id),$criteria);
                    $i = 0;
                    $time = null;
                    foreach($jobs as $job){
                        if($i ==0) {
                            $time = $job->createtime;
                            echo "<ul class='job-list'>";
                        };
                        if($i == 3){
                            echo  "</ul><div class='text-left' style='padding:0 0 2px 5px;'><i class='icon-hand-right'></i>&nbsp共".count($jobs)."个招聘职位</div>";
                            break;
                        }else{

                            echo "<li><a target='_blank' href='". Yii::app()->baseUrl.'/msjobs/view/'.$job->id ."'>".$job->title."</a></li>";
                            if(count($jobs) == ($i+1)) echo"</ul>";
                        }
                        $i++;
                    }
                    echo "<div class='text-left' style='padding:5px 0 0 4px;'><i class='icon-time'></i>&nbsp".$time."</div>";
                ?>
            </div>
            <p class="text-center"><a class="btn btn-flat flat-color" href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$data->id?>">查看详情</a></p>
        </div>
    </div>

</div>