

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="">
	<title></title>
</head>
<body>


<form name="test" action="form.php" method="POST">
	
Nom : <br><input type="text" name="name"><br>
Age : <br><input type="number" name="age"><br>

<input type="submit" name="send" value="send">

</form>
<?php

include "coll.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
	
#$pers[0]= new Personnage($_POST['name'],$_POST['age'],$_POST['grad']);
#$pers[0]->parler();

coll::add(new Personnage($_POST['name'],$_POST['age'],$_POST['grad']));
coll::afficher();

}



?>
</body>
</html>