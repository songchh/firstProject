<?php 
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, '127.0.0.1', 11211);

$input = "set songchunhui 0 600 4\r\nsong\r\n";
        socket_write($socket, $input, strlen($input));
        $output = socket_read($socket, 1024);
        echo "output:", $output;
socket_close($socket);
