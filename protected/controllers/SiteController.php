<?php

class SiteController extends Controller
{
	public $layout='site';

	public function init(){
//		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'common.css');
	}
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex(){
        if(!Yii::app()->user->isGuest){
            $id = Yii::app()->user->id;
            $member = Member::model()->findByPk($id);
            if($member->type == '1'){ //应聘者
                $this->redirect(array('/kongjian/jianli/'.$id));
            }else{ //企业
                $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
                if($company == null){ //还未完善公司信息，跳转到创建公司信息页面
                    $this->redirect(array('/mscompany/create'));
                }else{
                    $this->redirect(array('/mscompany/dashboard/'));
                }
            }
        }else{
            $this->render('index');
        }

	}

	public function actionDown(){

		if(Yii::app()->user->isGuest){
			header("Content-type: text/html; charset=utf-8");
			echo "<script>alert('请注册并登录后下载，谢谢支持!');window.location.href=".Yii::app()->baseUrl."'/public/register';</script>";
			exit;
		}

		$file_dir= $_SERVER['DOCUMENT_ROOT'].'/anzhuangbao/';
		$file_name="ebenchu.zip";
		if (!file_exists($file_dir.$file_name)) { //检查文件是否存在
			echo "no file!";
			exit;
		}else{
			echo 1;
			$file = fopen($file_dir . $file_name,"r"); // 打开文件 
			Header("Content-type: application/octet-stream"); 
			Header("Accept-Ranges: bytes"); 
			Header("Accept-Length: ".filesize($file_dir . $file_name)); 
			Header("Content-Disposition: attachment; filename=" . $file_name); // 输出文件内容 
			echo fread($file,filesize($file_dir . $file_name)); 
			fclose($file);
			exit;
		}
	}

	public function actionTest(){
		Helper::SendEmail('25461865@qq.com','测试邮件','测试邮件内容');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionLogin(){
        $model=new LoginForm;

        if(!empty($_POST['LoginForm'])){

            //赋值给模型
            $model->attributes=$_POST['LoginForm'];
            //获取验证错误
            $ajaxRes = CActiveForm::validate($model, array('username','password'));
            $ajaxResArr = CJSON::decode($ajaxRes);
            //验证结果为空入库
            if(empty($ajaxResArr)){
                if($model->validate() && $model->login()){
//                    scoreAction::setScore(Yii::app()->user->id,'denglu','add',false);//登陆加积分
                    die(CJSON::encode(array('status'=>1)));
//                    $this->render('index');
                }else{
                    die(CJSON::encode(array('status'=>0)));
                }
            }else{
                die($ajaxRes);
            }
        }

        $this->render('login',array('model'=>$model));
//        $this->render('login');
    }

    //注册
    public function actionRegister(){

        $this->pageKeyword['title'] = Helper::siteConfig()->site_name.'-注册';
        $this->pageKeyword['keywords'] = Helper::siteConfig()->site_name.'-注册';
        $this->pageKeyword['description'] = Helper::siteConfig()->site_name.'-注册';

        //实例化用户模型
        $memberModel=new Member();
        if(!empty($_POST['Member'])){
            //赋值给模型
            $memberModel->attributes=$_POST['Member'];
            $input_password = $memberModel->password;
            $memberModel->nickname = $memberModel->username;
            $memberModel->email = $memberModel->username;
            //验证
            $ajaxRes 	= 	CActiveForm::validate($memberModel, array('username','nickname','password','passwordrepeat','verifyCode'));
            $ajaxResArr = 	CJSON::decode($ajaxRes);
            //验证结果
            if(empty($ajaxResArr)){

                $score=Score::model()->find('id=1');

                $memberModel->salt=Helper::randomCode();//加盐值
                $memberModel->password=$memberModel->hashPassword();//密码
                $memberModel->create_time=time();//创建时间
                $memberModel->update_time=time();//更新时间
                $memberModel->status=1;//状态
                $memberModel->role_id=1;//状态
                $memberModel->photo=rand(1,95).'.jpg';//头像
                $memberModel->last_login_time=time();//登陆时间
                $memberModel->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
                $memberModel->score=$score->zhuce;//注册积分
                $memberModel->bind_account = '';
//                $memberModel->email = '';
                $memberModel->remark = '';
                $memberModel->info = '';
                $memberModel->save(false);
                //创建用户积分
                $memberModel->createrScore();

                //用户积分
                $model = new LoginForm();
                $model->username = $memberModel->username;
                $model->password = $input_password;
                $model->login();

                if($memberModel->type == '2'){ //公司
                    $this->redirect(array('/mscompany/create'));
                }else{ //个人
                    $this->redirect(array('/kongjian/jianli'));
                }

                //die(CJSON::encode(array('status'=>1)));
            }else{
                die($ajaxRes);
            }

        }else{
            $this->render('register',array('model'=>$memberModel));
        }
    }

    //退出登陆
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}