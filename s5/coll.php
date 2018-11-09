<?php
include "Personnage.php";

class coll{



public static function add(Personnage $p)
{
	array_push($_SESSION['liste'], $p);
	echo count($_SESSION['liste']);
	print_r($_SESSION['liste']);
	
}

public static function afficher()
{
  

	echo "<br>";
echo "<br>";
echo "<br>";
echo "<table border=1 >
      <th>Personnage</th>
      <tbody>";

foreach ($_SESSION['liste'] as  $value) {
	echo "<tr><td>";
	echo $value->parler();
	echo " </td></tr>";

}
echo "</tbody>
      </table>";





}


}