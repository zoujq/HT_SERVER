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
    //echo $time_stamp;

    $c1= dechex($time_stamp);
    if($nums>65535)
    {
      $nums=65535;
    }

    for($i=0;$i<$nums;$i++)
    {
      $c2=dechex($i);
      $len=strlen($c2);
      if($len==1)
      {
        $c3='000';
      }
      else if($len==2)
      {
        $c3='00';
      }
      else if($len==3)
      {
        $c3='0';
      }
      
      echo $c1 . $c3 . $c2 . '<br />';

    }

    //echo $ret1;
    return array('errCode'=>0,'errMsg'=>'bind ok!');
   
  
  }
  

?>

        