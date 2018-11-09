<?php
require_once 'Dao.php';


$do= new Dao('myDB');
$do->getList('user');
//echo $do->createTab();


?>
