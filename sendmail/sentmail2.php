<?php  
require_once ('email.class.php'); 
//########################################## 
$smtpserver = "smtp.sina.cn";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "123456@sina.cn";//SMTP服务器的用户邮箱
$smtpemailto = "123456@qq.com";//发送给谁
$smtpuser = "123456@sina.cn";//SMTP服务器的用户帐号
$smtppass = "123456";//SMTPSMTP服务器的用户密码
$mailsubject = "我是邮件";//邮件主题
$mailbody = "<h1> hello , I am a email</h1>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
########################################## 
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

$smtp->debug = true;//是否显示发送的调试信息
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 
?> 