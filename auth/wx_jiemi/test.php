<?php

require_once './sql.php';

echo "string2";

$p_arr=array();
$p_arr['nickName']='nickName';
$p_arr['avatarUrl']='01';
$p_arr['gender']=1;
$p_arr['language']='012';
$p_arr['city']='013';
$p_arr['province']='014';
$p_arr['country']='015';
$p_arr['openId']='021';
$p_arr['unionId']='021';

var_dump(regist_user($p_arr)) ;

?>