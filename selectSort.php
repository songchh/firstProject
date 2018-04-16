<?php


function selectSort(&$array)
{
	$count = count($array);
	for($i = 0; $i < $count - 1; $i++) {
		$index = $i;
		for($j = $i + 1; $j < $count; $j++) {
			if ($array[$j] < $array[$index]) {
				$index = $j;
			}
		}
		$temp = $array[$i];
		$array[$i] = $array[$index];
		$array[$index] = $temp;
	}		
}


$test = array(2, 3, 1, 5, 7, 4);
selectSort($test);

print_r($test);
