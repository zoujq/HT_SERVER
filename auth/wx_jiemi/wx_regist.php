<?php

include_once "wxBizDataCrypt.php";
require_once './sql.php';

$appid = 'wxb0eded63df8e4326';
$sessionKey= $_GET["sessionKey"];


$encryptedData=$_GET["encryptedData"];

$iv = $_GET["iv"];

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    //var_dump($data);
    $p_arr=json_decode($data,true);
	$ret=regist_user($p_arr);
	$ret['errCode']=0;
	echo json_encode($ret);

} else {
    var_dump($errCode);
}
