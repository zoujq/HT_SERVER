<?php
require_once './sql.php';

$htu_id= $_GET["htu_id"];
$ht_token= $_GET["ht_token"];
$p_id= $_GET["p_id"];


echo json_encode(get_product_info($htu_id,$ht_token,$p_id));
?>