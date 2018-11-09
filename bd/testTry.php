<?php
$pdo;
try{



$GLOBALS['pdo'] = new PDO("mysql:host=localhost;dbname=myDB;charset=utf8",'root',''
,[   
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES => false,
     PDO::ATTR_PERSISTENT => true
]);

}catch(PDOException $e)
{
  die('erreur');
}

function test($a)
{
	if (!is_numeric($a)) {
		throw new Exception("Error Processing Request");
		
	}

	return $a/2;
}

$str='ilyase';
try{
echo test($str);
}catch(Exception $e)
{
	die('ok');
}