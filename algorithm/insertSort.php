<?php

function insertSort(&$array) 
{
	$count = count($array);
	for ($i = 1; $i < $count; $i++) {
		$temp = $array[$i];
		for ($j = $i - 1; $j >= 0; $j --) {
			if ($temp < $array[$j]) {
				$array[$j + 1] = $array[$j];
				$array[$j] = $temp;
			} else {
				break;
			}
		}
	}
}

$test = array(6, 3, 1, 4, 5);
insertSort($test);

print_r($test);
