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
            
          }      
        }
    } 
    if($htu_id !=0)
    {
      $sql = "SELECT * FROM `user_auth_tb` WHERE `htu_id` = $htu_id AND `a_type`= 'ht_token'" ;
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
    return array('htu_id'=>$htu_id ,'ht_token'=>$ht_token);
  }

 

?>

        