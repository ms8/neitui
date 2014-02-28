<?php

/**
 * This is the model class for table "ms_jobs".
 *
 * The followings are the available columns in table 'ms_jobs':
 * @property string $id
 * @property string $company_id
 * @property string $title
 * @property string $bumen
 * @property string $salary
 * @property string $citycode
 * @property string $cityname
 * @property string $description
 * @property string $createtime
 */
class MsJobs extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsJobs the static model class
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
		return 'ms_jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id', 'length', 'max'=>20),
			array('title, bumen', 'length', 'max'=>100),
			array('salary', 'length', 'max'=>10),
			array('citycode, cityname', 'length', 'max'=>50),
			array('description', 'length', 'max'=>2000),
			array('createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, title, bumen, salary, citycode, cityname, description, createtime', 'safe', 'on'=>'search'),
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
			'company_id' => 'Company',
            'title' => '职位信息',
            'bumen' => '所属部门',
            'salary' => '月薪',
            'citycode' => '城市',
            'cityname' => 'Cityname',
            'description' => '职位详细信息',
            'createtime' => 'Createtime',
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
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('bumen',$this->bumen,true);
		$criteria->compare('salary',$this->salary,true);
		$criteria->compare('citycode',$this->citycode,true);
		$criteria->compare('cityname',$this->cityname,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}