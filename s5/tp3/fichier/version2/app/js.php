<?php


class User 
{
	public $i;
	function __construct($i)
	{
		$this->i=$i;
	}
}

$obj=new User('ilyase');
$var=json_encode($obj);


echo $var;

echo json_decode($var)->i;