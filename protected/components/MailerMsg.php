<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-4-8
 * Time: 上午8:59
 * To change this template use File | Settings | File Templates.
 */

class MailerMsg {

    public function send($senderAddress,$receiverAddress,$msg){
        $mail = new PHPMailer(); //建立邮件发送类
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtp.kuairuzhi.com"; // 您的企业邮局域名
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = "admin@kuairuzhi.com"; // 邮局用户名(请填写完整的email地址)
        $mail->Password = 'gqlshare111111'; // 邮局密码
        $mail->Port=25;
        $mail->CharSet='UTF-8';
        $mail->From = "admin@kuairuzhi.com"; //邮件发送者email地址，必须用我们的地址，因为要用户名密码
        $mail->FromName = $senderAddress;
        $mail->AddAddress($receiverAddress, $receiverAddress);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        //$mail->AddReplyTo("", "");

        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
        $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
        $mail->Subject = "=?utf-8?B?" . base64_encode("来自".$senderAddress."的意见反馈") . "?=";
        $mail->Body = $msg; //邮件内容
        //$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

        if(!$mail->Send())
        {   //发送失败
            return false;
        }else{
            return true; //发送成功
        }
    }
}