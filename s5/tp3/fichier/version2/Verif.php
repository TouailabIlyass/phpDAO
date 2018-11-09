<?php
	
require_once('Dao.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $t=array_keys($_POST);
	
   $in=new Dao('myDB');

  $in->insert($t[count($t)-1],$_POST);
  $in->getList($t[count($t)-1]);
   //header('Location: Affiche.php');


	//print_r($_POST);
	

	
	
}
