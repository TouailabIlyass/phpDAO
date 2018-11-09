<?php

class myclass{

private const i=10;
private static $x=2;

  public function ok(){

  echo __CLASS__;
}

public static function bb(){

echo self::b();
}

private static function b(){

echo "bbb";
}

}

$x= new myclass();

$x->ok();
myclass::bb();



