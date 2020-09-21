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
	$openId=$p_arr['openId'];
	$nickName=$p_arr['nickName'];
	$gender=$p_arr['gender'];
	$language=$p_arr['language'];
	$city=$p_arr['city'];
	$province=$p_arr['province'];
	$country=$p_arr['country'];
	$avatarUrl=$p_arr['avatarUrl'];
	$unionId=$p_arr['unionId'];
	$appid=$p_arr['appid'];

	echo $country;
} else {
    var_dump($errCode);
}
