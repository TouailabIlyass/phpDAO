<?php

session_start();
require_once 'Dao.php';
$d= new Dao('datauser');
require_once('User.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(isset($_POST['login'])){
  	if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $user=new User('','','',$_POST['username'],$_POST['password']);
    $_SESSION['user']=serialize($user);
    unset($user);
    header('Location: check.php');
  }
}



else if(isset($_POST['signin'])){
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {

		$user= new User('',$_POST['nom'],$_POST['prenom'],$_POST['username'],$_POST['password'],$_POST['email']);

		$_SESSION['createUser']=serialize($user);
		unset($user);
		header('Location: check.php');

		
	}



}

}
