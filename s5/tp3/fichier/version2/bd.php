<?php

function connect($db)
{


	try{


	$pdo=new PDO("mysql:host=localhost;dbname=$db",'root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
	return $pdo;
}
catch(PDOException $e)
{
 die('erreur');
}



}

