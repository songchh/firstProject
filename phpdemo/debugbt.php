<?php

class test
{
	public function __construct()
	{
		$this->name = "songchunhui";
	}

	public function __call($func, $param) {
		trigger_error(__CLASS__." method not exists", E_USER_WARNING);
	}

	public function callTest()
	{
		$param = func_get_args();
		$className = array_shift($param);
		$obj = new ReflectionClass($className);
		$handle = $obj->newInstance();
		$func = array_shift($param);
		$handle->$func($param);
	}
}


class func {
	public function test($array)
	{
		$bt = debug_backtrace();
		print_r($bt);
	}
}

$obj = new ReflectionClass('test');
$test = $obj->newInstance();

$test->callTest('func', 'test', [1,2,3]);
