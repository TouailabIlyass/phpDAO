<?php
session_start();
if (!isset($_SESSION['confirmer'])) {
	header('Location: confirmer.php');
        exit();
}


if (isset($_POST['deconexion'])) {
session_destroy();
 header('Location: login.php');
    exit();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>welcome</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
<button name="deconexion">deconexion</button>
</form>
</body>
</html>