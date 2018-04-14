<?php

function quickSort(&$array, $left, $right)
{
	if ($left >= $right) {
		return ;
	}

	$i = $left;
	$j = $right;
	$key = $array[$i];
	while($i < $j) {
		while($i< $j && $array[$j] >= $key) {
			$j --;
		}
		$array[$i] = $array[$j];
		while($i < $j && $array[$i] <= $key) {
			$i++;
		}
		$array[$j] = $array[$i];
	}
	$array[$i] = $key;
	quickSort($array, $left, $i - 1);
	quickSort($array, $i + 1, $right);
}


$array = array(2, 7, 3, 8, 4, 2, 1, 3);

quickSort($array, 0, count($array) -1);

print_r($array);

