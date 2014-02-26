<?php

/**
 * This is the model class for table "ms_member".
 *
 * The followings are the available columns in table 'ms_member':
 * @property string $id
 * @property string $username
 * @property string $nickname
 * @property string $password
 * @property string $bind_account
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $verify
 * @property string $email
 * @property string $remark
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property integer $role_id
 * @property string $info
 * @property integer $salt
 * @property string $photo
 * @property integer $score
 * @property string $type
 */
class MsMember extends CActiveRecord
{

	public $_modelName = '表名称(新建模型需要在模型里面修改)';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MsMember the static model class
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
		return 'ms_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, nickname, password, bind_account, email, remark, create_time, update_time, info, salt, photo', 'required'),
			array('status, role_id, salt, score', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>64),
			array('nickname, bind_account, email, photo', 'length', 'max'=>50),
			array('password, verify', 'length', 'max'=>32),
			array('last_login_time, create_time, update_time', 'length', 'max'=>11),
			array('last_login_ip', 'length', 'max'=>40),
			array('remark', 'length', 'max'=>255),
			array('type', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, nickname, password, bind_account, last_login_time, last_login_ip, verify, email, remark, create_time, update_time, status, role_id, info, salt, photo, score, type', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'nickname' => 'Nickname',
			'password' => 'Password',
			'bind_account' => 'Bind Account',
			'last_login_time' => 'Last Login Time',
			'last_login_ip' => 'Last Login Ip',
			'verify' => 'Verify',
			'email' => 'Email',
			'remark' => 'Remark',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'status' => 'Status',
			'role_id' => 'Role',
			'info' => 'Info',
			'salt' => 'Salt',
			'photo' => 'Photo',
			'score' => 'Score',
			'type' => 'Type',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('bind_account',$this->bind_account,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('verify',$this->verify,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('salt',$this->salt);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}