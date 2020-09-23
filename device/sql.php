<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
 
  function bind_device($htu_id,$ht_token,$htd_id)
  {
    $auth=0;
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
          if($row["a_data1"] ==$ht_token)
          {
            $auth=1;
          }      
        }
    } 
    if($auth==1)
    {
      $sql = "DELETE FROM `device_bind_tb` WHERE `htd_id` = '".$htd_id."'";
      $result =$conn->query($sql);

      $sql = "INSERT INTO `device_bind_tb`(`htu_id`, `htd_id`) VALUES ('".$htu_id."','".$htd_id."')";
      $result =$conn->query($sql);
      return array('errCode'=>0,'errMsg'=>'bind ok!');
    }
   
    return array('errCode'=>-1,'errMsg'=>'auth failed!');
  }
  function unbind_device($htu_id,$ht_token,$htd_id)
  {
    $auth=0;
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
          if($row["a_data1"] ==$ht_token)
          {
            $auth=1;
          }      
        }
    } 
    if($auth==1)
    {
      $sql = "DELETE FROM `device_bind_tb` WHERE `htd_id` = '".$htd_id."'";
      $result =$conn->query($sql);

      return array('errCode'=>0,'errMsg'=>'unbind ok!');
    }
   
    return array('errCode'=>-1,'errMsg'=>'auth failed!');
  }
 function get_bind_device($htu_id,$ht_token){
    $auth=0;
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
          if($row["a_data1"] ==$ht_token)
          {
            $auth=1;
          }      
        }
    } 
    if($auth==1)
    {
      $sql = "SELECT `htd_id` FROM `device_bind_tb` WHERE `htu_id` = '".$htu_id."'";
      $result =$conn->query($sql);

      if ($result->num_rows > 0) 
      {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          if($row["a_data1"] ==$ht_token)
          {
            $auth=1;
          }      
        }
      } 
    }
   
    return array('errCode'=>-1,'errMsg'=>'auth failed!');
 }

?>

        