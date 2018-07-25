<?php

$host = "127.0.0.1";
$port = 83453;

$client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($client, $host, $port);

$msgList = array(
    "test".PHP_EOL,
    'bye'.PHP_EOL,
);

socket_write($client, $msgList[rand(0,1)], strlen($msgList[rand(0,1)]));

while ($buff = socket_read($client, 1024)) {
    echo("Response was:" . $buff . "\n");
}
socket_close($client);