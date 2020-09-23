<?php
require_once './sql.php';

$d_p_id=$_GET["d_p_id"];
$nums=$_GET["nums"];


//echo json_encode(create_devices($d_p_id,$nums));

 	$ret1='';
    $c3='';
    $c2='';
    for($i=0;$i<$nums;$i++)
    {
      $c2=dechex($i);
      $len=stlen($c2);
      // if($len==1)
      // {
      //   $c3='000';
      // }
      // else if($len==2)
      // {
      //   $c3='00';
      // }
      // else if($len==3)
      // {
      //   $c3='0';
      // }
      
      $ret1=$ret1 . $c1 . $c3 . $c2 . '<br />';

    }
    echo $ret1;
    echo '123';
?>