<?php

interface strategy
{
	public function travel();
} 

class car implements strategy
{
	
	public function travel()
	{
		print "this is car\n";
	}

}

class shap implements strategy
{
	public function travel()
	{
		print "this is shap\n";
	}
}

class people
{
	public function travel(strategy $obj)
	{
		$obj->travel();
	}
}

$strag = new shap();
$refClass = new ReflectionClass('people');
$people = $refClass->newInstance();
$refMethod = $refClass->getMethod('travel');
$refMethod->invoke($people, $strag);




