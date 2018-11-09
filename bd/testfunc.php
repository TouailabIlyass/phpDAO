<?php


class user{

public $name;

public $pr;

public function __construct($n,$p)
{

$this->name=$n;
$this->pr=$p;
}


}

$u=new user(...[1,2]);

echo $u->name;
