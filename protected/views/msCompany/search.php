<div class="container">
    <div class="row">
        <div class="col-md-9">
            <section class="pad-top-25">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>人才搜索</h5>
                    </div>
                    <div class="job_search pad-top-5">
                        <form id="searchForm" method="post" name="searchForm" action="<?php echo Yii::app()->createUrl('/mscompany/search')?>">
                        <dl class="dl-horizontal">
                            <input type="hidden" name="skillValue" id="skill" value="skill_all"/>
                            <dt>技能</dt>
                            <dd>
                                <a name="skill_all"  type="skill" href="#" onclick="searchGo('skill','skill_all')">全部</a>
                                <?php
                                foreach($skills as $skill){
                                    ?>
                                    <a name="<?php echo $skill->code?>" type="skill" href="#"
                                       onclick="searchGo('skill','<?php echo $skill->code?>')">
                                        <?php echo $skill->name?>
                                    </a>
                                <?php }?>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <input type="hidden" name="universityValue" id="university" value="university_all"/>
                            <dt>学校</dt>
                            <dd>
                                <a name="university_all" type="university"  href="#" onclick="searchGo('university','university_all')">全部</a>
                                <?php
                                foreach($unitypes as $university){
                                    ?>
                                    <a name="<?php echo $university->code?>" type="university" href="#"
                                       onclick="searchGo('university','<?php echo $university->code?>')">
                                        <?php echo $university->name?>
                                    </a>
                                <?php }?>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <input type="hidden" name="degreeValue" id="degree" value="degree_all"/>
                            <dt>学历</dt>
                            <dd>
                                <a name="degree_all" type="degree" href="#" onclick="searchGo('degree','degree_all')">全部</a>
                                <?php
                                foreach($degrees as $degree){
                                    ?>
                                    <a name="<?php echo $degree->code?>" type="degree" href="#"
                                       onclick="searchGo('degree','<?php echo $degree->code?>')">
                                        <?php echo $degree->name?>
                                    </a>
                                <?php }?>
                            </dd>
                        </dl>
                        </form>
                    </div>
                    <div>
                        <?php if ($students->count() != 0) {  ?>
                            <table class="table jobs">
                                <thead>
                                <tr>
                                    <th style="width: 10%"></th>
                                    <th style="width: 15%"></th>
                                    <th style="width: 10%"></th>
                                    <th style="width: 25%"></th>
                                    <th style="width: 30%"></th>
                                    <th style="width: 10%"></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php  foreach($students as $student) { ?>
                                    <tr>
                                        <td rowspan="2" style="height: 64px;width: 64px;">
                                            <img  src="<?php echo Yii::app()->baseUrl."/".$student['image']?>" alt="<?php echo $student['realname'];?>">
                                        </td>
                                        <td>
                                            <p>
                                                <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/kongjian/information/'.$student['mid'] ?>"><?php echo $student['realname'];?></a>
                                            </p>
                                        </td>
                                        <td>
                                            <?php echo $student['degreename'];?>
                                        </td>
                                        <td>[学校类型]
                                            <?php echo $student['universitytypename'];?>
                                        </td>
                                        <td>[专业]
                                            <?php echo $student['major'];?>
                                        </td>
                                        <td>
                                            <?php  if($student['sex']=='0') {
                                                echo '女';
                                            }else{
                                                echo '男';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <p>[技能]
                                                <?php  echo CHtml::encode(Helper::truncate_utf8_string($student['skill'],75)); ?>
                                            </p>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        <?php }else {
                            echo "<div class='text-center empty-content'>抱歉，暂时没有此类信息！</div>";}
                        ?>
                    </div>
                    <div class="text-center" >
                        <?php
                        //分页widget代码:
                        $this->widget('CLinkPager',array('pages'=>$pages,'selectedPageCssClass'=>'active','hiddenPageCssClass'=>'disabled', 'htmlOptions'=>array('class'=>'pagination')));
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="pad-top-25">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>关注我们</h5>
                    </div>
                    <ul class="social-links">
                        <li class="weixin"><img  src="<?php echo Yii::app()->baseUrl.CSS_PATH.'images/erweima.jpg'?>" alt="快入职微信号"/></li>
                        <li class="weibo">
                            <img  src="<?php echo Yii::app()->baseUrl.CSS_PATH.'images/weibo.png'?>" alt="快入职微博号"/>
                            <wb:follow-button uid="5099334861" type="red_2" width="130" height="24" ></wb:follow-button>
                        </li>
                    </ul>
                </div>
            </section>
<!--            <section class="pad-top-5">-->
<!--                <div class="widget">-->
<!--                    <div class="subpage-title noline">-->
<!--                        <h5>热门企业</h5>-->
<!--                    </div>-->
<!--                    <div class="company-show">-->
<!--                        <ul class="flickr-photos-list">-->
<!--                            --><?php //foreach($companys as $company){?>
<!--                                <li>-->
<!--                                    <a href="--><?php //echo Yii::app()->baseUrl.'/mscompany/view/'.$company['company']->id?><!--">-->
<!--                                        <img  alt="--><?php //echo $company['company']->name?><!--" src="--><?php //echo Yii::app()->baseUrl.'/'.$company['company']->logo?><!--" />-->
<!--                                        <div class="des"><strong>--><?php //echo $company['company']->name?><!--</strong></div>-->
<!--                                    </a>-->
<!---->
<!--                                </li>-->
<!--                            --><?php //}?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->
        </div>
    </div>
</div>

<!-- 弹出对话框上传简历-->
<div id="uploadDiv" style="display: none;width: 600px;height: 280px;background-color#f39c12;padding: 10px;position: absolute;top: 150px;left: 330px">
    <div style="height: 40px;background-color: #088b69">
        <div style="float: left">上传简历并投递该职位</div>
        <div style="float: right;font-size: 20px;cursor: pointer;margin-right: 20px;" id="upload-close">X</div>
    </div>

    <div style="height: 220px;background-color: #71bd90;padding-top:50px">
        <form id="uploadForm" class="login" method="post" enctype="multipart/form-data"
              action="<?php echo Yii::app()->baseUrl.'/kongjian/jianli'?>">
            <label for="inputPassword3" class="col-sm-1 control-label">简历:</label>
            <div class="col-sm-6">
                <input type="file" name="jianlifile" class=" class="form-control">
            </div>
            <button id="jianliSubmit" class="btn btn-danger"  type="submit">上传简历</button>
            <div style="clear:both"></div>
            <div class="col-sm-5">
                投递其他职位时默认使用该简历：<br>
                <input type="radio" value="1" name="flag" checked>是 &nbsp;&nbsp;&nbsp;
                <input type="radio" value="0" name="flag" >否
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    function searchGo2(param){
        var searchStr = location.search;
        if(searchStr.indexOf(param) == -1)
            searchStr =  searchStr+"&"+param;
        searchStr = searchStr.substr(1);

        window.location.href="<?php echo Yii::app()->createUrl('mscompany/search')?>"+"?"+searchStr;
    }

    function searchGo(id,param){
        $("#"+id).val(param);
        $("#searchForm").submit();
    }

    function submitjl(){
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'<?php echo Yii::app()->createUrl('msjobs/jlUpload')?>',
            success:function(data) {
                if(data == '0'){//未登录，弹出登录框
                    $("#loginDiv").show();
                }else if(data == '1'){//没有简历，弹出对话框上传简历
                    $("#uploadDiv").show();
                }
            }
        });
    };
    $(document).ready(function() {
        var type ="";
        <?php foreach($params as $param){?>
            $("a[name=<?php echo $param?>]").addClass("active");
            type = $("a[name=<?php echo $param?>]").attr('type');
            $("#"+type).val('<?php echo $param?>');
        <?php }?>

    });
</script>