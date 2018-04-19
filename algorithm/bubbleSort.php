<?php

function bubbleSort(&$array) 
{
	$count = count($array);
	for($i = 1; $i < $count; $i++) {
		for($j = 0; $j < $count - $i; $j ++) {
			if ($array[$j] < $array[$j+1]) {
				$temp = $array[$j+1];
				$array[$j+1] = $array[$j];
				$array[$j] = $temp;
			}
		}
	}
}


$array = array(1, 4, 5, 6, 2, 3);
bubbleSort($array);

print_r($array);
