<?php

// require_once './sql.php';


	$to = "904087449@qq.com";
	$subject = "Test mail";
	$message = "Hello! This is a simple email message.";
	$from = "zoujq@huotiantech.com";
	$headers = "From: $from";
	mail($to,$subject,$message,$headers);
	echo "Mail Sent.";



?>