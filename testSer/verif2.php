<?php

require "Personne.php";
session_start();
$p=unserialize($_SESSION['pers1']);
$p->parler();

echo "<br>verif2.php <br>";

$liste=array();

$liste[0]=new Personnage('ilyase',21,300);
$liste[1]=new Personnage('ossama',80,100);
$liste[2]=new Personnage('Touailab',19,500);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<table border=1 >
      <th>Personnage</th>
      <tbody>";

foreach ($liste as  $value) {
	echo "<tr><td>";
	echo $value->parler();
	echo " </td></tr>";

}
echo "</tbody>
      </table>";
