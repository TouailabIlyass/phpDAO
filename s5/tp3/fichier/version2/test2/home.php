<?php

session_start();
require_once('Dao.php');
$dao= new Dao('myDB');
$user=unserialize($_SESSION['login']);
if(!isset($_COOKIE['ilyase']))
{
   header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	if (isset($_POST['deco'])) {
		setcookie('ilyase','ilyase',time()-1);
		session_destroy();
	header('Location: index.php');
		
	}
	else if(isset($_FILES['image']))
	{	
		$images=$_FILES['image'];
		$images_name=$images['name'];
		$images_tmp=$images['tmp_name'];
		$images_dir='img/'.$images_name;
		move_uploaded_file($images_tmp,$images_dir);
		$dao->updateProfilePhoto($user->getId(),$images_dir);
		
	}
}




?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="css/header-v.css">
	<link rel="stylesheet" type="text/css" href="css/header-v-left.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Home</title>
</head>
<body>


	<?php include 'header.html'; ?>
<div id="hd-parent">
<?php include 'header-v.html'; ?>
<div id="container">
<?php include 'co.php'; ?>
</div>

<?php include 'header-v-left.php';?>

</div>







<script type="text/javascript" src="js/jq-3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	$(function(){

$('#addClick').on('click',function(){

	$('#parametre').toggleClass('parametre');
});


	});


</script>
</body>
</html>