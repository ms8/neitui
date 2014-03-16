<?php

class MsCompanyController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dashboard','changepwd','jobCreate','jianlis','search'),
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

    public function actionSearch(){
        $id=Yii::app()->user->id;
        $member = Member::model()->findByPk($id);
        if($member->type == '2'){ //只有企业用户才有权限查找人
            $model=new MsStudents;
            $persons = array();
            $unitypes = MsDictionary::model()->findAllByAttributes(array('type'=>'unitype'));
            $jianglis = MsDictionary::model()->findAllByAttributes(array('type'=>'jiangli'));
            $degrees = MsDictionary::model()->findAllByAttributes(array('type'=>'degree'));
            foreach($unitypes as $unitype){ //对应的学校类型名称
                $uniarr[$unitype->code]=$unitype->name;
            }
            foreach($jianglis as $jiangli){ //对应的奖励类型名称
                $jiangliarr[$jiangli->code]=$jiangli->name;
            }
            foreach($degrees as $degree){ //对应的学历类型名称
                $degreearr[$degree->code]=$degree->name;
            }
            if(isset($_POST['MsStudents'])){
                $model->attributes=$_POST['MsStudents'];
                $params = array();
                $params['hasoffer']='0';
                if($model->sex != null){
                    $params['sex']=$model->sex;
                }
                if($model->sex != null){
                    $params['degree']=$model->degree;
                }
                if($model->sex != null){
                    $params['universitytype']=$model->universitytype;
                }
                $persons = $model->findAllByAttributes($params);

            }
            $this->render('search',array('uniarr'=>$uniarr,'jiangliarr'=>$jiangliarr,
                'degreearr'=>$degreearr,'model'=>$model,'persons'=>$persons));
        }else{
            $this->redirect(array('/site/index'));
        }
    }

    public function actionJianlis(){
        $mid = Yii::app()->user->id;
        $member = Member::model()->findByPk($mid);
        $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
        if($company != null){
            $jianlis = MsApplication::model()->findAllByAttributes(array('company_id'=>$company->id));
            $jobinfos=array();
            foreach($jianlis as $jianli){
                $job = MsJobs::model()->findByPk($jianli->job_id);
                $jianliinfo = MsJianli::model()->findByPk($jianli->jianli_id);
                $jobinfo=array();
                $jobinfo['jobid']=$jianli->job_id;
                $jobinfo['title']=$job->title;
                $jobinfo['jianliid']=$jianli->jianli_id;
                $jobinfo['jianliname']=$jianliinfo->name;
//                $jobinfo['memberid']=$jianli->member_id;
                $jobinfo['createtime']=$jianli->createtime;
                $jobinfos[]=$jobinfo;
            }
            $this->render('jianlis',array('jobinfos'=>$jobinfos));
        }
    }

    public function actionJobCreate()
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

    //修改密码
    public function actionChangepwd()
    {
        $model=Member::model()->find('id = '.Yii::app()->user->id);
        if(!empty($_POST['Member'])){
            //获取验证错误,需要制定验证字段
            $ajaxRes = CActiveForm::validate($model, array('oldpass','newpass','queren'),true,true);
            $ajaxResArr = CJSON::decode($ajaxRes);
            //验证结果为空入库
            if(empty($ajaxResArr)){

                $model->password = md5($model->newpass.$model->salt);

                if($model->save(false)){
                    $res = $model->attributes;
                    $res['status'] = 1;
                    die(CJSON::encode($res));
                }else{
                    die(CJSON::encode(array('status'=>0)));
                }
            }else{
                die($ajaxRes);
            }
        }
        $this->pageKeyword=array(
            'title'=>'修改密码-'.Helper::siteConfig()->site_name,
            'keywords'=>'修改密码-'.Helper::siteConfig()->site_name,
            'description'=>'修改密码-'.Helper::siteConfig()->site_name,
        );
        $this->render('changepwd',array('model'=>$model));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        /*取公司发布的职位信息*/
        $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'jobs'=>$jobs
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MsCompany;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MsCompany']))
		{
			$model->attributes=$_POST['MsCompany'];
            //上传图片
            $msg="";
            $picCreate = new PicCreate();
            $picPath = $picCreate->createPic('logo','upload/companylogo/'
                ,1024*1024,array('.jpg','.jpeg','.png','gif'));
            if($picPath == ""){
                $msg = "保存图片失败";
            }else{
                $model->status='1';//未验证
                $member = MsMember::model()->findByPk(Yii::app()->user->id);
                $model->account = $member->username;//当前登录用户
                $model->createtime = date("Y-m-d H:i:s");
                $model->updatetime = date("Y-m-d H:i:s");
                $model->logo = $picPath;
                if($model->save())
                    $this->redirect(array('dashboard'));
            }
//
//            if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    public function actionDashboard(){
        if(!Yii::app()->user->isGuest){
            $id = Yii::app()->user->id;
            $member = Member::model()->findByPk($id);
            $model = MsCompany::model()->findByAttributes(array('account'=>$member->username));
            $this->render('dashboard',array(
                'model'=>$model
            ));
        }else{
            //render 404页面
        }


    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 不能根据id来更新公司信息，防止直接敲url的方式篡改其他公司信息
	 */
	public function actionUpdate()
	{
        $account_id = Yii::app()->user->id;  //当前登录用户id
        $member = Member::model()->findByPk($account_id);
        if($member->type == '2'){ //企业用户才能修改信息
            $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
            if(isset($_POST['MsCompany'])){
                $company->attributes=$_POST['MsCompany'];
                if(isset($_FILES['logo']) && $_FILES['logo']!=null){ //更新logo
                    $old_path = $company->logo;
                    //上传图片
                    $picCreate = new PicCreate();
                    $picPath = $picCreate->createPic('logo','upload/companylogo/'
                        ,1024*1024,array('.jpg','.jpeg','.png','gif'));
                    if($picPath != ""){
                        $company->logo = $picPath;
                    }
                    //删除之前的图片
                    if(!$old_path == false) $picCreate->deletePic($old_path);
                }
                $company->save();
            }
            $this->redirect(array('dashboard'));
        }else{
            //303 没权限页面
        }
	}

    public function actionTagUpdate(){
        $account_id = Yii::app()->user->id;  //当前登录用户id
        $member = Member::model()->findByPk($account_id);
        if($member->type == '2'){ //企业用户才能修改信息
            $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
            if(isset($_POST['MsCompany'])){
                $company->attributes=$_POST['MsCompany'];
                $company->save();
            }
            $this->redirect(array('dashboard'));
        }else{
            //303 没权限页面
        }
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
        $criteria = new CDbCriteria;
		$dataProvider=new CActiveDataProvider('MsCompany',array(
                'criteria'=>$criteria,
                'pagination' => array(
                    'pageSize' => 8,
                ),
            )
        );
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MsCompany('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MsCompany']))
			$model->attributes=$_GET['MsCompany'];

		$this->render('admin',array(
			'model'=>$model,
		));
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
