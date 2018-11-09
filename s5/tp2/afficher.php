<?php


require_once 'bd.php';



$pdo=connect();




$stmt=$pdo->prepare('select * from emp');

$stmt->execute();


echo "<table border=2 ><th>Nom</th><th>Prenom</th> <th>Departement</th>";


while ($v=$stmt->fetch()) {

	echo "<tr  > <td style='padding:10px'>$v[1] </td>   <td style='padding:10px'>$v[2]</td> <td style='padding:10px'> $v[3]</td> </tr> ";

}