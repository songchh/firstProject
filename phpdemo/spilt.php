<?php 

$addrList = array(
	'192.168.1.1' => array(
		 '1', '2', '3', '4'
	),
        '192.168.1.2' => array(
                 '1', '2', '3', '4'
	),
);

foreach ($addrList as $ip => $addr) {
	foreach($addr as $detail) {
		echo crc32($ip.$detail).PHP_EOL;	
	}
}
