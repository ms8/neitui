<?php

include("zip.php");

class MsJianliController extends Controller
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
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MsJianli;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MsJianli']))
		{
			$model->attributes=$_POST['MsJianli'];
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

		if(isset($_POST['MsJianli']))
		{
			$model->attributes=$_POST['MsJianli'];
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
		$dataProvider=new CActiveDataProvider('MsJianli');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MsJianli('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MsJianli']))
			$model->attributes=$_GET['MsJianli'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MsJianli the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MsJianli::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MsJianli $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ms-jianli-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    function actionJianlidownload(){
        $id = key($_GET);
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

    public function actionCompressJianli(){
//        $zip = new PHPZip();
//        $zip ->downloadZip("upload/jianli/2014-01-03", "compress.zip");//自动下载
//        $zip = new PclZip("upload/jianli/2014-01-03");//压缩文件
//        $zip->create("data/");
    }
}
