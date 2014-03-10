<?php

/**
 * This is the model class for table "ms_students".
 *
 * The followings are the available columns in table 'ms_students':
 * @property string $id
 * @property string $mid
 * @property string $username
 * @property string $graduatetime
 * @property string $hasoffer
 * @property string $universitytype
 * @property string $universitytypename
 * @property string $universityname
 * @property string $jianglitype
 * @property string $jiangliname
 * @property string $projects
 * @property string $peixun
 * @property string $createtime
 * @property string $updatetime
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
			array('mid', 'length', 'max'=>20),
			array('username', 'length', 'max'=>64),
			array('hasoffer', 'length', 'max'=>1),
			array('universitytype, jianglitype', 'length', 'max'=>10),
			array('universitytypename, universityname, jiangliname', 'length', 'max'=>50),
			array('projects', 'length', 'max'=>2000),
			array('peixun', 'length', 'max'=>1000),
			array('graduatetime, createtime, updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mid, username, graduatetime, hasoffer, universitytype, universitytypename, universityname, jianglitype, jiangliname, projects, peixun, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'graduatetime' => 'Graduatetime',
			'hasoffer' => '已经找到工作？',
			'universitytype' => '学校类型',
			'universitytypename' => 'Universitytypename',
			'universityname' => '学校名称',
			'jianglitype' => '曾获奖励',
			'jiangliname' => 'Jiangliname',
			'projects' => '项目经验',
			'peixun' => '培训经历',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('graduatetime',$this->graduatetime,true);
		$criteria->compare('hasoffer',$this->hasoffer,true);
		$criteria->compare('universitytype',$this->universitytype,true);
		$criteria->compare('universitytypename',$this->universitytypename,true);
		$criteria->compare('universityname',$this->universityname,true);
		$criteria->compare('jianglitype',$this->jianglitype,true);
		$criteria->compare('jiangliname',$this->jiangliname,true);
		$criteria->compare('projects',$this->projects,true);
		$criteria->compare('peixun',$this->peixun,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}