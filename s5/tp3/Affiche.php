<?php
require_once 'Dao.php';


$do= new Dao('myDB');
$do->getEmp('emp');
echo $do->createTab();

?>
