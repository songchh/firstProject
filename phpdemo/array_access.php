<?php

class Test implements \ArrayAccess
{

    public static $redis;
    const TEST_KEY = 'access_test';

    public function __construct()
    {
        if (empty(self::$redis) || !self::$redis instanceof Redis) {
            self::$redis = new Redis();
            self::$redis->connect('127.0.0.1', 6379);
        }
    }

    public function offsetExists($offset)
    {
        return self::$redis->hExists(self::TEST_KEY, $offset);
    }

    public function offsetGet($offset)
    {
        return self::$redis->hGet(self::TEST_KEY, $offset);
    }

    public function offsetSet($offset, $value)
    {
        self::$redis->hSet(self::TEST_KEY, $offset, $value);
    }

    public function offsetUnset($offset)
    {
        self::$redis->hDel(self::TEST_KEY, $offset);
    }
}

$obj = new Test();
$obj['name'] = 'songchunhui';

print_r(isset($obj['name']));

echo $obj['name'];

unset($obj['name']);
