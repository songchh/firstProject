<?php

interface car
{
	public function getName();
}

interface factory
{
	public function getProduct();
}

class bmw320 implements car
{
	public function getName()
	{
		return sprintf("this is %s", __CLASS__);
	}
}


class bmw320factory implements factory
{
	public function getProduct()
	{
		return new bmw320;
	}
}


class client
{
	public function getCar($carName)
	{
		$factoryName = $carName."factory";
		$reflection = new ReflectionClass($factoryName);
		$factory = $reflection->newInstance();
		return $factory->getProduct()->getName();
	}
}


$obj = new client();
echo $obj->getCar($argv[1]), PHP_EOL;
