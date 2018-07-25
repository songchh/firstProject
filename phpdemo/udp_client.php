<?php

error_reporting(E_ALL);
set_time_limit(0);


$server_ip = '127.0.0.1';
$server_port = 59300;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP))) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

//if( !socket_bind($sock, "127.0.0.1" , 59301) ) {
//    $errorcode = socket_last_error();
//    $errormsg = socket_strerror($errorcode);
//    die("Could not bind socket : [$errorcode] $errormsg \n");
//}
//Communication loop
echo "Socket connected \n";
socket_connect($sock,$server_ip,$server_port);
while(1) {

    //Take some input to send

    echo 'Enter a message to send : ';
    $input = fgets(STDIN);

    //Send the message to the server
    socket_write($sock,$input,strlen($input));
    $read_sockets = array($sock);
    $write_sockets = array();
    $except_sockets = array();
    socket_select($read_sockets,$write_sockets,$except_sockets,5);
    if(in_array($sock,$read_sockets)){
        $reply = socket_read($sock,1024);
    } else {
        echo 'not connect';
        break;
    }
//    if( ! socket_sendto($sock, $input , strlen($input) , 0 , $server , $port)) {
//
//        $errorcode = socket_last_error();
//
//        $errormsg = socket_strerror($errorcode);
//
//        die("Could not send data: [$errorcode] $errormsg \n");
//
//    }

    //Now receive reply from server and print it

//    if(socket_recv ( $sock , $reply , 2045 , MSG_WAITALL ) === FALSE) {
//
//        $errorcode = socket_last_error();
//
//        $errormsg = socket_strerror($errorcode);
//
//        die("Could not receive data: [$errorcode] $errormsg \n");
//
//    }

    echo "Reply : $reply";
}