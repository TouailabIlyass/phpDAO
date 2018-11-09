<?php



class Test implements IteratorAggregate{ 

private $id,$nom;

function __construct($i,$n)
{
$this->id=$i;
$this->nom=$n;
}

function getIterator()
{
$tab[]=$this->id;
$tab[]=$this->nom;
 return new ArrayIterator($tab);
}

}

$obj= new Test(1,'ilyase');


foreach($obj as $v)
{
echo $v;
}


function Iterat(iterable $items)
{

foreach($items as $item)
{
echo $item;
}

}



Iterat($obj);


$a;
$a = $a ?? 'ahmed';
echo $a;
