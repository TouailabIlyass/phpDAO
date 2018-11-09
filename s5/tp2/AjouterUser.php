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
require_once('DaoEmp.php');

$do=new DaoEmp();
$do->createFormAjout('datauser','user');

?>

</body>
</html>