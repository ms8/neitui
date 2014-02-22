<?php

/**
 * This is the model class for table "ms_zpdetail_tag".
 *
 * The followings are the available columns in table 'ms_zpdetail_tag':
 * @property string $id
 * @property string $zp_detailid
 * @property string $tag_code
 * @property string $tag_name
 */
class MsZpdetailTag extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsZpdetailTag the static model class
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
		return 'ms_zpdetail_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zp_detailid, tag_code', 'required'),
			array('zp_detailid', 'length', 'max'=>20),
			array('tag_code', 'length', 'max'=>10),
			array('tag_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, zp_detailid, tag_code, tag_name', 'safe', 'on'=>'search'),
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
			'zp_detailid' => 'Zp Detailid',
			'tag_code' => 'Tag Code',
			'tag_name' => 'Tag Name',
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
		$criteria->compare('zp_detailid',$this->zp_detailid,true);
		$criteria->compare('tag_code',$this->tag_code,true);
		$criteria->compare('tag_name',$this->tag_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}