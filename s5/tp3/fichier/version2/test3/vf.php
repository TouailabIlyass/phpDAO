<?php
require_once('Dao.php');
$dao= new Dao('myDB');
$pdo=$dao->getPDO();
$stmt=$pdo->prepare('select nom,id from etudiant');
$stmt->execute();
while ($v=$stmt->fetch()) {
	echo "<h1> ".$v['nom']."</h1>";

	$stmt2=$pdo->prepare('select note,matiere from note where etudiant_id ='.$v['id']);
  $stmt2->execute();
	while ($v2=$stmt2->fetch()) {
		echo "<h3> ".$v2['note']." => ".$v2['matiere']."</h3>";
	}
}


?>
