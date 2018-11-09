<?php
session_start();
include ('cnxbd.php');
$db=cnx();
if (!$db) {
	session_destroy();
}
if (isset($_POST['SignUp'])) {
	

$name=$_POST['username'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];


$insert=mysql_query("insert into test values('','$name','$email','$pwd',0)");
if (!$insert) {
	session_destroy();
}
$num=rand(1000,10000);
$insert=mysql_query("select id from test where user= '$name' and pass = '$pwd'");
if ($insert) {
	$ligne=mysql_fetch_array($insert,MYSQL_NUM);
	$_SESSION['id']=$ligne[0];
}

$_SESSION['num']=$num;
$_SESSION['username']=$name;
$_SESSION['pwd']=$pwd;
$_SESSION['email']=$email;
include ('mailer.php');
$s=sendMail($email,$name,$num);
header('Location: confirmer.php');
exit();
}







