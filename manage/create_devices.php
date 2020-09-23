<?php
require_once './sql.php';

$d_p_id=$_GET["d_p_id"];
$nums=$_GET["nums"];


echo json_encode(create_devices($d_p_id,$nums));
	
?>