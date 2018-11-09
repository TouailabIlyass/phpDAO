<?php
	session_start();
require_once('Dao.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    
	
   $in=new Dao($_SESSION['dbname']);

  $in->insert($_SESSION['table'],$_POST);
  $in->getList($_SESSION['table']);
   //header('Location: Affiche.php');


	//print_r($_POST);
	
	
}
?>
<a href="phpAdmin.php"></a>