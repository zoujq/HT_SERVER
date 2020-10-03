<?php
  require_once './phpmailer/class.phpmailer.php';


  function send_email($to_addr,$title, $body) 
  {      
    $errCode=0;
    $errMsg='email send success';

    $mail = new PHPMailer(true); //建立邮件发送类
    $mail->CharSet = "UTF-8";//设置信息的编码类型
    $address =  $to_addr;//收件人地址
    $mail->IsSMTP(); // 使用SMTP方式发送
    $mail->Host = "smtp.qiye.aliyun.com"; //使用163邮箱服务器
    $mail->SMTPSecure='ssl';
    $mail->SMTPAuth = true; // 启用SMTP验证功能
    $mail->Username = "service@huotiantech.com"; //你的163服务器邮箱账号
    $mail->Password = "As45fnker566"; // 163邮箱密码
    $mail->Port = 465;//邮箱服务器端口号
    // $mail->SMTPDebug=true;
    $mail->From = "service@huotiantech.com"; //邮件发送者email地址
    $mail->FromName = "火天物联(HuotianIOT)";//发件人名称
    $mail->AddAddress("$address", "火天物联(HuotianIOT)"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
    // $mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
    $mail->IsHTML(true);//是否使用HTML格式
    $mail->Subject = $title; //邮件标题
    $mail->Body = $body; //邮件内容，上面设置HTML，则可以是HTML
    try{
    	 if (!$mail->Send()) {
  	   	$errCode=-1;
  	 	$errMsg= $mail->ErrorInfo;
  	  }
    }
    catch(Exception $e)
    {
    	  $errCode=-2;
    	  $errMsg=$e;
    }
   
    return ['errCode'=>$errCode,'errMsg'=>$errMsg];
  }

?>