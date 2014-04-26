<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'umeditor/css/umeditor.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.config.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/umeditor.min.js', CClientScript::POS_BEGIN);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'umeditor/zh-cn.js', CClientScript::POS_BEGIN);
?>
<section class="pad-25" id="action-box">
    <div class="container">

    <?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'baseForm',
        'enableAjaxValidation'=>false,
        'action'=>Yii::app()->createUrl("/kongjian/information"),
        'htmlOptions'=>array('class'=>'form-horizontal')
    ));
    ?>
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="media">
                        <a class="pull-left intro-image" href="#">
                            <img  alt="<?php echo $model->realname?>"
                                 src="<?php echo Yii::app()->baseUrl.'/'.$model->image?>" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $model->realname?></h4>
                            <div id="intro-info" class="c_intro">
                                <div class="intro-des">
                                    <p>
                                        <?php if($model->description==null || $model->description==""){?>
                                            请填写您的个人描述，例如您的优点和缺点，您的研究方向和成果，
                                            <br>在校期间所获的奖励，在校期间所担任的职务和在该职务上的贡献，
                                            <br>您的兴趣爱好等信息。便于企业更全面的了解您。
                                        <?php }else{echo $model->description;}?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper widget">
                    <div class="subpage-title noline">
                        <h5>项目经历</h5>
                    </div>
                    <div class="text-right absolute-right-20">
                        <a id="project-update" class="icon-operate" href="javascript:;"><i class="icon-edit"></i></a>
                    </div>
                    <div class="project-show c-detail">
                        <?php echo $model->projects?>
                    </div>
                    <div class="modal fade" id="project-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">编辑项目经历</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="project-form" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <script type='text/plain' id='project_description'><?php echo $model->projects?></script>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="project-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                    <button type="button"  id="project-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                </div>
                <div class="post-wrapper widget pad-bottom-25">
                    <div class="subpage-title noline">
                        <h5>培训经历</h5>
                    </div>
                    <div class="text-right absolute-right-20">
                        <a id="peixun-update" class="icon-operate" href="javascript:;"><i class="icon-edit"></i></a>
                    </div>
                    <div class="peixun-show c-detail">
                        <?php echo $model->peixun?>
                    </div>
                    <div class="modal fade" id="peixun-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">编辑培训经历</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="project-form" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <script type='text/plain' id='peixun_description'><?php echo $model->peixun?></script>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="peixun-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                    <button type="button"  id="peixun-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>基本信息</h5>
                    </div>
                    <div class="text-right absolute-right-20">
                        <a href="javascript:;" class="icon-operate"  id="info-update" ><i class="icon-edit"></i></a>
                    </div>
                    <div id="info-show" class="c_detail">
                        <form class="form-horizontal"  role="form">
                            <div class="form-group">
                                <label  class="col-sm-5">姓名：</label>
                                <div class="col-sm-7">
                                    <span class="info-realname"><?php echo $model->realname?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">手机号：</label>
                                <div class="col-sm-7">
                                    <span class="info-phone">
                                        <?php echo $model->phone?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">性别：</label>
                                <div class="col-sm-7">
                                    <span class="info-sex">
                                        <?php  if($model->sex != null){echo $model->sex == 1 ? '男':'女';} ?>
                                     </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">技能特长：</label>
                                <div class="col-sm-7">
                                    <span class="info-skill">
                                          <?php echo $model->skill?>
                                     </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="info-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">编辑基本信息</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="info-form" role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'realname',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model,'realname',array('size'=>50,'maxlength'=>50,
                                                    'class'=>'form-control')); ?>
                                                <?php echo $form->error($model,'realname'); ?>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-sm-2 control-label">头像：</label>
                                            <div class="col-sm-6">
                                                <input type="file" size="60" maxlength="100" name="image" value=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,
                                                    'class'=>'form-control')); ?>
                                                <?php echo $form->error($model,'phone'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'sex',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-6 radioTag">
                                                <?php echo $form->radioButtonList($model,'sex', array('1'=>'男','0'=>'女'),
                                                    array('separator'=>'&nbsp;',
                                                        'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="MsStudents[skill]" class="col-sm-2 control-label">技能特长：</label>
                                            <div class="col-sm-8">
                                                <?php echo $form->textArea($model,'skill',array('placeholder'=>'填写技能特长，便于企业更快找到您。例如可以填写"精通C,C++,Java语音，精通Android开发"等',
                                                    'rows'=>4, 'cols'=>70,'class'=>'form-control')); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">个人描述：</label>
                                            <div class="col-sm-8">
                                                <script type="text/plain" id="info_description"><?php echo $model->description?></script>
                                            </div>
                                        </div>

<!--                                        <div class="form-group">-->
<!--                                            <label class="col-sm-2 control-label">找到工作？</label>-->
<!--                                            <div class="col-sm-6 radioTag">-->
<!--                                                --><?php //echo $form->radioButtonList($model,'hasoffer', array('1'=>'是','0'=>'否'),
//                                                    array('separator'=>'&nbsp;',
//                                                        'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
<!--                                            </div>-->
<!--                                        </div>-->
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="info-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                    <button type="button"  id="info-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->

                    </div>
                </div>
                <div class="widget">
                    <div class="subpage-title noline">
                        <h5>学校信息</h5>
                    </div>
                    <div class="text-right absolute-right-20">
                        <a href="javascript:;" class="icon-operate"  id="college-update" ><i class="icon-edit"></i></a>
                    </div>
                    <div class="c_detail">
                        <form class="form-horizontal" id="college-show" role="form">
                            <div class="form-group">
                                <label  class="col-sm-5">学校类型：</label>
                                <div class="col-sm-7">
                                    <span class="college-type">
                                        <?php echo $model->universitytypename;?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">学校名称：</label>
                                <div class="col-sm-7">
                                    <span class="college-name">
                                        <?php echo $model->universityname?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-5">学历：</label>
                                <div class="col-sm-7">
                                    <span class="college-degree">
                                        <?php  echo $model->degreename; ?>
                                     </span>
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label  class="col-sm-5">获得奖励：</label>-->
<!--                                <div class="col-sm-7">-->
<!--                                    <span class="college-jiangli">-->
<!--                                          --><?php //echo $model->jiangliname?>
<!--                                     </span>-->
<!--                                </div>-->
<!--                            </div>-->
                        </form>
                    </div>
                    <div class="modal fade" id="college-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:750px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" >编辑学校信息</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" id="college-form" role="form">
                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'universitytype',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10 radioTag" >
                                                <?php echo $form->radioButtonList($model,'universitytype',$uniarr,
                                                    array('separator'=>'&nbsp;',
                                                        'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'universityname',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model,'universityname',array('size'=>50,'maxlength'=>50,
                                                    'class'=>'form-control')); ?>
                                                <?php echo $form->error($model,'universityname'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo $form->labelEx($model,'degree',array('class'=>'col-sm-2 control-label')); ?>
                                            <div class="col-sm-10 radioTag">
                                                <?php echo $form->radioButtonList($model,'degree',$degreearr,
                                                    array('separator'=>'&nbsp;',
                                                        'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
                                            </div>
                                        </div>

<!--                                        <div class="form-group">-->
<!--                                            --><?php //echo $form->labelEx($model,'jianglitype',array('class'=>'col-sm-2 control-label')); ?>
<!--                                            <div class="col-sm-10 radioTag">-->
<!--                                                --><?php //echo $form->radioButtonList($model,'jianglitype',$jiangliarr,
//                                                    array('separator'=>'&nbsp;',
//                                                        'labelOptions'=>array('class'=>'btn btn-flat flat-success btn-bordered myLabel')) )?>
<!--                                            </div>-->
<!--                                        </div>-->

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="college-cancel" class="btn btn-flat flat-success btn-bordered btn-rounded" data-dismiss="modal">取消</button>
                                    <button type="button"  id="college-save" class="btn btn-flat flat-success btn-bordered btn-rounded">保存</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->

                    </div>
            </div>
        </div>
    </div>


        <?php $this->endWidget(); ?>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        //菜单选中个人中心
        $("#header .nav li.active").removeClass("active");
        $("#header .nav li:eq(2)").addClass("active");

        //编辑基本信息

        UM.getEditor('info_description',{
            toolbar:[
                'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                '| justifyleft justifycenter justifyright justifyjustify |'
            ]
            ,initialFrameWidth:"100%" //初始化编辑器宽度,默认500
            ,initialFrameHeight:200  //初始化编辑器高度,默认500
        });
        $("#info-update").click(function(){
            $("#info-edit").modal("show");
        })
        $("#info-save").click(function(){
            var tempHtml = $("#info_description").html();
            $("#info-form").ajaxSubmit({
                url:"<?php echo Yii::app()->baseUrl.'/kongjian/informationSave' ?>",
                dataType:"html",
                type:"post",
//                data:[{name:"MsStudents[description]",value:tempHtml}],
                success:function(data){
                    data = JSON.parse(data);
                    $(".intro-image img").attr("src","<?php echo Yii::app()->baseUrl.'/'?>"+data.model.image);
                    $("#intro-info .intro-des").html(tempHtml);
                    $(".media-heading").html(data.model.realname);
                    $("#info-show .info-realname").html(data.model.realname);
                    $("#info-show .info-phone").html(data.model.phone);
                    $("#info-show .info-sex").html(data.model.sex == 1 ? "男":"女");
                    $("#info-show .info-skill").html(data.model.skill);
                    $("#info-show .info-hasoffer").html(data.model.hasoffer == 1 ? "是":"否");
                    $("#info-edit").modal("hide");
                }
            });
        })

        //编辑学校信息
        $("#college-update").click(function(){
            $("#college-edit").modal("show");
        })

        $("#college-save").click(function(){
            $.ajax({
                url:"<?php echo Yii::app()->baseUrl.'/kongjian/informationSave' ?>",
                dataType:"json",
                type:"post",
                data:$("#college-form").formSerialize(),
                success:function(data){
                    $("#college-show .college-type").html(data.model.universitytypename);
                    $("#college-show .college-name").html(data.model.universityname);
                    $("#college-show .college-degree").html(data.model.degreename);
                    $("#college-show .college-jiangli").html(data.model.jiangliname);
                    $("#college-edit").modal("hide");
                }
            });
        })

        //编辑项目经历
        UM.getEditor('project_description',{
            toolbar:[
                'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                '| justifyleft justifycenter justifyright justifyjustify |'
            ]
            ,initialFrameWidth:600 //初始化编辑器宽度,默认500
            ,initialFrameHeight:200  //初始化编辑器高度,默认500
        });
        $("#project-update").click(function(){
            $("#project-edit").modal("show");
        })

        $("#project-save").click(function(){
            var tempHtml = $("#project_description").html();
            $.ajax({
                url:"<?php echo Yii::app()->baseUrl.'/kongjian/informationSave' ?>",
                dataType:"json",
                type:"post",
                data:{MsStudents:{"projects":tempHtml}},
                success:function(data){
                    $(".project-show").html(tempHtml);
                    $("#project-edit").modal("hide");
                }
            });
        })

        //编辑项目经历
        UM.getEditor('peixun_description',{
            toolbar:[
                'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                '| justifyleft justifycenter justifyright justifyjustify |'
            ]
            ,initialFrameWidth:600 //初始化编辑器宽度,默认500
            ,initialFrameHeight:200  //初始化编辑器高度,默认500
        });
        $("#peixun-update").click(function(){
            $("#peixun-edit").modal("show");
        })

        $("#peixun-save").click(function(){
            var tempHtml = $("#peixun_description").html();
            $.ajax({
                url:"<?php echo Yii::app()->baseUrl.'/kongjian/informationSave' ?>",
                dataType:"json",
                type:"post",
                data:{MsStudents:{"peixun":tempHtml}},
                success:function(data){
                    $(".peixun-show").html(tempHtml);
                    $("#peixun-edit").modal("hide");
                }
            });
        })

        $('.portfolio-filter a').click(function () {
            $("#infoType  li.active").removeClass("active");
            $(this).parent().attr("class",'active');
            var selector = $(this).attr('data-filter');
            $("#base").hide();
            $("#school").hide();
            $("#projects").hide();
            $("#"+selector).show();
            return false;
        });

    })
    function submit(){
        $("#infoForm").submit();
    }

</script>