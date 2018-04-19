<?php

class adaptee
{
	public function hello()
	{
		echo "hello";
	}

	//public function world()
	public function greate()
	{
		echo "world";
	}
}

class adapter1 extends adaptee
{
	public function world()
	{
		parent::greate();
	}
}

class adapter2
{
	private $handle;
	public function __construct(adaptee $handle)
	{
		$this->handle = $handle;
	}

	public function hello()
	{	
		$this->handle->hello();
	}

	public function world()
	{
		$this->handle->greate();
	}
}

class client
{
	public function run()
	{
		//$target = new adaptee();
		//$target = new adapter1();
		$target = new adapter2(new adaptee());

		$target->hello();
		$target->world();
	}
}


$obj = new client();
$obj->run();

echo PHP_EOL;
