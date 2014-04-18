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

    public function actionPrivacy(){
        $this->render('privacy');
    }

    public function actionAdvice(){
        $email = $_POST['email'];
        $advice = $_POST['advice'];

        $mailSender = new MailerMsg();
        $result = $mailSender->send($email,'admin@kuairuzhi.com',$advice);
        die(CJSON::encode($result));
    }

	public function actionIndex(){
        $allData = array();
        //取在权重表中的公司
        $companys = MsCompany::model()->findAllByAttributes(array('status'=>'2'));
        $wm = new WeightManage();
        $companys = $wm->getCompanys();
        foreach($companys as $company){
            $jobs = MsJobs::model()->findAllByAttributes(array('company_id'=>$company->id));
            if($jobs == null)
                continue;  //只取发布了招聘岗位的公司信息
            if($company->logo == null || $company->logo == ''){
                $company->logo = 'upload/companylogo/default.png';
            }
            array_push($allData,array('company'=>$company,'jobs'=>$jobs));
        }
        $this->render('index',array('companys'=>$allData));
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
        $err_msg = "";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $model->username = $username;
        $model->password = $password;
        if($model->login()){
            $member = Member::model()->findByAttributes(array('username'=>$model->username));
            $returnUrl="";
            if($member->type == '1'){ //应聘者
                //从其他页面中的弹出框直接登录，不是从登录界面登录的，登录后要返回当前页面
                if(isset($_POST['loginflag']) && Yii::app()->request->urlReferrer != null){
                    $returnUrl = Yii::app()->request->urlReferrer;
                }else{
                    $returnUrl = '/kongjian/application';
                }
            }else if($member->type == '2'){
//                $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
//                if($company == null){ //还未完善公司信息，跳转到创建公司信息页面
//                    $returnUrl = '/mscompany/create';
//                }else{
//                    $returnUrl = '/mscompany/dashboard/';
//                }
                $returnUrl = '/mscompany/dashboard/'; //暂时这么处理
            }
            die(CJSON::encode($returnUrl));
        }else{
            die(CJSON::encode('fail'));
        }
//        if(!empty($_POST['LoginForm'])){
//
//            //赋值给模型
//            $model->attributes=$_POST['LoginForm'];
//            //获取验证错误
//            $ajaxRes = CActiveForm::validate($model, array('username','password'));
//            $ajaxResArr = CJSON::decode($ajaxRes);
//            //验证结果为空入库
//            if(empty($ajaxResArr)){
//                if($model->login()){
//                    $member = Member::model()->findByAttributes(array('username'=>$model->username));
//                    if($member->type == '1'){ //应聘者
//                        //从其他页面中的弹出框直接登录，不是从登录界面登录的，登录后要返回当前页面
//                        if(isset($_POST['loginflag']) && Yii::app()->request->urlReferrer != null){
//                            $this->redirect(Yii::app()->request->urlReferrer);
//                        }else{
//                            $this->redirect(array('/kongjian/application'));
//                        }
//                    }else{ //企业
//                        $company = MsCompany::model()->findByAttributes(array('account'=>$member->username));
//                        if($company == null){ //还未完善公司信息，跳转到创建公司信息页面
//                            $this->redirect(array('/mscompany/create'));
//                        }else{
//                            $this->redirect(array('/mscompany/dashboard/'));
//                        }
//                    }
//                }else{
//                    $err_msg = "用户名密码错误";
//                    die(CJSON::encode(array('status'=>0)));
//                }
//            }else{
//                $err_msg = "用户名密码错误";
//                die($ajaxRes);
//            }
//        }
//        $this->render('login',array('model'=>$model,'msg'=>$err_msg));
    }

    public function actionCheckUser(){
        $user = Member::model()->findByAttributes(array('username' => $_POST['username']));
        if($user==null){
            echo '0';
        }else{
            echo '1';
        }
    }

    public function actionForgetpassword(){
        $this->render('forgetpassword');
    }

    public function actionForget(){
        if(isset($_POST['username'])){
            $mail = new PHPMailer(); //建立邮件发送类
            $address =$_POST['username'];
            $mail->IsSMTP(); // 使用SMTP方式发送
            $mail->Host = "smtp.kuairuzhi.com"; // 您的企业邮局域名
            $mail->SMTPAuth = true; // 启用SMTP验证功能
            $mail->Username = "admin@kuairuzhi.com"; // 邮局用户名(请填写完整的email地址)
            $mail->Password = 'gqlshare111111'; // 邮局密码
            $mail->Port=25;
            $mail->CharSet='UTF-8';
            $mail->From = "admin@kuairuzhi.com"; //邮件发送者email地址
            $mail->FromName = "快入职";
            $mail->AddAddress($address, $_POST['username']);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
            //$mail->AddReplyTo("", "");

            //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
            $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式

            //$mail->Subject = ""; //邮件标题
            //产生随机码并记录到数据库
            $memberModel=new Member();
            $memberModel->password = $_POST['username'];
            $memberModel->salt=Helper::randomCode();//加盐值
            $serialNum = $memberModel->hashPassword();
            $resetModel = new MsReset();
            $resetModel->username = $_POST['username'];
            $resetModel->serialnum = $serialNum;
            $resetModel->createtime = date("Y-m-d H:i:s");
            if(!$resetModel->save()){
                //发送失败
                $msg = array('flag'=>'0','reason'=>'生成随机码失败');
                echo json_encode($msg);
                exit;
            }
            $mail->Subject = "=?utf-8?B?" . base64_encode("重置密码链接") . "?=";
            $mail->Body = "您好，".$_POST['username'].",请点击以下链接以修改密码<br>"
            ."<a target='_blank' href='".Yii::app()->request->hostInfo.Yii::app()->homeUrl.'site/toReset?serial='
                .$serialNum.
                "'>".Yii::app()->request->hostInfo.Yii::app()->homeUrl.'/site/toReset?serial='.$serialNum."</a><br>"
            ."如果链接不能打开，请将该链接复制到浏览器里直接访问。<br><br>"
            ."<a target='_blank' href='".Yii::app()->request->hostInfo.Yii::app()->homeUrl
            . "'>快入职网</a>，专注于IT相关专业的应届生招聘平台，海量的企业在等着你，快来投简历吧，快人一步找到好工作哦"; //邮件内容
            //$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

            if(!$mail->Send())
            {   //发送失败
                $msg = array('flag'=>'0','reason'=>$mail->ErrorInfo);
                echo json_encode($msg);
            }else{
                echo "1"; //发送成功
            }
        }else{ //到首页
            echo '-1';
        }
    }

    public function actionDirectReset(){
        if(!Yii::app()->user->isGuest && isset($_POST['password'])){
            $member_id = Yii::app()->user->id;
            $memberModel = new Member();
            $memberModel->password = $_POST['password'];
            $memberModel->salt=Helper::randomCode();//加盐值
            $memberModel->password=$memberModel->hashPassword();
            Member::model()->updateByPk($member_id,array('password'=>$memberModel->password, 'salt'=>$memberModel->salt));
            die(CJSON::encode(array('status'=>1)));
//            $this->redirect(Yii::app()->request->urlReferrer);
        }else{
            //取公司信息:已验证的公司
            $companys = MsCompany::model()->findAllByAttributes(array('status'=>'2'));
            $this->render('index',array('companys'=>$companys));
        }
    }

    public function actionResetpassword(){
        $flag = false;
        $password = "";
        if(isset($_GET['username']) && isset($_GET['password']) ){
            if(isset($_GET['serialnum'])){
                $username = $_GET['username'];
                $password = $_GET['password'];
                $rm = MsReset::model()->findByAttributes(array('username'=>$username,
                    'serialnum'=>$_GET['serialnum']));
                if($rm != null){ //修改密码
                    $memberModel = new Member();
                    $memberModel->username = $username;
                    $memberModel->password = $password;
                    $memberModel->salt=Helper::randomCode();//加盐值
                    $memberModel->password=$memberModel->hashPassword();
                    Member::model()->updateAll(array('password'=>$memberModel->password,
                            'salt'=>$memberModel->salt),
                        'username=:username',array(':username'=>$memberModel->username));
                    //删除对应记录
                    MsReset::model()->deleteAllByAttributes(array('username'=>$username));
                    $flag = true;
                }
            }
        }
        if($flag){
            $model = new LoginForm();
            $model->username = $memberModel->username;
            $model->password = $password;
            $model->login();
        }
        //到首页
        $companys = MsCompany::model()->findAllByAttributes(array('status'=>'2'));
        $this->render('index',array('companys'=>$companys));
    }

    public function actionToReset($serial){
        if($serial!=null && $serial != ''){
            //从数据库取该值并校验该值
            $rm = MsReset::model()->findByAttributes(array('serialnum'=>$serial));
            if($rm != null){
                $this->render('resetpassword',array('username'=>$rm->username,'serialnum'=>$serial));
            }else{
                $companys = MsCompany::model()->findAllByAttributes(array('status'=>'2'));
                $this->render('index',array('companys'=>$companys));
            }
        }else{  //到首页
            $companys = MsCompany::model()->findAllByAttributes(array('status'=>'2'));
            $this->render('index',array('companys'=>$companys));
        }
    }

    //注册
    public function actionRegister(){

        $this->pageKeyword['title'] = Helper::siteConfig()->site_name.'-注册';
        $this->pageKeyword['keywords'] = Helper::siteConfig()->site_name.'-注册';
        $this->pageKeyword['description'] = Helper::siteConfig()->site_name.'-注册';

        //实例化用户模型
        $memberModel=new Member();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type=$_POST['type'];
        $memberModel->username = $username;
        $memberModel->password = $password;
        $memberModel->type=$type;
        $memberModel->nickname = $memberModel->username;
        $memberModel->email = $memberModel->username;

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
        $result = $memberModel->save(false);
        //创建用户积分
        $memberModel->createrScore();

        //用户积分
        $model = new LoginForm();
        $model->username = $memberModel->username;
        $model->password = $password;
        $model->login();

        if($memberModel->type == '2'){ //公司
            //注册后默认创建一个company表的信息，公司logo用默认的logo，其他信息为空
            $company = new MsCompany();
            $company->website='';
            $company->name='';
            $company->address='';
            $company->email='';
            $company->telephone='';
            $company->tags='';
            $company->description='';
            $company->status='2';//目前创建公司时默认已验证
            $company->account = $memberModel->username;//当前登录用户
            $company->createtime = date("Y-m-d H:i:s");
            $company->updatetime = date("Y-m-d H:i:s");
            //$company->logo = 'upload/companylogo/default.png';
            $company->logo = '';
            if($company->save()){
                //同步更新权重表中的对应城市
                $wm = new WeightManage();
                $wm->createCompany($company);
            }
            $ajaxRes = '/mscompany/dashboard';
        }else{ //个人
            //注册后默认创建一个students表的信息
            $student = new MsStudents();
            $student->mid=$memberModel->id;
            $student->username=$memberModel->username;
            $student->createtime = date("Y-m-d H:i:s");
            $student->updatetime = date("Y-m-d H:i:s");
            if($student->save()){
                $ajaxRes ='/kongjian/jianli';
            }else{
                //错误信息
            }
        }
        if($result==false){
            $ajaxRes = "fail";
        }
        die(CJSON::encode($ajaxRes));

//        if(!empty($_POST['Member'])){
//            //赋值给模型
//            $memberModel->attributes=$_POST['Member'];
//            $input_password = $memberModel->password;
//            $memberModel->nickname = $memberModel->username;
//            $memberModel->email = $memberModel->username;
//            //验证
//            $ajaxRes 	= 	CActiveForm::validate($memberModel, array('username','nickname','password','passwordrepeat','verifyCode'));
//            $ajaxResArr = 	CJSON::decode($ajaxRes);
//            //验证结果
//            if(empty($ajaxResArr)){
//
//                $score=Score::model()->find('id=1');
//
//                $memberModel->salt=Helper::randomCode();//加盐值
//                $memberModel->password=$memberModel->hashPassword();//密码
//                $memberModel->create_time=time();//创建时间
//                $memberModel->update_time=time();//更新时间
//                $memberModel->status=1;//状态
//                $memberModel->role_id=1;//状态
//                $memberModel->photo=rand(1,95).'.jpg';//头像
//                $memberModel->last_login_time=time();//登陆时间
//                $memberModel->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
//                $memberModel->score=$score->zhuce;//注册积分
//                $memberModel->bind_account = '';
////                $memberModel->email = '';
//                $memberModel->remark = '';
//                $memberModel->info = '';
//                $memberModel->save(false);
//                //创建用户积分
//                $memberModel->createrScore();
//
//                //用户积分
//                $model = new LoginForm();
//                $model->username = $memberModel->username;
//                $model->password = $input_password;
//                $model->login();
//
//                if($memberModel->type == '2'){ //公司
//                    $this->redirect(array('/mscompany/create'));
//                }else{ //个人
//                    $this->redirect(array('/kongjian/jianli'));
//                }
//
//                //die(CJSON::encode(array('status'=>1)));
//            }else{
//                die($ajaxRes);
//            }
//
//        }else{
//            $this->render('register',array('model'=>$memberModel));
//        }
    }

    //退出登陆
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}