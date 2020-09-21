<?php

require_once './sql.php';

echo "string1";

$p_arr=array();
$p_arr['avatarUrl']='01';
$p_arr['gender']=1;
$p_arr['language']='012';
$p_arr['city']='013';
$p_arr['province']='014';
$p_arr['country']='015';

 regist($p_arr);

?>