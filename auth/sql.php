<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
 
  function get_htu_id_and_token($openId)
  {
    $htu_id=0;
    $ht_token=0;
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `user_auth_tb` WHERE `a_data1` = '".$openId."'";

    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          $htu_id=$row["htu_id"];          
        }
    } 
    if($htu_id !=0)
    {
      $sql = "SELECT * FROM `user_auth_tb` WHERE `htu_id` = $htu_id";
      $result =$conn->query($sql);
      if ($result->num_rows > 0) 
      {
          // 输出数据
          while($row = $result->fetch_assoc()) 
          {
            $ht_token=$row["a_data1"];          
          }
      } 
    }
    return array('htu_id'=>$htu_id,'ht_token'=$ht_token);
  }

 

?>

        