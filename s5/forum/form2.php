
<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		img{
			position: absolute;
			right: 0;
			top: 50px;
			border-radius: 50%;
		}

	</style>
	<title></title>
</head>
<body>


<form name="test" action="form2.php" method="POST">
	
user : <br><input type="text" name="name"><br>
Com : <br><input type="text" name="com"><br>
image : <br><input type="file" name="img"><br>
<input type="submit" name="send" value="send">

</form>

<?php

$obj=null;

include "Com.php";



if ($_SERVER['REQUEST_METHOD']=='POST') {
	
if (!isset($_SESSION['user'])) 
{
	$ar = array();
	$_SESSION['user']=$ar;
}

	global $obj;
	$obj= new Com($_POST['name'],$_POST['com'],$_POST['img']);

    $ar = $_SESSION['user'];
    
    array_push($ar,serialize($obj));

    $_SESSION['user']=$ar;
    
    echo '<table border=2>
		      <th> nom </th>
		      <th> comm </th>
		      <th> image </th>';
    
    foreach ($ar  as $value) {


		    $o=unserialize($value);
		    $o->Commenter();

   echo "<br>";

}

echo "</table><br>";
}



?>
<img src="<?php  echo $obj->_image?>" width='100' height='100'>
</body>
</html>