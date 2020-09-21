<?php
  $servername = "localhost";
  $username = "serveruser";
  $password = "kskdfjdf";
  $dbname = "serversql";
   




 
  function get_detials($P_id,$P_title)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `P_detial_table` WHERE `P_id` =$P_id";
    if($P_title!=NULL)
    {
      $sql = "SELECT * FROM `P_detial_table` WHERE `P_title` ='".$P_title."'";
    }
    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
            return array("P_title"=>$row["P_title"],"P_gaiyao"=>$row["P_gaiyao"],"P_xiangqing"=>$row["P_xiangqing"],
              "P_canshu"=>$row["P_canshu"],"P_fanwei"=>$row["P_fanwei"]) ;
        }
    } 

    return 0;
  }

  function get_fangan($fangan)
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 


    $sql = "SELECT `P_id`,`P_title` FROM `P_detial_table` WHERE `P_class` ='".$fangan."' ORDER BY `P_order`";
    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        $ret=array();
        while($row = $result->fetch_assoc()) 
        {
            $ret[]=$row["P_title"];
        }
        return $ret;
    } 

    return 0;
  }

  function get_tuijian()
  {
    // 创建连接
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
     
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 


    $sql = "SELECT `P_id`,`P_title`,`P_biaoyu`,`P_gaiyao`,`P_zhutu`  FROM `P_detial_table` WHERE `P_state` = 3 ORDER BY `P_order` DESC LIMIT 6";
    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        $ret=array();
        while($row = $result->fetch_assoc()) 
        {
            $ret[]=array($row["P_id"],$row["P_title"],$row["P_gaiyao"],$row["P_zhutu"],$row["P_biaoyu"]);
        }
        return $ret;
    } 

    return 0;

  }

?>

        