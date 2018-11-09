<?php


require_once 'Cnx_bd.php';


$con=Cnx_bd::CNX('myDB');


$stmt=$con->prepare('select * from emp');
#$n='ilyase';
#$stmt->bindParam(':n',$n);

class Emp{


}

$stmt->execute();

if($stmt->rowCount())
{
echo '<br>';
$stmt->setFetchMode(PDO::FETCH_LAZY);
$ar=$stmt->fetch();

echo 'your name is '.$ar['nom'].'<br/>';

$stmt->closeCursor();
}
else echo 'no';
/*
try{
$con->beginTransaction();
$stmt=$con->prepare('insert into emp values(3,"ok","ok","dept")');
$stmt->execute();
if($stmt->rowCount())
{
echo 'ajouter '.$con->lastInsertId();
}


$stmt=$con->prepare('select * from emp');
$stmt->execute();
$con->commit();


}catch(PDOException $e)
{
$con->rollback();
die($e->getMessage());
}
*/

echo '<br> <br>'; 

#$stmt=$con->prepare('select nom ,emp.*  from emp group by nom');

#$stmt->execute();
#echo '<pre> '.print_r($stmt->fetchAll(PDO::FETCH_UNIQUE),true).'</pre>';

#$stmt=$con->prepare('select nom ,emp.*  from emp');

#$stmt->execute();

#echo '<pre> '.print_r($stmt->fetchAll(PDO::FETCH_GROUP),true).'</pre>';


$stmt=$con->prepare('select id,nom  from emp group by nom');

$stmt->execute();

echo '<pre> '.print_r($stmt->fetchAll(PDO::FETCH_KEY_PAIR),true).'</pre>';

