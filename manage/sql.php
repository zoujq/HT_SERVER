<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
 
  function create_devices($d_p_id,$nums)
  {
    $auth=0;
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    // $sql = "INSERT INTO `serversql`.`device_info_tb` ( `htd_id`, `d_p_id`, `d_secretkey`) VALUES 
    //         ( '21', '232', '4344')";
    // $result =$conn->query($sql);
    $time_stamp=time();
    echo $time_stamp;

    echo dechex($time_stamp);

    return array('errCode'=>0,'errMsg'=>'bind ok!');
   
  
  }
  

?>

        