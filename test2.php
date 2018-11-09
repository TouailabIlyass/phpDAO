
<?php

$x="ok";

$hi=function() use($x)
{


echo $x;

};
echo $hi();
$x="hello";
echo $hi();

function bb(){

echo "hello";
}

echo bb();
$x="bb";
$x();


?>
