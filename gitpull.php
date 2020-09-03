<?php
$output = shell_exec('git pull');
echo "<pre>$output</pre>";
echo "version 1.0.2";
?>