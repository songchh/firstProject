<?php 

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, '127.0.0.1', 6379);

while(1) {
        echo "input:";
        $input = fgets(STDIN);
        $isQuit = preg_match('/quit/', $input);
        socket_write($socket, $input, strlen($input));
        $output = socket_read($socket, 1024);
        echo $output;
        if ($isQuit) {
                break;
        }
}

socket_close($socket);
