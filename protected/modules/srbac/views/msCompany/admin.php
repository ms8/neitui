<?php
/* @var $this MsCompanyController */
/* @var $model MsCompany */

?>

<table class="table">
        <tr>
            <td>名称</td>
            <td>Email</td>
            <td>主页</td>
            <td>积分</td>
            <td>创建时间</td>
            <td colspan="3">操作</td>
        </tr>

        <?php foreach($companys as $company){?>
            <tr>
                <td>
                    <a target="_blank" href="<?php echo Yii::app()->baseUrl.'/mscompany/view/'.$company['id'] ?>">
                        <?php echo $company['name']?>
                    </a>
                 </td>
                <td><?php echo $company['account']?></td>
                <td><?php echo $company['website']?></td>
                <td><?php echo $company['score']?></td>
                <td><?php echo $company['createtime']?></td>
                <td><a href="#" onclick="deleteCompany(<?php echo $company['id']?>)">删除</a></td>
                <td><a href="#" onclick="weightCompany(<?php echo $company['id']?>)">上首页</a></td>
            </tr>
        <?php }?>
</table>

<div class="text-center" >
    <?php
    //分页widget代码:
    $this->widget('CLinkPager',array('pages'=>$pages,'selectedPageCssClass'=>'active','hiddenPageCssClass'=>'disabled', 'htmlOptions'=>array('class'=>'pagination')));
    ?>
</div>

<script type="text/javascript">
    function deleteCompany(cid){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'cid':cid},
            url:'<?php echo Yii::app()->baseUrl.'/srbac/mscompany/delete'?>',
            success:function(data) {
                if(data == true){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
                window.location.reload();
            }
        });
    }

    function weightCompany(cid){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{'cid':cid},
            url:'<?php echo Yii::app()->baseUrl.'/srbac/mscompany/weight'?>',
            success:function(data) {
                if(data == true){
                    alert('设置成功');
                    //window.location.reload();
                }else{
                    alert('设置失败');
                }
            }
        });
    }
</script>