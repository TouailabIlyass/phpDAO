<?php


session_start();


require_once('Dao.php');

if(isset($_SESSION['user'])){

$dao= new Dao('myDB');

$user=unserialize($_SESSION['user']);
print_r($user);
unset($_SESSION['user']);
$username=$user->getUsername();
$password=$user->getPassword();

$existe=$dao->login('user',$username,$username,$password);
print_r($existe);

if($existe!=NULL)
{
     setcookie('ilyase',$username,time()+3600);
     $_SESSION['login']=serialize($existe);
     header('Location: home.php');
}
else
{
	echo "<h1>hello</h1>";
}

}




