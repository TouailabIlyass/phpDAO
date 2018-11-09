<?php
	
require_once('DaoEmp.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){

   $in=new DaoEmp();

   $in->insert('myDB','emp',$_POST);
   header('Location: AfficheClient.php');
}
