<?php

/**
 * This is the model class for table "ms_students".
 *
 * The followings are the available columns in table 'ms_students':
 * @property string $id
 * @property string $mid
 * @property string $username
 * @property string $realname
 * @property string $phone
 * @property string $graduatetime
 * @property string $hasoffer
 * @property string $sex
 * @property string $degree
 * @property string $degreename
 * @property string $universitytype
 * @property string $universitytypename
 * @property string $universityname
 * @property string $jianglitype
 * @property string $jiangliname
 * @property string $projects
 * @property string $peixun
 * @property string $skill
 * @property string $createtime
 * @property string $updatetime
 * @property string $image
 * @property string $description
 */
class MsStudents extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsStudents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ms_students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, username', 'required'),
			array('mid, phone, degreename', 'length', 'max'=>20),
			array('username', 'length', 'max'=>64),
			array('realname, universitytypename, universityname, jiangliname', 'length', 'max'=>50),
			array('hasoffer, sex', 'length', 'max'=>1),
			array('degree, universitytype, jianglitype', 'length', 'max'=>10),
			array('projects', 'length', 'max'=>2000),
			array('peixun, skill, description', 'length', 'max'=>1000),
			array('image', 'length', 'max'=>100),
			array('graduatetime, createtime, updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mid, username, realname, phone, graduatetime, hasoffer, sex, degree, degreename, universitytype, universitytypename, universityname, jianglitype, jiangliname, projects, peixun, skill, createtime, updatetime, image, description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mid' => 'Mid',
			'username' => 'Username',
			'realname' => '姓名：',
			'phone' => '手机：',
			'graduatetime' => 'Graduatetime',
			'hasoffer' => 'Hasoffer',
			'sex' => '性别：',
			'degree' => 'Degree',
			'degreename' => 'Degreename',
			'universitytype' => 'Universitytype',
			'universitytypename' => 'Universitytypename',
			'universityname' => 'Universityname',
			'jianglitype' => 'Jianglitype',
			'jiangliname' => 'Jiangliname',
			'projects' => 'Projects',
			'peixun' => 'Peixun',
			'skill' => 'Skill',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
			'image' => 'Image',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('graduatetime',$this->graduatetime,true);
		$criteria->compare('hasoffer',$this->hasoffer,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('degreename',$this->degreename,true);
		$criteria->compare('universitytype',$this->universitytype,true);
		$criteria->compare('universitytypename',$this->universitytypename,true);
		$criteria->compare('universityname',$this->universityname,true);
		$criteria->compare('jianglitype',$this->jianglitype,true);
		$criteria->compare('jiangliname',$this->jiangliname,true);
		$criteria->compare('projects',$this->projects,true);
		$criteria->compare('peixun',$this->peixun,true);
		$criteria->compare('skill',$this->skill,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}