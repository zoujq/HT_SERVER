<?php
use Workerman\Worker;
require_once __DIR__ .'/../Workerman-master/Autoloader.php';


$udp_worker = new Worker('udp://0.0.0.0:5000');

$udp_worker->onMessage = function($connection, $data)
{
    var_dump($data);
    if($data=='["ping"]')
    {
    	$connection->send('["pong"]');
    }
    else
    {
    	$connection->send('["ok"]');

    }
    
};
// 运行worker
Worker::runAll();

?>