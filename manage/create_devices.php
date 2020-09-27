<?php
require_once './sql.php';

$htp_id=$_GET["htp_id"];
$nums=$_GET["nums"];


echo json_encode(create_devices($htp_id,$nums));
	
?>