<?php

/**
 * This is the model class for table "krz_weight".
 *
 * The followings are the available columns in table 'krz_weight':
 * @property string $id
 * @property string $cid
 * @property string $cname
 * @property integer $weight
 * @property string $citycode
 * @property string $createtime
 * @property string $updatetime
 */
class KrzWeight extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KrzWeight the static model class
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
		return 'krz_weight';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, weight, citycode, createtime', 'required'),
			array('weight', 'numerical', 'integerOnly'=>true),
			array('cid', 'length', 'max'=>20),
			array('citycode', 'length', 'max'=>50),
			array('cname, updatetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, cname, weight, citycode, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'cname' => 'Cname',
			'weight' => 'Weight',
			'citycode' => 'Citycode',
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
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('citycode',$this->citycode,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}