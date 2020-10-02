<?php

// require_once './sql.php';


	// $to = "904087449@qq.com";
	// $subject = "Test mail";
	// $message = "Hello! This is a simple email message.";
	// $from = "zoujq@huotiantech.com";
	// $headers = "From: $from";
	// mail($to,$subject,$message,$headers);
	// echo "Mail Sent.";

	ini_set("display_errors", "On");//打开错误提示
	ini_set("error_reporting",E_ALL);//显示所有错误
  require_once './phpmailer/class.phpmailer.php';


  $mail = new PHPMailer(true); //建立邮件发送类
  $mail->CharSet = "UTF-8";//设置信息的编码类型
  $address = "904087449@qq.com";//收件人地址
  $mail->IsSMTP(); // 使用SMTP方式发送
  $mail->Host = "smtpdm.aliyun.com"; //使用163邮箱服务器
  $mail->SMTPAuth = true; // 启用SMTP验证功能
  $mail->Username = "zoujq@huotiantech.com"; //你的163服务器邮箱账号
  $mail->Password = "Zz789789"; // 163邮箱密码
  $mail->Port = 25;//邮箱服务器端口号
  $mail->From = "zoujq@huotiantech.com"; //邮件发送者email地址
  $mail->FromName = "测试邮件";//发件人名称
  $mail->AddAddress("$address", "张三"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
  // $mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
  $mail->IsHTML(true);//是否使用HTML格式
  $mail->Subject = "测试测试"; //邮件标题
  $mail->Body = "新年快乐"; //邮件内容，上面设置HTML，则可以是HTML
  if (!$mail->Send()) {
   echo "邮件发送失败. <p>";
   echo "错误原因: " . $mail->ErrorInfo;
   exit;
  }




?>