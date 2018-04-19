<?php

class single
{
	private static $instance;

	private function __construct()
	{
	}
	
	private function __clone()
	{}
	
	public static function getInstance()
	{
		if (!is_object(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __call($func, $args)
	{
		print "call method ". $func . " not exists\n";
	}
}


$instance = single::getInstance();
$instance->getName();
