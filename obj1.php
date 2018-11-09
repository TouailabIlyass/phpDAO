<?php



class test
{
  public static $NN = "jj";
  protected $o="ok";
  private $s=5;
  const NAME="ba3";

public function getS()
{
  return $this->o;
}

}

$var = new test;


var_dump($var);

echo "hello ".$var->getS();

echo "Const ".test::NAME;
echo "<br>".test::$NN;
