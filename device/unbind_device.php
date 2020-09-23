<?php
require_once './sql.php';

$htu_id= $_GET["htu_id"];
$ht_token= $_GET["ht_token"];
$htd_id=$_GET["htd_id"];



echo json_encode(unbind_device($htu_id,$ht_token,$htd_id));
?>