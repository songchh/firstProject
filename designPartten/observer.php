<?php

interface obavailable
{
	public function addServer(observer $server);
}

interface observer
{
	public function notify(obavailable $obj);
}


class target implements obavailable
{
	private $serverList;
	private $account;
	private $name;

	public function __construct($name) 
	{
		$this->name = $name;
	}

	public function addServer(observer $server) 
	{
		$this->serverList[] = $server;		
	} 

	public function addMoney($amount)
	{
		$this->account += $amount;
		foreach ($this->serverList as $server) {
			$server->notify($this);
		}
	}

	public function getName()
	{
		return $this->name;
	}
	
	public function getAccount()
	{
		return $this->account;
	}
}

class serverA implements observer
{
	public function notify(obavailable $obj)
	{
		printf("user %s account changed, now account have $ %s\n", $obj->getName(), $obj->getAccount());
	}
}

$user = new target('songchunhui');

$server = new serverA();

$user->addServer($server);
$user->addMoney(100);





