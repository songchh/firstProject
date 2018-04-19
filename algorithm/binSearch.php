<?php


function recursive_search($array, $left, $right, $needle) {
	if ($left <= $right) {
		$mid = floor(($left+$right) /2);

		if ($array[$mid] == $needle) {
			return 1;
		} else if ($array[$mid] > $needle) {
			return recursive_search($array, $left, $mid - 1, $needle);	
		} else {
			return recursive_search($array, $mid + 1, $right, $needle);
		}

	} else {
		return -1;
	}
}

function iteration_search($array, $left, $right, $needle) {
	$result = -1;

	while($left <= $right) {
		$mid = floor(($left + $right) / 2);
		if ($array[$mid] == $needle) {
			$result = 1;
			break;
		} else if($array[$mid] > $needle) {
			$right = $mid - 1;
		} else {
			$left = $mid + 1;
		}
	}

	return $result;
}

$array = array(1, 2, 3, 4, 5, 6);

echo 'recursive : ', recursive_search($array, 0, count($array) -1, $argv[1]), PHP_EOL;
echo 'iteration : ', iteration_search($array, 0, count($array) -1, $argv[1]), PHP_EOL;
