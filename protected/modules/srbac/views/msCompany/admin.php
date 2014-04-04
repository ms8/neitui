<?php
/* @var $this MsCompanyController */
/* @var $model MsCompany */

$this->breadcrumbs=array(
	'Ms Companies'=>array('index'),
	'Manage',
);

//$this->menu=array(
//	array('label'=>'List MsCompany', 'url'=>array('index')),
//	array('label'=>'Create MsCompany', 'url'=>array('create')),
//);
?>

<table class="table">
        <tr>
            <td>ID</td>
            <td>名称</td>
            <td>主页</td>
            <td>Email</td>
            <td>地址</td>
            <td colspan="3">操作</td>
        </tr>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_index',
    "itemsCssClass"=>"row items",
    'template'=>'<div class="list">{items}</div>{pager}',
    'pager'=>array(
        'class'=>'CLinkPager',
        'cssFile'=>"pagination",
        'htmlOptions'=>array('class'=>'pagination'),
        'selectedPageCssClass'=>'active',
        'hiddenPageCssClass'=>'disabled',
    ),
)); ?>

</table>

<?php
//$this->widget('zii.widgets.grid.CGridView', array(
//	'id'=>'ms-company-grid',
//	'dataProvider'=>$model->search(),
//	'filter'=>$model,
//	'columns'=>array(
//		'id',
//		'name',
//		'website',
//		'email',
//		'address',
//		'account',
//		array(
//			'class'=>'CButtonColumn',
//		),
//	),
//));
?>

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
                //alert();
                window.location.reload();
            }
        });
    }
</script>