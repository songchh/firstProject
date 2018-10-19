<?php
class a {

    public static function func()
    {
       echo __CLASS__.PHP_EOL;
    }
    public function test()
    {
       self::func();
       static::func();
    }
}

class b extends a
{
    public static function func()
    {
        echo __CLASS__.PHP_EOL;
    }
}


$obj = new b();
$obj->test();
