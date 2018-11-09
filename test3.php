<?php

$var=array(1,2,3);


foreach($var as &$k)
{

echo $k=$k*3;

}

for($i=0;$i<3;$i++)
{
echo $var[$i];
}

unset($k);
foreach($var as $k)
{
echo $k;
}


echo "<br>";


echo dirname(__FILE__);

/*

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire Securisee</title>
</head>
<body>
    <center>
		<form action="form.php" method="POST">
			<h2>Nom :</h2><input type="text" name="nom"><br>
			<h2>Age :</h2></strong><input type="number" name="age"><br>
			<h2>Grade :</h2></strong><input type="text" name="grade"><br>
			<h2>Image :</h2><input type="file" name="image"><br><br>
			<input type="submit" name="ok" value="Valider">
		</form>
	</center>
</body>
</html>

<?php
require "Personnage.php";

$Fichier=fopen('file.txt', 'a+');

if($_SERVER['REQUEST_METHOD']=='POST')
{
	        $nom=$_POST['nom'];
			$age=$_POST['age'];
			$grade=$_POST['grade'];
			//$image=$_POST['image']; 

$p1=serialize(new Personnage($nom,$age,$grade));
fputs($Fichier,$p1."\r\n");	 
rewind($Fichier);
}

echo "<br><br><br>";
echo "<center>";
echo "<table border=2>
	      <tr>
	      <th> Nom </th>
	      <th> Age </th>
	      <th> Grade </th>
	      <th> Image </th>
	      </tr>";

while($ligne=fgets($Fichier))
{

$p1=unserialize($ligne);

echo "<tr>
	  <td>".$p1->_nom."</td>
	  <td>".$p1->_age."</td>
	  <td>".$p1->_grade."</td>
    </tr>";

}

echo "</table>";
echo "</center>";



fclose($Fichier);


?>

*/