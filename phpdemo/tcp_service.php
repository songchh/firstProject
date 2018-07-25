<?php

$host = '127.0.0.1';
$port = 83453;

$service = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_block($service);
socket_bind($service, $host, $port);
socket_listen($service);

do {
    $msgSock = socket_accept($service);
    $buff = socket_read($msgSock, 8192);
    echo $buff. PHP_EOL;

    if ($buff == "bye".PHP_EOL) {
        socket_close($msgSock);
        break;
    }
    $an = "hello!".PHP_EOL;
    $buff = socket_write($msgSock, $an, strlen($an));
    socket_close($msgSock);
} while(1);

socket_close($service);