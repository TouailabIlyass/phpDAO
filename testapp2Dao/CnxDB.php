<?php



function Connection($db)
{
 try{


  $con=new PDO("mysql:host=localhost;dbname=$db;charset=UTF8",'root','',
  [	
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => true,
	PDO::ATTR_EMULATE_PREPARES => false,
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

]);

return $con;
}
catch(PDOException $e)
{
 die($e->getMessage());
}

}
