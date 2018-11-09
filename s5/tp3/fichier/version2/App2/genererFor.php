<?php

require 'bd.php';



function createForm($table)
{
   
$pdo=connect('myDB');


$stmt=$pdo->prepare("select * from $table");

$stmt->execute();
$ColumnName=array();


   for($i=0;$i<$stmt->columnCount();$i++)
   {
   	$ColumnName[]=$stmt->getColumnMeta($i)['name'];
   }
  $str='';

  for ($i=0; $i <$stmt->columnCount() ; $i++) {
  	if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
  		$str.=ucfirst($ColumnName[$i]).": <input type='text' name='$ColumnName[$i]'>\n";
	else
  		$str.=ucfirst($ColumnName[$i]).": <input type='password' name='$ColumnName[$i]'>\n";
  	
  }
  $title=ucfirst($table).'Ajout';

  $Form="
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
	<title>$title</title>

</head>
<body>

    <form method='POST'  action='Verif.php'>
  		   $str

  <input type='submit' name='$table' value='Ajouter'>
  </form>

</body>
</html>";
$fd=fopen(ucfirst($table).'Ajout.php','w+');
  fputs($fd,$Form);
  fclose($fd);


}

createForm('user');