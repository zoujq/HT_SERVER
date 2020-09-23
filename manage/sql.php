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

    $ret1='';
    for($i=0;$i<$nums;$i++)
    {
      $c2=dechex($i);
      if(stlen($c2)==1)
      {
        $c2='000'.$c2;
      }
      else if(stlen($c2)==2)
      {
        $c2='00'.$c2;
      }
      else if(stlen($c2)==3)
      {
        $c2='0'.$c2;
      }
      else if(stlen($c2)==4)
      {
      }

      
      echo $c1.$c2.'<br />';

    }


    return array('errCode'=>0,'errMsg'=>'bind ok!');
   
  
  }
  

?>

        