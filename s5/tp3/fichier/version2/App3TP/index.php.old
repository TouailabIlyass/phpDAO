<?php

if(isset($_COOKIE['www.ilyase.com'])){
header('Location: home.php');
}

?>
<!doctype html>
<html>
<head>

<link rel='stylesheet' href='style.css'>
<style type="text/css">
	fieldset{

		width: 500px;
		height: 500px;
		margin: 100px auto; 
	}
	input,label{
		margin: 10px;
	}
  

</style>

<title>Login</title>
</head>
<body>


<fieldset>
<legend>Login</legend>


<form action='<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method='POST' name='loginform'>

<label>username:</label> <input type='text' name='username'>
<label>password:</label> <input type='password' name='password'>
<input type='submit' value='Login In' name='login'>
</form>

<form class='inline-form' action='registre.php' method='POST'>
<input type='submit' value='Sign In' name='signin'>
</form>




</fieldset>

<?php require_once('Verif.php');?>

</body>

</html>




