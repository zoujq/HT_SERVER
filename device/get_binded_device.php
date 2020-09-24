<?php
require_once './sql.php';

$htu_id= $_GET["htu_id"];
$ht_token= $_GET["ht_token"];


echo json_encode(get_binded_device($htu_id,$ht_token));
?>