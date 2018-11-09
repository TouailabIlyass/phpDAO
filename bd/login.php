<?php


session_start();
require_once 'Cnx_bd.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

<form action="login.php" method="POST">
	username: <input type="text" name="username" id="username">
	prenom: <input type="text" name="prenom" id="pr">
	<input type="submit" name="login" id="login">
</form>





<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

   $con=Cnx_bd::CNX('myDB');
   $stmt=$con->prepare('select * from emp where nom = :username and prenom = :pr');
   $stmt->execute([$_POST['username'],$_POST['prenom']]);

   if ($stmt->rowCount()) {
       $_SESSION['user']=$_POST['username'];
       header('Location: home.php');

   }
   else
   {
   	echo "username incorrect!!!!!!!!!!!";
   }


}


?>
<script type="text/javascript" src="jq-3.1.0.js"></script>
<script type="text/javascript">
	$(function(){
		$('#login').on('click',function(event){
          
         //event.preventDefault();
         

		});

});
</script>



</body>
</html>