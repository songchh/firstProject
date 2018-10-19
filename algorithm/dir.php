<?php


$path1 = $argv[1];
$path2 = $argv[2];

function path($path1, $path2) {

	$pathArr1 = explode('/', $path1);
	$pathArr2 = explode('/', $path2);
	
	$count1 = count($pathArr1);
	$count2 = count($pathArr2);
	
	for($i = 0; $i < $count2; $i ++) {
		if (!isset($pathArr1[$i])) {
			break;
		}
		if ($pathArr1[$i] != $pathArr2[$i]) {
			break;
		}
	}
	$revPath = array();
	if ($i < $count2) {
		$revPath = array_fill(0, $count2 - $i, '..');
	}
	$revPath = array_merge($revPath, array_slice($pathArr1, $i));
	return implode('/', $revPath);
}

echo path($path1, $path2).PHP_EOL;
