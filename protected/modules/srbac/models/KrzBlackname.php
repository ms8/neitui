<?php

/**
 * This is the model class for table "krz_blackname".
 *
 * The followings are the available columns in table 'krz_blackname':
 * @property string $id
 * @property string $name
 * @property string $website
 * @property string $email
 * @property string $address
 * @property string $account
 * @property string $telephone
 * @property string $status
 * @property string $tags
 * @property string $logo
 * @property string $description
 * @property string $createtime
 * @property string $updatetime
 */
class KrzBlackname extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KrzBlackname the static model class
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
		return 'krz_blackname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, website, email, address, account, logo', 'length', 'max'=>100),
			array('telephone', 'length', 'max'=>50),
			array('status', 'length', 'max'=>10),
			array('tags', 'length', 'max'=>500),
			array('description', 'length', 'max'=>1000),
			array('createtime, updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, website, email, address, account, telephone, status, tags, logo, description, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'website' => 'Website',
			'email' => 'Email',
			'address' => 'Address',
			'account' => 'Account',
			'telephone' => 'Telephone',
			'status' => 'Status',
			'tags' => 'Tags',
			'logo' => 'Logo',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}