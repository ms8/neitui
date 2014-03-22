<?php

class MsJobsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/site';

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
				'actions'=>array('index','view','apply','jlUpload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','maintain'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionMaintain(){

        if(!Yii::app()->user->isGuest){
            $flag = '1';
            $user = Member::model()->findByPk(Yii::app()->user->id);
            $company = MsCompany::model()->findByAttributes(array('account'=>$user->username));
            if($company!=null && $company->status != '1'){
                $models=MsJobs::model()->findAllByAttributes(array('company_id'=>$company->id));
                $flag = '2';  //已验证
            }
            $this->render('maintain',array(
                'models'=>$models,'flag'=>$flag
            ));
        }
    }

    public function actionJlUpload(){
        if(Yii::app()->user->isGuest){
            echo '0';//还未登录
        }else{
            echo '1';//弹出对话框上传简历
        }
    }

    public function actionApply(){
        $jobid = $_POST['jobid'];
        if(Yii::app()->user->isGuest){
            echo '0';//还未登录
        }else{
            $memberid = Yii::app()->user->id;
            $member = Member::model()->findByPk($memberid);
            $jianlis = MsJianli::model()->findAllByAttributes(array('userId'=>$memberid));
            if($jianlis == null){
                echo '1';//还没有简历，弹出对话框上传简历
            }else{
                //查找默认简历
                $jianli = null;
                foreach($jianlis as $tmp){
                    if($tmp->flag == '1'){
                        $jianli = $tmp;
                        break;
                    }
                }
                if($jianli == null){
                    //没有默认简历，传递简历数组，让用户自己选择要投递的简历
                    $jls = array();
                    foreach($jianlis as $jltmp){
                        $jls[] = array('id'=>$jltmp->id,'name'=>$jltmp->name);
                    }
                    echo json_encode($jls);
                }else{ //直接投递默认简历
                    //查找该职位的信息
                    $job = MsJobs::model()->findByPk($jobid);
                    $application = new MsApplication();
                    $application->job_id = $jobid;
                    $application->company_id = $job->company_id;
                    $application->member_id = $memberid;
                    $application->jianli_id = $jianli->id;
                    $application->createtime = date("Y-m-d H:i:s");
                    $application->save();
                    echo '2';//投递成功
                }

            }
        }
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $job = $this->loadModel($id);
        $company = MsCompany::model()->findByPk($job->company_id);
        //该职位是否投过简历
        $finish = '0';
        if(!Yii::app()->user->isGuest){ //查看该职位是否投过简历
            $app = MsApplication::model()->findByAttributes(array('member_id'=>Yii::app()->user->id,
            'job_id'=>$id,'company_id'=>$job->company_id));
            if($app != null){
                $finish = '1';
            }
        }

//		$this->render('view',array(
//			'model'=>$job,
//            'company'=>$company,
//            'finish'=>$finish
//		));
        echo json_encode(array(
            'description'=>$job->description,
            'finish'=>$finish
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MsJobs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MsJobs']))
		{
			$model->attributes=$_POST['MsJobs'];
            $model->createtime = date("Y-m-d H:i:s");
            //取城市名称
            $city = MsDictionary::model()->findByAttributes(array('code'=>$model->citycode));
            $model->cityname = $city->name;
            $member = Member::model()->findByPk(Yii::app()->user->id);
            $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
            $model->company_id = $company->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MsJobs']))
		{
			$model->attributes=$_POST['MsJobs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MsJobs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MsJobs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MsJobs']))
			$model->attributes=$_GET['MsJobs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MsJobs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MsJobs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MsJobs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ms-jobs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
