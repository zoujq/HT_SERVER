<?php
  require_once './send_email_fun.php';

  $to_addr=$_REQUEST["to"];
  $title=$_REQUEST["title"];
  $body=$_REQUEST["body"];

  
 
  echo json_encode(send_email($to_addr,$title,$body));


?>