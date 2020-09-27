<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
 
  // ini_set("display_errors", "On");//打开错误提示
  // ini_set("error_reporting",E_ALL);//显示所有错误

  function bind_device($htu_id,$ht_token,$htd_id)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    if(check_token($conn,$htu_id,$ht_token)==1)
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
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    if(check_token($conn,$htu_id,$ht_token)==1)
    {
      $sql = "DELETE FROM `device_bind_tb` WHERE `htd_id` = '".$htd_id."'";
      $result =$conn->query($sql);

      return array('errCode'=>0,'errMsg'=>'unbind ok!');
    }
   
    return array('errCode'=>-1,'errMsg'=>'auth failed!');
  }
 function get_binded_device($htu_id,$ht_token)
 {
    $ret=array();
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    
    if(check_token($conn,$htu_id,$ht_token)==1)
    {
      $htd_id_arr=get_htd_id_by_htu_id($conn,$htu_id);
      foreach ($htd_id_arr as $htd_id)
      {
          array_push($ret, get_product_by_htd_id($conn,$htd_id)) ;
      }
      return array('errCode'=>0,'errMsg'=>'get device list success','list'=>$ret);
    }
   
    return array('errCode'=>-1,'errMsg'=>'auth failed!');
 }
 function get_htd_id_by_htu_id($conn,$htu_id)
 {
    $htd_id_arr=array();
    $sql = "SELECT * FROM `device_bind_tb` WHERE `htu_id` = '".$htu_id."'";
    $result =$conn->query($sql);
    $i=0;
    if ($result->num_rows > 0) 
    {
      // 输出数据
      while($row = $result->fetch_assoc()) 
      {
        array_push($htd_id_arr,$row["htd_id"] );             
      }
    }
    return $htd_id_arr;
 }
 function get_product_by_htd_id($conn,$htd_id)
 {
    $ret=array();
    $htp_id='';
    $sql = "SELECT * FROM `device_info_tb` WHERE `htd_id` = '".$htd_id."'";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
      // 输出数据
      while($row = $result->fetch_assoc()) 
      {
        $htp_id=$row["htp_id"];             
      }
    }

    $sql = "SELECT * FROM `product_tb` WHERE `htp_id` = $htp_id";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
      // 输出数据
      while($row = $result->fetch_assoc()) 
      {
        array_push($ret,$htd_id,$row["htp_id"],$row["p_name"],$row["p_icon"]) ;             
      }
    }

    return $ret;

 }
 function check_token($conn,$htu_id,$ht_token)
 {
    $sql = "SELECT * FROM `user_auth_tb` WHERE `htu_id` = '".$htu_id."' AND `a_type`='ht_token'";
    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          if($row["a_data1"] ==$ht_token)
          {
            return 1;
          }      
        }
    }
    return 0; 
 }
 function get_product_info($htu_id,$ht_token,$htp_id,$htd_id)
 {
    $find_htp_id=0;
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    
    if(check_token($conn,$htu_id,$ht_token)!=1)
    {
      return array('errCode'=>-1,'errMsg'=>'auth failed!');
    }
 
    $sql = "SELECT * FROM `device_info_tb` WHERE `htd_id` = '".$htd_id."'";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
      // 输出数据
      while($row = $result->fetch_assoc()) 
      {
        $find_htp_id=$row["htp_id"];             
      }
    }
    var_dump($result);
    var_dump($sql);
    var_dump($find_htp_id);

    if($find_htp_id==0){
      return array('errCode'=>-2,'errMsg'=>'device htd_id error!');
    }
    if($find_htp_id != $htp_id)
    {
      return array('errCode'=>-3,'errMsg'=>'device htd_id not match htp_id!');
    }

    $sql = "SELECT * FROM `product_tb` WHERE `htp_id` = $htp_id";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
      // 输出数据
      while($row = $result->fetch_assoc()) 
      {
        return array('errCode'=>0,'errMsg'=>'','htp_id'=>$row["htp_id"],'p_name' =>$row["p_name"],'p_icon'=> $row["p_icon"]) ;             
      }
    }
    return array('errCode'=>-4,'errMsg'=>'htp_id error! ');

 }

?>

        