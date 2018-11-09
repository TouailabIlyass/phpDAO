<?php




$bd;
try{
global $bd;
 $bd= new PDO('mysql:host=localhost;dbname=datauser','root','');


}catch(PDOException $e)
{
die($e->getMessage());
}

$username=$_POST['nn'];

$stmt=$bd->prepare("select id from user where username = '$username'");
$stmt->execute();
if($stmt->rowCount())
{
	echo "<span style='color:red;'>trouve</span>";
}
else
{
	echo "<span style='color:#080;'>Non Trouve</span>";
}


