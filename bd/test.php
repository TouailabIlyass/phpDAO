<?php

define('LL','<br>');
require_once "Cnx_bd.php";


$bd=Cnx_bd::CNX('myDB');


$stmt=$bd->prepare('select * from emp');

$stmt->execute();



#$result=$stmt->fetch();
echo LL;
#print_r($result);

#while($result=$stmt->fetch()){

#echo "your name : ".$result['nom'].LL;
#}
/*
$stmt->bindColumn(2,$name);
$stmt->bindColumn(3,$pr);

while($stmt->fetch(PDO::FETCH_BOUND))
{

echo "your name : ".$name." and your last name is : ".$pr.LL;

}

*/


while($ar=$stmt->fetch(PDO::FETCH_ASSOC))
{
print_r($ar);

}















