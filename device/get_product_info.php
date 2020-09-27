<?php
	ini_set("display_errors", "On");//打开错误提示
	ini_set("error_reporting",E_ALL);//显示所有错误
	require_once './sql.php';


	$htu_id= $_GET["htu_id"];
	$ht_token= $_GET["ht_token"];
	$p_id= $_GET["p_id"];
	$htd_id= $_GET["htd_id"];


	// echo json_encode(get_product_info($htu_id,$ht_token,$p_id,$htd_id));
?>