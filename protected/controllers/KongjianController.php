<?php

class KongjianController extends Controller
{
	public $layout='kongjian';

	public $filePath;
	
	public function actions()
	{
		list($s1, $s2) = explode(' ', microtime());   
		$fileName = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000); 
		$fileName.=rand(0,9999);
		if(!empty($_GET['fileName'])){
		  $fileName = $_GET['fileName'];
		}
		$path = $this->filePath[$_GET['filePath']];
		$after = $_GET['after'];
		$res = array(
		  //上传图片
		  'upload'=>array(
		    'class'=>'application.extensions.swfupload.SWFUploadAction',
		    'filepath'=>$path.$fileName.'.EXT',
		    //注意这里是绝对路径,.EXT是文件后缀名替代符号
		    //'onAfterUpload'=>array($this,'saveFile'),
		  )
		);
		scoreAction::setScore(Yii::app()->user->id,'touxiang','add',false);//上传头像
		if(!empty($after)){
		  	$res['upload']['onAfterUpload'] = array($this,$after);
		}
		return $res;
	}

	public function init(){
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery-1.7.1.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.JS_PATH.'jquery.form.js');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'common.css');
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.CSS_PATH.'kongjian.css');
		$this->filePath=array(
	     // 1=>Yii::app()->baseUrl.'/upload/user_photo/'.date('Y-m-d').'/',//套系(从upload目录开始)
            1=>'upload/user_photo/'.date('Y-m-d').'/',//套系(从upload目录开始)
		);
	}

	public function actionIndex()
	{
		$uid = Yii::app()->request->getParam('uid');

		$member = Member::model()->find('id = :id',array(':id'=>$uid));

		$topics = $member->topicMany;
		$this->pageKeyword=array(
			'title'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
			'keywords'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
			'description'=>$member->nickname.'的空间-'.Helper::siteConfig()->site_name,
		);
		$this->render('index', compact('member','topics'));
	}

    public function actionDeletejianli(){
        $id = $_POST['id'];
        $jianli = MsJianli::model()->findByPk($id);
        $json_str = CJSON::encode(array('result'=>'false'));
        if($jianli != null){
            unlink($jianli->filepath);
            $count = MsJianli::model()->deleteByPk($id);
            if($count >0){
                $json_str = CJSON::encode(array('result'=>'ok'));
            }
        }

        echo $json_str;
    }

    public function actionJianli(){
        $message = "";
        if(!empty($_FILES['jianlifile'])){ //上传简历
            $model=new MsJianli();
            $fileName = $_FILES["jianlifile"]["name"];


            $dir_path = "upload/jianli/".date('Y-m-d').'/';

            list($s1, $s2) = explode(' ', microtime());
            $fileName_store = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
            $fileName_store.=rand(0,9999);
            $type = strstr($fileName, '.');
            $type = strtolower($type);

            $file_path = $dir_path.$fileName_store.$type;
            if($fileName==null || $fileName=='' || Yii::app()->user->isGuest){
                $message = '请选择要上传的文件';
                return;
            }else{
                if(!is_dir($dir_path)){
                    mkdir($dir_path, 0777,true);
                }
                $model->name = $fileName;
                $model->filepath = $file_path;
                $model->userId = Yii::app()->user->id;
                $model->createtime = date("Y-m-d H:i:s");
                $model->updatetime = $model->createtime;

                $picsize = $_FILES['jianlifile']['size'];
                if ($picsize > 2*1024000) {
                    $message =  '图片大小不能超过2M';
                }else{
                    if ($type != ".doc" && $type != ".docx"  && $type != ".wps"
                        && $type != ".avi"  && $type != ".mpeg1" && $type != ".mpeg2"
                        && $type != ".mpeg4"  && $type != ".wmv" && $type != ".mp4" ) {
                        $message =  '请上传word文档或者avi,mpeg1,mpeg2,mpeg4,wmv,mp4格式的视频文件^_^';
                    }else{
                        move_uploaded_file($_FILES["jianlifile"]["tmp_name"],$file_path);
                        $model->save();
                    }
                }
            }
//            $jianlis = MsJianli::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
//            $this->render('jianli', array('jianlis'=>$jianlis,'message'=>$message));
        }
        $jianlis = MsJianli::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
        $this->render('jianli', array('jianlis'=>$jianlis,'message'=>$message));
    }

	public function actionInfo(){
		$model=Member::model()->find('id = '.Yii::app()->user->id);
		if(!empty($_POST['Member'])){
    	//验证
    	$ajaxRes 	= 	CActiveForm::validate($model, array('nickname','email','remark','photo','info'), true, true);
    	$ajaxResArr = 	CJSON::decode($ajaxRes);
    	//验证结果
    	if(empty($ajaxResArr)){
    
    	 	if($model->save(false)){
    	 		die(CJSON::encode(array('status'=>1)));
    	 	}else{
    	 		die(CJSON::encode(array('status'=>0)));
    	 	}
    	 	
    	 }else{
    	 	die($ajaxRes);
    	 }
		}
		$this->pageKeyword=array(
			'title'=>'基本信息-'.Helper::siteConfig()->site_name,
			'keywords'=>'基本信息-'.Helper::siteConfig()->site_name,
			'description'=>'基本信息-'.Helper::siteConfig()->site_name,
		);
		$this->render('info',array(
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
  //我的积分
  public function actionMyscore(){
 
	if(Yii::app()->user->id){
		$model=Member::model()->find('id='.Yii::app()->user->id);
		$score=Score::model()->find('id=1');
		$myscore=$model->myUserScoreOne;
	}else{
		$this->redirect(Yii::app()->baseUrl.'/public/login');//未登录跳转页面
	}

	$this->pageKeyword=array(
		'title'=>'我的积分-'.Helper::siteConfig()->site_name,
		'keywords'=>'我的积分-'.Helper::siteConfig()->site_name,
		'description'=>'我的积分-'.Helper::siteConfig()->site_name,
	);
  	$this->render('myscore',array('myscore'=>$myscore,'score'=>$score,'model'=>$model));

  }

    /**
     * 上传简历
     */
//    public function actionJianliupload(){
//        $model=new MsJianli();
//        $fileName = $_FILES["jianlifile"]["name"];
//        $message = "";
//
//        $dir_path = "upload/jianli/".date('Y-m-d').'/';
//
//        list($s1, $s2) = explode(' ', microtime());
//        $fileName_store = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
//        $fileName_store.=rand(0,9999);
//        $type = strstr($fileName, '.');
//        $type = strtolower($type);
//
//        $file_path = $dir_path.$fileName_store.$type;
//        if($fileName==null || $fileName=='' || Yii::app()->user->isGuest){
//            $message = '请选择要上传的文件';
//            return;
//        }else{
//            if(!is_dir($dir_path)){
//                mkdir($dir_path, 0777,true);
//            }
//            $model->name = $fileName;
//            $model->filepath = $file_path;
//            $model->userId = Yii::app()->user->id;
//            $model->createtime = date("Y-m-d H:i:s");
//            $model->updatetime = $model->createtime;
//
//            $picsize = $_FILES['jianlifile']['size'];
//            if ($picsize > 2*1024000) {
//                $message =  '图片大小不能超过2M';
//            }else{
//                if ($type != ".doc" && $type != ".docx"  && $type != ".wps" ) {
//                    $message =  '请上传word文档^_^';
//                }else{
//                    move_uploaded_file($_FILES["jianlifile"]["tmp_name"],$file_path);
//                    $model->save();
//                }
//            }
//        }
//        $jianlis = MsJianli::model()->findAll('userId=:userId',array(':userId'=>Yii::app()->user->id));
//        $this->render('jianli', array('jianlis'=>$jianlis,'message'=>$message));
//    }

    function actionJianlidownload($id){
        //$file_dir = chop($file_dir);//去掉路径中多余的空格
        $jianli = MsJianli::model()->findByPk($id);
        if($jianli != null){
            $filePath = $jianli->filepath;
            //判断要下载的文件是否存在
            if(!file_exists($filePath)){
                echo '对不起,你要下载的文件不存在。';
                return false;
            }else{
                $file_size = filesize($filePath);

                header("Content-type: application/octet-stream");
                header("Accept-Ranges: bytes");
                header("Accept-Length: $file_size");
                header("Content-Disposition: attachment; filename=".$jianli->name);

                $fp = fopen($filePath,"r");
                $buffer_size = 1024;
                $cur_pos = 0;

                while(!feof($fp)&&$file_size-$cur_pos>$buffer_size)
                {
                    $buffer = fread($fp,$buffer_size);
                    echo $buffer;
                    $cur_pos += $buffer_size;
                }

                $buffer = fread($fp,$file_size-$cur_pos);
                echo $buffer;
                fclose($fp);
            }
        }//end if($jianli != null)
        return true;
    }
}