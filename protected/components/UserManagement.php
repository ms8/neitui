<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-19
 * Time: 下午8:26
 * To change this template use File | Settings | File Templates.
 */
//Yii::import('components.UserManagement');

class UserManagement {

    public $errorCode;
    const ERROR_NONE=0;
    const ERROR_USERNAME_INVALID=1;
    const ERROR_PASSWORD_INVALID=2;
    const ERROR_UNKNOWN_IDENTITY=100;


    /**
     * Generate a random salt in the crypt(3) standard Blowfish format.
     * 生成加密用的加密盐，即加密参数
     * @param int $cost Cost parameter from 4 to 31.
     *
     * @throws Exception on invalid cost parameter.
     * @return string A Blowfish hash salt for use in PHP's crypt()
     */
    public function blowfishSalt($cost = 13)
    {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new Exception("cost parameter must be between 4 and 31");
        }
        $rand = array();
        for ($i = 0; $i < 8; $i += 1) {
            $rand[] = pack('S', mt_rand(0, 0xffff));
        }
        $rand[] = substr(microtime(), 2, 6);
        $rand = sha1(implode('', $rand), true);
        $salt = '$2a$' . sprintf('%02d', $cost) . '$';
        $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }

    public function authenticate($userModel)
    {
        $record = Member::model()->findByAttributes(array('username' => $userModel->username));

        if($record == null){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }elseif($record->password === crypt($userModel->password, $record->password)){
            //用户输入的密码与数据库中的密码运算，如果输入的密码正确，运算结果依然是数据库中的密码
            $this->errorCode=self::ERROR_NONE;
        }else{
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        return !$this->errorCode;
    }

    public function register($userModel){
        $userModel->password = crypt($userModel->password, $this->blowfishSalt());
        return $userModel->save(false);
    }

    public function crypt($password){
        return crypt($password, $this->blowfishSalt());
    }

}