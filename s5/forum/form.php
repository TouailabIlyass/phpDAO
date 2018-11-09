<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form method="POST" action="form.php">
	Nom: <input type="text" name="nn">
	   
	<input type="submit" value="sendform1">
</form>
<?php

if ($_SERVER['REQUEST_METHOD']==='GET') {
	print_r($_GET);
}

?>

</body>
</html>