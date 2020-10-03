<?php
  ini_set("display_errors", "On");//打开错误提示
  ini_set("error_reporting",E_ALL);//显示所有错误
  require_once './send_email_fun.php';

  $code=$_REQUEST["code"];
  $email=$_REQUEST["email"];

 
  // 创建连接 $servername ,$username,$password,$dbname
  $conn = new mysqli("localhost", "serveruser", "kskdfjdf", "serversql");
 
  
  $errCode=var_code_fun($conn, $email,$code);
  if($errCode==0)
  {
    echo json_encode(check($email));
  }
  else
  {
    echo json_encode(['errCode'=>$errCode,'errMsg'=>'fail']);
  }





  function var_code_fun($conn, $email,$code)
  {

    // 检测连接 
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM `var_code_tb` WHERE `v_data` ='".$email."' ORDER BY `num` DESC LIMIT 1 ";
    var_dump($sql);

    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          if($code==$row["v_code"])
          {
            return 0;
          }          
        }
    } 
    return -1;
  }
  function check($conn,$email){
  	$htu_id=0;
  	$ht_token='';
  	$sql = "SELECT * FROM `user_info_tb` WHERE `u_email` ='".$email."'";

    $result =$conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // 输出数据
        while($row = $result->fetch_assoc()) 
        {
          $htu_id=$row["htu_id"];        
        }
    } 
    if($htu_id!=0)
    {
      	$ht_token=get_ht_token($conn,$htu_id);
      	return array( 'errCode'=>0,"htu_id"=>$htu_id,"ht_token"=>$ht_token);
    }
    else{
    	$htu_id=insert_user_info($conn,$email);
    	$ht_token=insert_ht_token($conn,$htu_id);
    	return array('errCode'=>0,"htu_id"=>$htu_id,"ht_token"=>$ht_token);
    }
  }
  function insert_user_info($conn,$email)
  {
    $sql = "INSERT INTO `serversql`.`user_info_tb` (`u_email`) VALUES ('".$email."')";
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
  function insert_ht_token($conn,$htu_id)
  {
    $ht_token=md5(mt_rand().'_');
    $sql = "INSERT INTO `serversql`.`user_auth_tb` ( `htu_id`, `a_type`, `a_data1`) VALUES ( 
    $htu_id, 'ht_token','".$ht_token."')";
    $result =$conn->query($sql);

    return $ht_token;
  }
  


?>

        