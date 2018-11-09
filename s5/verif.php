<?php

require "Personnage.php";

$pers= new Personnage($_POST['name'],$_POST['age'],$_POST['grad']);
session_start();
$_SESSION['pers1']=serialize($pers);
header('Location:verif2.php');
