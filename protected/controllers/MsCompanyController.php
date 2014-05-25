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
				'actions'=>array('index','view','readJianli'),
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
        if(!Yii::app()->user->isGuest){ //只有企业用户才有权限查找人
            $id=Yii::app()->user->id;
            $member = Member::model()->findByPk($id);
            if($member->type == '2'){
                $params = array();
                $unitypes = MsDictionary::model()->findAllByAttributes(array('type'=>'unitype'));
                $degrees = MsDictionary::model()->findAllByAttributes(array('type'=>'degree'));
                $skills = MsDictionary::model()->findAllByAttributes(array('type'=>'skill'));

                $condition = "";
                if(isset($_POST['skillValue'])){
                    $params[] = $_POST['skillValue'];
                    if( $_POST['skillValue']!="skill_all"){
                        $skillName = "";
                        foreach($skills as $skill){
                            if($skill->code == $_POST['skillValue']){
                                $skillName = $skill->name;
                                break;
                            }
                        }
                        $condition = " and skill like '%".$skillName."%'";
                    }
                }else{
                    $params[] = "skill_all";
                }
                if(isset($_POST['universityValue'])){
                    $params[] = $_POST['universityValue'];
                    if( $_POST['universityValue']!="university_all"){
                        $condition = " and universitytype= '".$_POST['universityValue']."'";
                    }
                }else{
                    $params[] = "university_all";
                }
                if(isset($_POST['degreeValue'])){
                    $params[] = $_POST['degreeValue'];
                    if( $_POST['degreeValue']!="degree_all"){
                        $condition = " and degree = '".$_POST['degreeValue']."'";
                    }
                }else{
                    $params[] = "degree_all";
                }
                //职位信息
                $sql = "select * from ms_students where  realname!='' "
                    .$condition." order by createtime desc";
                $criteria=new CDbCriteria();
                $result = Yii::app()->db->createCommand($sql)->query();
                $pages=new CPagination($result->rowCount);
                $pages->pageSize=8;
                $pages->applyLimit($criteria);
                $result=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
                $result->bindValue(':offset', $pages->currentPage*$pages->pageSize);
                $result->bindValue(':limit', $pages->pageSize);
                $students=$result->query();

                $this->render('search',array('unitypes'=>$unitypes,'degrees'=>$degrees,
                    'skills'=>$skills,'students'=>$students,'pages'=>$pages,'params'=>$params));
            }else{
                $this->redirect(array('/site/index'));
            }
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
                $jobinfo['jianliid']=$jianli->jianli_id;
                $jobinfo['jobid']=$jianli->job_id;
                $jobinfo['title']=$job->title;
                $jobinfo['jianliid']=$jianli->jianli_id;
                $path = $jianliinfo->filepath;
                $pos = strripos($path,".");
                $path = "/".substr($path,0,$pos).'.pdf';
                $jobinfo['path']=$path;
                $jobinfo['jianliname']=$jianliinfo->name;
                $jobinfo['memberid']=$jianliinfo->userId;
                $member = Member::model()->findByPk($jianliinfo->userId);
                $jobinfo['userid']=$member->id;
                $jobinfo['username']=$member->username;
                $jobinfo['createtime']=$jianli->createtime;
                $jobinfos[]=$jobinfo;
            }
            /*获取12家公司信息*/
            $criteria = new CDbCriteria;
            $sql = "SELECT  ms_company.*  ,count(distinct  ms_company.id ) FROM ms_company  inner JOIN ms_jobs ON ms_jobs.company_id=ms_company.id  group by ms_company.id  Order by updatetime desc";
            $companys= Yii::app()->db->createCommand($sql)->queryAll();
            $pages = new CPagination(count($companys));
            $pages->pageSize = 12;
            $pages->applylimit($criteria);
            $pages->setCurrentPage(0);
            $companys=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
            $companys->bindValue(':offset', $pages->getCurrentPage(false)*$pages->pageSize);
            $companys->bindValue(':limit', $pages->pageSize);
            $companys=$companys->queryAll();
            $this->render('jianlis',array('jobinfos'=>$jobinfos,'companys'=>$companys));
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
        /*获取12家公司信息*/
        $criteria = new CDbCriteria;
        $sql = "SELECT  ms_company.*  ,count(distinct  ms_company.id ) FROM ms_company  inner JOIN ms_jobs ON ms_jobs.company_id=ms_company.id  group by ms_company.id  Order by updatetime desc";
        $company= Yii::app()->db->createCommand($sql)->queryAll();
        $pages = new CPagination(count($company));
        $pages->pageSize = 12;
        $pages->applylimit($criteria);
        $pages->setCurrentPage(0);
        $company=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
        $company->bindValue(':offset', $pages->getCurrentPage(false)*$pages->pageSize);
        $company->bindValue(':limit', $pages->pageSize);
        $company=$company->queryAll();
        $this->pageKeyword=array(
            'title'=>'修改密码-'.Helper::siteConfig()->site_name,
            'keywords'=>'修改密码-'.Helper::siteConfig()->site_name,
            'description'=>'修改密码-'.Helper::siteConfig()->site_name,
        );
        $this->render('changepwd',array('model'=>$model,'companys'=>$company));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        /*取公司发布的职位信息*/
        $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$id),array('order'=>'createtime desc'));
        $model = $this->loadModel($id);
        if($model->logo == null || $model->logo == ''){
            $model->logo = 'upload/companylogo/default.png';
        }
        //该职位是否投过简历
        $finish = '0';
        $temAll = array();
        foreach($jobs as $job){
            if(!Yii::app()->user->isGuest){ //查看该职位是否投过简历
                $app = MsApplication::model()->findByAttributes(array('member_id'=>Yii::app()->user->id,
                    'job_id'=>$job->id,'company_id'=>$id));
                if($app != null){
                    $finish = '1';
                }else{
                    $finish = '0';
                }
            }
            array_push($temAll,array("job"=>$job,"status"=>$finish));
        }
		$this->render('view',array(
			'model'=>$model,
            'jobs'=>$temAll
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
            $picPath = $picCreate->createPic('logo','upload/companylogo/' ,1024*1024,array('.jpg','.jpeg','.png','gif'));
            if($picPath == ""){
                $msg = "保存图片失败";
            }else{
                $model->status='2';//目前创建公司时默认已验证
                $member = MsMember::model()->findByPk(Yii::app()->user->id);
                $model->account = $member->username;//当前登录用户
                $model->createtime = date("Y-m-d H:i:s");
                $model->updatetime = date("Y-m-d H:i:s");
                $model->logo = $picPath;
                if($model->save()){
                    //同步更新权重表中的对应城市
                    $wm = new WeightManage();
                    $wm->createCompany($model);
                    $this->redirect(array('dashboard'));
                }
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
            $model = MsCompany::model()->findByAttributes(array('account'=>$member->email));
            if($model->logo == null || $model->logo == ''){
                $model->logo = 'upload/companylogo/default.png';
            }
            $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$model->id),
                array('order'=>'createtime desc'));
            $citys = MsDictionary::model()->findAllByAttributes(array('type'=>'city'));
            $this->render('dashboard',array(
                'model'=>$model,
                'jobs'=>$jobs,
                'citys'=>$citys
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
            if(isset($_POST['MsCompany'])) {
                $company->attributes=$_POST['MsCompany'];
            }
            if(isset($_POST['editorValue']) && $_POST['editorValue']!=null){
                $company->description = $_POST['editorValue'];
            }
            if(isset($_FILES['logo']) && $_FILES['logo']!=null){ //更新logo
                $old_path = $company->logo;
                //上传图片
                $picCreate = new PicCreate();
                $picPath = $picCreate->createPic('logo','upload/companylogo/'
                    ,1024*1024,array('.jpg','.jpeg','.png','gif'));
                if($picPath != ""){
                    $company->logo = $picPath;
                }
                try{
                    //删除之前的图片
                    if($old_path != null && $old_path!='') $picCreate->deletePic($old_path);
                }catch(Exception $e){

                }
            }
             $company->save(false);
            $company->description  = "";
            die(CJSON::encode($company));
//            $this->redirect(array('dashboard'));
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
//        $criteria = new CDbCriteria;
//        $criteria->select = 't.*';
//
//        $criteria->join = 'inner JOIN ms_jobs ON ms_jobs.company_id=t.id';
//        $criteria->order = 'updatetime desc';
//        $criteria->distinct = true;
//		$dataProvider=new CActiveDataProvider('MsCompany',array(
//                'criteria'=>$criteria,
//                'pagination' => array(
//                    'pageSize' => 8,
//                    'currentPage' => isset($_GET['page']) ? $_GET['page'] : 0
//                ),
//            )
//        );


        if (isset($_GET['ajax'])){
            $criteria = new CDbCriteria;
            $sql = "SELECT  ms_company.*  ,count(distinct  ms_company.id ) FROM ms_company  inner JOIN ms_jobs ON ms_jobs.company_id=ms_company.id  group by ms_company.id  Order by updatetime desc";
            $model= Yii::app()->db->createCommand($sql)->queryAll();
            $pages = new CPagination(count($model));
            $pages->pageSize = 12;
            $pages->applylimit($criteria);
            $pages->setCurrentPage($_GET['page']);
            /*注意此处必须设置getCurrentPage 参数为false，否则取出当前页不对*/
            if ( count($model) == $pages->getCurrentPage(false)*$pages->pageSize ) {
                die(CJSON::encode(array()));
            }
            $model=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
            $model->bindValue(':offset', $pages->getCurrentPage(false)*$pages->pageSize);
            $model->bindValue(':limit', $pages->pageSize);
            $model=$model->queryAll();

            $allData = array();
            foreach($model as $company){
                $criteriaJob = new CDbCriteria;
                $criteriaJob->order = 'createtime desc';
                $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$company['id']),$criteriaJob);
                array_push( $allData , array('company'=>$company,'jobs'=>$jobs));
            }
            die(CJSON::encode($allData));
        }else{
            $criteria = new CDbCriteria;
            $criteria->select = 't.*';
            $criteria->join = 'inner JOIN ms_jobs ON ms_jobs.company_id=t.id';
            $criteria->order = 'updatetime desc';
            $criteria->distinct = true;
            $dataProvider=new CActiveDataProvider('MsCompany',array(
                    'criteria'=>$criteria,
                    'pagination' => array(
                        'pageSize' => 12,
                    ),
                )
            );
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));
        }
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

    public function actionReadJianli($id){
        $model = MsJianli::model()->findByPk($id);
        if($model!=null){
            $path = $model->filepath;
            $pos = strripos($path,".");
            $path = "/".substr($path,0,$pos).'.pdf';
            $this->render("readJianli",array('path'=>$path));
        }
    }
}
