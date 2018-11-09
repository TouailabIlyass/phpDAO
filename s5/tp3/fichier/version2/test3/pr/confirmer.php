<?php
session_start();

if (isset($_SESSION['num'])) {
if (isset($_POST['code'])) {
	if ($_SESSION['num']==$_POST['incode']) {
       include ('cnxbd.php');
			$db=cnx();
			if (!$db) {
				session_destroy();
			}
$id=$_SESSION['id'];
$insert=mysql_query("update test set Confermed=1 where id=$id");
if ($insert) {
	$_SESSION['confirmer']=0;
header('Location: conf.php ');
		exit();
}
		
	}

}
}
else if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
	include ('cnxbd.php');
			$db=cnx();
			
	$id=$_SESSION['id'];
	$insert=mysql_query("select Confermed from test where id=$id");
	if (!$insert || !$db) {
		
		      header('Location: login.php');
			      exit();
	}
	
	$count=mysql_num_rows($insert);
	if ($count > 0) {
		$ligne=mysql_fetch_array($insert,MYSQL_NUM);
		if ($ligne[0]==1) {
			
			 header('Location: login.php');
			 exit();
		}
	}
	
  $num=rand(1000,10000);
  $_SESSION['num']=$num;
  include ('mailer.php');
$s=sendMail($_SESSION['email'],$_SESSION['username'],$num);
}
else
{
	
	header('Location: login.php');
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Confiremer-email</title>
	<link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="confer.css">
</head>
<body>
<h3>Welcome <?php $name ?> to ower website</h3>
<p>nous avons envoyer un code de confirmation sur votre email : <?php $email ?></p>
<form action="confirmer.php" method="POST">
<div class="form-group">
<input type="text" class="form-control" name="incode"  placeholder="Code de confirmation ">
<button type="submit" name="code" class="btn btn-success btn-lg">Envoyer</button>
</div>


</form>


</body>
</html>