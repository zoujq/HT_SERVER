<?php
$js_code= $_GET["js_code"];

$s = file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid=wxb0eded63df8e4326&secret=65b09e232781a64258ecc64d0e5a8dd8&js_code=$js_code&grant_type=authorization_code");

echo $s;
?>