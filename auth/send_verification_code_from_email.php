<?php
 require_once './email/send_email_fun.php';

  $to_addr=$_REQUEST["to"];
  $title='火天物联(HuotianIOT)验证码';
  $body="";

  // 创建连接 $servername ,$username,$password,$dbname
  $conn = new mysqli("localhost", "serveruser", "kskdfjdf", "serversql");


  $code=mt_rand(1000,9999);

  send_email($to_addr,$title,$body); 
  function creat_verification_code($conn, $to_addr,$code)
  {
    // 检测连接 
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `serversql`.`var_code_tb` (`v_type`, `v_data`, `v_code`) VALUES ( 'email', '".$to_addr."', '".$code."')";

    $result =$conn->query($sql);
  }

  echo json_encode();

?>

        