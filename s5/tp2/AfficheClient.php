<?php
require_once 'DaoEmp.php';
$do= new DaoEmp();
$emp=$do->getEmp('myDB','emp');//datauser user
echo $do->createTab();

?>
