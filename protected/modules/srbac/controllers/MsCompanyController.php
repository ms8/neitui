<?php

class MsCompanyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='application.modules.srbac.views.layouts.admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','readJianli','admin','delete','weight'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
        $result = false;
        if(isset($_POST['cid']) && Yii::app()->user->isGuest){ //管理员用户在另外一张表中
            if(isset($_SESSION['admin_user'])){
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $id = $_POST['cid'];
                    $model = $this->loadModel($id);
                    //备份到black_name表
                    $black = new KrzBlackname();
                    $black->name = $model->name;
                    $black->website = $model->website;
                    $black->email = $model->email;
                    $black->address = $model->address;
                    $black->account = $model->account;
                    $black->telephone = $model->telephone;
                    $black->status = $model->status;
                    $black->tags = $model->tags;
                    $black->logo = $model->logo;
                    $black->description = $model->description;
                    $black->createtime = $model->createtime;
                    $black->updatetime = $model->updatetime;
                    $result = $black->save();
                    //从原表中删除
                    $model->delete();
                    //删除Job表中相关数据
                    MsJobs::model()->deleteAllByAttributes(array('company_id'=>$model->id));
                    //从权重表weight中删除
                    KrzWeight::model()->deleteAllByAttributes(array('cid'=>$model->id));
                    $transaction->commit(); //提交事务会真正的执行数据库操作
                } catch (Exception $e) {
                    $result = false;
                    $transaction->rollback(); //如果操作失败, 数据回滚
                }
            }
        }
        die(CJSON::encode($result));
	}

    /*上首页*/
    public function actionWeight(){
        $result = false;
        if(isset($_POST['cid']) && Yii::app()->user->isGuest){//管理员用户在另外一张表中
            if(isset($_SESSION['admin_user'])){
                //查看是否存在该公司，存在则update
                $weight = KrzWeight::model()->findByAttributes(array('cid'=>$_POST['cid']));
                if($weight != null){
                    if(intval($weight->weight)  != 1){ //更新
                        $weight->updateByPk($weight->id,array('weight'=>1,
                            'updatetime'=>date("Y-m-d H:i:s")));
                    }else{
                        $result = true;
                    }
                }else{ //新建
                    $weight = new KrzWeight();
                    $company = MsCompany::model()->findByPk($_POST['cid']);
                    //查询所有的职位城市
                    $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$_POST['cid']));
                    $citycodes = ';';
                    foreach($jobs as $job){
                        $citycodes=$citycodes.$job->citycode.';';
                    }
                    if(strlen($citycodes) > 0){
                        $citycodes = substr($citycodes,0,strlen($citycodes)-1);
                    }
                    $weight->cid=$_POST['cid'];
                    $weight->cname=$company->name;
                    $weight->weight = 1;
                    $weight->citycode=$citycodes;
                    $weight->createtime = date("Y-m-d H:i:s");
                    $weight->updatetime = date("Y-m-d H:i:s");
                    $result = $weight->save(false);
                }
            }
        }
        die(CJSON::encode($result));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $sql = "select c.id,c.name,c.account,c.website,c.createtime,m.score "
            ." from ms_member m, ms_company c where m.email = c.account order by c.createtime desc";
        $criteria=new CDbCriteria();
        $result = Yii::app()->db->createCommand($sql)->query();
        $pages=new CPagination($result->rowCount);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $result=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
        $result->bindValue(':offset', $pages->currentPage*$pages->pageSize);
        $result->bindValue(':limit', $pages->pageSize);
        $companys=$result->query();

        $this->render('admin',array(
            'companys'=>$companys,
            'pages'=>$pages,
        ));
//        $criteria = new CDbCriteria;
//        $criteria->order = "createtime desc";
//        $dataProvider=new CActiveDataProvider('MsCompany',array(
//                'criteria'=>$criteria,
//                'pagination' => array(
//                    'pageSize' => 10,
//                ),
//            )
//        );
//        $this->render('admin',array(
//            'dataProvider'=>$dataProvider,
//        ));
//        $companys = MsCompany::model()->findAll(array('order'=>'createtime desc'));
//		$this->render('admin',array(
//			'companys'=>$companys,
//		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MsCompany the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MsCompany::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MsCompany $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ms-company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
