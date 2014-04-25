<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{


	public $isjiami;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$user = Member::model()->find('username = :username', array(':username'=>$this->username));
//
//		if(!empty($user)){
//            if($this->isjiami){
//                $password = $this->password;
//            }else{
//                $password = md5($this->password.$user->salt);
//            }
//            $password = $this->password;
//			if($user->password!=$password){
//				$this->errorCode=self::ERROR_USERNAME_INVALID;
//			}else{
//
//				$user->last_login_time=time();
//				$user->last_login_ip=Yii::app()->request->UserHostAddress;//IP地址
//				$user->save(false);
//				//设置session信息
//				$this->setState('nickname',$user->nickname);
//				$this->setState('username',$user->username);
//				$this->setState('photo',$user->photo);
//				$this->setState('id',$user->id);
//				$this->errorCode=self::ERROR_NONE;
//			}
//		}else{
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		}
//		return !$this->errorCode;

//        $userManagement = new UserManagement();
//        $member = new Member();
//        $member->username = $this->username;
//        $member->password = $this->password;
        $record = Member::model()->findByAttributes(array('username' => $this->username));

        if($record == null){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }elseif($record->password === crypt($this->password, $record->password)){
            //用户输入的密码与数据库中的密码运算，如果输入的密码正确，运算结果依然是数据库中的密码
            $this->errorCode=self::ERROR_NONE;
            $this->setState('id',$record->id);
        }else{
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        return !$this->errorCode;
//        $userManagement->authenticate($member);
//        if(!$userManagement->authenticate($member))
//            $this->errorCode=self::ERROR_PASSWORD_INVALID;
//        else
//            $this->errorCode=self::ERROR_NONE;
//        return !$this->errorCode;
	}

}