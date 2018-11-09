<?php


session_start();
require_once('User.php');
require_once('CnxDB.php');
$con=Connection('datauser');
if(isset($_SESSION['user'])){
try{

$con->beginTransaction();
$user=unserialize($_SESSION['user']);
unset($_SESSION['user']);
$username=$user->getUsername();
$password=$user->getPassword();
$stmt=$con->prepare('select * from user where username = :username and password= :pass');
$stmt->bindParam(':username',$username);
$stmt->bindParam(':pass',$password);

$stmt->execute();
$con->commit();
if($stmt->rowCount())
{
  setcookie('ilyase',$username,time()+3600);
     $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
     $_SESSION['login']=serialize($stmt->fetch());
      $stmt->closeCursor();
     header('Location: home.php');
}

}catch(PDOException $e)
{
	$con->rollback();
	header('Location: index.php');
}catch(Exception $e)
{
    $con->rollback();
	header('Location: index.php');
}


}
else if(isset($_SESSION['createUser'])){
	try
	{

$con->beginTransaction();

$user=unserialize($_SESSION['createUser']);
$nom=$user->getName();
$prenom=$user->getPrenom();
$username=$user->getUsername();
$password=$user->getPassword();
$email=$user->getEmail();

$stmt=$con->prepare('insert into user values(:id,:nom,:prenom,:username,:password,:email)');
$stmt->bindValue(1,0);
$stmt->bindParam(2,$nom);
$stmt->bindParam(3,$prenom);
$stmt->bindParam(4,$username);
$stmt->bindParam(5,$password);
$stmt->bindParam(6,$email);

$stmt->execute();
$con->commit();
$stmt->closeCursor();
setcookie('ilyase',$username,time()+3600);
$user= new User($nom,$prenom,$username,$password,$email);
$_SESSION['login']=serialize($user);
unset($_SESSION['createUser']);
header('Location: home.php');
}catch(PDOException $e)
{
	$con->rollback();
	header('Location: index.php');
   
}catch(Exception $e)
{  $con->rollback();
	header('Location: index.php');
}

}
elseif (isset($_POST['username'])) {

	$stmt=$con->prepare('select * from user where username = :username');

	$stmt->execute([$_POST['username']]);

	if ($stmt->rowCount()) {
		echo 1;
	}
	else{
      echo 0;
	}
	
}





