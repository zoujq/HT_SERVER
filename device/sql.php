<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
 
  function bind_device($htu_id,$ht_token,$htd_id)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `user_auth_tb` WHERE `htu_id` = '".$htu_id."' AND `a_type`='ht_token'";
    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          if($row["a_data1"] !=$ht_token)
          {
            return 0;
          }      
        }
    } 

    $sql = "DELETE FROM `device_bind_tb` WHERE `htd_id` = '".$htd_id."'";
    $result =$conn->query($sql);

    $sql = "INSERT INTO `device_bind_tb`(`htu_id`, `htd_id`) VALUES ('".$htu_id."','".$htd_id."')";
    $result =$conn->query($sql);
    return 1;
  }

 

?>

        