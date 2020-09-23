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

   
    $time_stamp=time();
    //echo $time_stamp;

    $c1= dechex($time_stamp);
    if($nums>65535)
    {
      $nums=65535;
    }
    $d_secretkey='';
    $htd_id='';
    $c3='';
    $ret='';
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
      else
      {
        $c3='';
      }
      
      $htd_id= $c1 . $c3 . $c2 . '<br />';
      $d_secretkey=strtolower(base64_encode(mt_rand(100001,999999)));

      $ret .= "('".$d_p_id."','".$htd_id."','".$d_secretkey."'),";

    }

    $ret= chop($ret,',');

    $sql = "INSERT INTO `serversql`.`device_info_tb` (  `d_p_id`, `htd_id`, `d_secretkey`) VALUES $ret";
    $result =$conn->query($sql);
    //echo  $sql;
    return array('errCode'=>0,'errMsg'=>'create success','start'=>$c1.'0000');
   
  
  }
  

?>

        