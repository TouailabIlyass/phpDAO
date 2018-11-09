<?php
require_once 'Dao.php';


$do= new Dao('myDB');
$do->getList('user',true,true);
//echo $do->createTab();


?>
