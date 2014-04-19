<?php

/**
 * This is the model class for table "krz_jlcontent".
 *
 * The followings are the available columns in table 'krz_jlcontent':
 * @property string $id
 * @property string $jid
 * @property string $mid
 * @property string $jname
 * @property string $content
 * @property string $createtime
 */
class KrzJlcontent extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KrzJlcontent the static model class
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
		return 'krz_jlcontent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jid', 'required'),
			array('jid, mid', 'length', 'max'=>20),
			array('jname', 'length', 'max'=>100),
			array('content', 'length', 'max'=>20000),
			array('createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, jid, mid, jname, content, createtime', 'safe', 'on'=>'search'),
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
			'jid' => 'Jid',
			'mid' => 'Mid',
			'jname' => 'Jname',
			'content' => 'Content',
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
		$criteria->compare('jid',$this->jid,true);
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('jname',$this->jname,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}