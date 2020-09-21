<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";

 
  function check_exist($unionId)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `user_auth_tb` WHERE `a_data2` =$unionId";

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

  function regist($p_arr)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    // $sql = "INSERT INTO `serversql`.`user_info_tb` (`u_name`, `u_img`, `u_gender`, `u_language`, `u_city`, `u_province`, `u_country`) VALUES ( $p_arr['nickName'], $p_arr['avatarUrl'], $p_arr['gender']
    // ,$p_arr['language'], $p_arr['city'], $p_arr['province'], $p_arr['country'])";

     // $sql = "INSERT INTO `serversql`.`user_info_tb` (`u_name`, `u_img`, `u_gender`, `u_language`, `u_city`, `u_province`, `u_country`) VALUES ('mm','mm',0,'mm','dd','ff','dd')";

    //$result =$conn->query($sql);

    var_dump("$p_arr['province']");
    // if ($result->num_rows > 0) 
    // {
    //     // 输出数据
    //     while($row = $result->fetch_assoc()) 
    //     {
    //         return $row["htu_id"] ;
    //     }
    // } 
  }


?>

        