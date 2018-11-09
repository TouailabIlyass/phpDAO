<!DOCTYPE html>
<html>
<head>
	<title>Ajouter User</title>

	<style type="text/css">
		input{
			display: block;
		}


	</style>
</head>
<body>

<?php
require_once('Dao.php');

$do=new Dao('myDB');
$do->createFormAjout('user');

?>

</body>
</html>