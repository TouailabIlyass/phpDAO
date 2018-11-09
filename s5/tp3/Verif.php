<?php
	
require_once('Dao.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){

   $in=new Dao('myDB');

   $in->insert('emp',$_POST);
   header('Location: Affiche.php');
}
