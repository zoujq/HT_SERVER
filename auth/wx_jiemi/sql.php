<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";

 
  function regist_user($p_arr)
  {
      // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $nickName=$p_arr['nickName'];
    $avatarUrl=$p_arr['avatarUrl'];
    $gender=$p_arr['gender'];
    $language=$p_arr['language'];
    $city=$p_arr['city'];
    $province=$p_arr['province'];
    $country=$p_arr['country'];
    $openId=$p_arr['openId'];
    $unionId=$p_arr['unionId'];

    $htu_id=check_exist($conn, $unionId);
    if($htu_id!=0)
    {
      insert_auth_info($conn,$htu_id,$openId,$unionId);
      $ht_token=get_ht_token($conn,$htu_id);
      return array("htu_id"=>$htu_id,"ht_token"=>$ht_token);
    }

    $htu_id=insert_user_info($conn,$nickName,$avatarUrl, $gender,$language, $city,$province,$country);
    insert_auth_info($conn,$htu_id,$openId,$unionId);
    $ht_token=insert_ht_token($conn,$htu_id);

    return array("htu_id"=>$htu_id,"ht_token"=>$ht_token);
  }

  function check_exist($conn,$unionId)  
  {
    $sql = "SELECT * FROM `user_auth_tb` WHERE `a_data2` ='".$unionId."'";

    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
            return $row["htu_id"] ;
        }
    } 

    return 0;
  }

  function insert_user_info($conn,$nickName,$avatarUrl, $gender,$language, $city,$province,$country)
  {
    $sql = "INSERT INTO `serversql`.`user_info_tb` (`u_name`, `u_img`, `u_gender`, `u_language`, `u_city`, `u_province`, `u_country`) VALUES ('".$nickName."','".$avatarUrl."','".$gender."','".$language."', '".$city."','".$province."','".$country."' )";
    $result =$conn->query($sql);
    $sql = "SELECT `htu_id` FROM `user_info_tb` ORDER BY `htu_id` DESC LIMIT 0,1";

    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
            return $row["htu_id"] ;
        }
    } 

  }
  function insert_auth_info($conn,$htu_id,$openId,$unionId)
  {
    $sql = "INSERT INTO `serversql`.`user_auth_tb` ( `htu_id`, `a_type`, `a_data1`, `a_data2`) VALUES ( 
    $htu_id, 'wx_mini','". $openId."','".$unionId."')";
    $result =$conn->query($sql);
  }

  function insert_ht_token($conn,$htu_id)
  {
    $ht_token=md5(mt_rand().'_');
    $sql = "INSERT INTO `serversql`.`user_auth_tb` ( `htu_id`, `a_type`, `a_data1`) VALUES ( 
    $htu_id, 'ht_token','".$ht_token."')";
    $result =$conn->query($sql);

    return $ht_token;
  }
  function get_ht_token($conn,$htu_id)
  {
    $sql = "SELECT * FROM `user_auth_tb` WHERE `htu_id` = $htu_id AND `a_type`='ht_token'";

    $result =$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
            return $row["a_data1"] ;
        }
    } 
  }

?>

        