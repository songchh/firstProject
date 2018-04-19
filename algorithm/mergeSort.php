<?php

function mergeSort($array1, $array2)
{
	$count1 = count($array1);
	$count2 = count($array2);
	
	$i = $j = $k = 0;
	$newArray = array();
	while ($i < $count1 && $j < $count2) {
		if ($array1[$i] < $array2[$j]) {
			$newArray[$k] = $array1[$i];
			$i++;
		} else {
			$newArray[$k] = $array2[$j];
			$j++;
		}
		$k++;
	}
	while($i < $count1) {
		$newArray[$k] = $array1[$i];
		$k++; $i++;
	}
	while($j < $count2) {
		$newArray[$k] = $array2[$j];
		$k++; $j++;
	}
	return $newArray;
}


$array1 = array(1, 2, 4, 5, 8);
$array2 = array(3, 4, 6 , 7, 9);

$result = mergeSort($array1, $array2);

print_r($result);
