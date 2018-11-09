<?php

session_start();
require_once('User.php');
if(!isset($_COOKIE['ilyase']))
{
   header('Location: index.php');
}
#setcookie('ilyase','ilyase',time()-1);

echo "home!!!!";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<p>
	profile : <br>
	<?php 
      $user=unserialize($_SESSION['login']);
	echo 'username : '.$user->getUsername();
	?>

</p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<input type="submit" name="deco" value="Deconexion">	
</form>


<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	if (isset($_POST['deco'])) {
		setcookie('ilyase','ilyase',time()-1);
		session_destroy();
		#unset($_COOKIE['ilyase']);
		header('Location: index.php');
		
	}
}

?>

</body>
</html>