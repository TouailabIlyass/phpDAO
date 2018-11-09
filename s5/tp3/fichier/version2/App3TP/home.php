<?php

session_start();
require_once('User.php');
if(!isset($_COOKIE['ilyase']))
{
   header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/header-v.css">
	<link rel="stylesheet" type="text/css" href="css/header-v-left.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<title>Home</title>
</head>
<body>
	<?php include 'header.html'; ?>
<div id="hd-parent">
<?php include 'header-v.html'; ?>
<div id="container">
<?php include 'content.html'; ?>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<input type="submit" name="deco" value="Deconexion">	
</form>
</div>
<?php include 'header-v-left.php'; ?>

</div>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	if (isset($_POST['deco'])) {
		echo "<h1>hello</h1>";
		setcookie('ilyase','ilyase',time()-1);
		//unset($_COOKIE['ilyase']);
		session_destroy();
	header('Location: index.php');
		
	}
}

?>

</body>
</html>