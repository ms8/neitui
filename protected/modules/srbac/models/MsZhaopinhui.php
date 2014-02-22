<?php

/**
 * This is the model class for table "ms_zhaopinhui".
 *
 * The followings are the available columns in table 'ms_zhaopinhui':
 * @property string $id
 * @property string $name
 * @property string $activity_date
 * @property string $activity_address
 * @property string $status
 * @property string $description
 * @property string $createtime
 */
class MsZhaopinhui extends CActiveRecord
{

	public $_modelName = 'ms_zhaopinhui';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsZhaopinhui the static model class
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
		return 'ms_zhaopinhui';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, activity_date, createtime', 'required'),
			array('name', 'length', 'max'=>100),
			array('activity_address', 'length', 'max'=>200),
			array('status', 'length', 'max'=>1),
			array('description', 'length', 'max'=>20000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, activity_date, activity_address, status, description, createtime', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'activity_date' => 'Activity Date',
			'activity_address' => 'Activity Address',
			'status' => 'Status',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('activity_date',$this->activity_date,true);
		$criteria->compare('activity_address',$this->activity_address,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}