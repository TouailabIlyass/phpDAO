<?php
session_start();
require_once('Dao.php');
$dao= new Dao('myDB');
$user=unserialize($_SESSION['login']);
$str="";
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


if (isset($_GET['reserv'])) {
	$l=$dao->getList('reserv','iduser=1');
	$str= $dao->AfficheBoot('reserv',false,$l);
}

else if(isset($_GET['table']))
{ 
	$action=true;
	$reserv=false;
	if (isset($_GET['action'])) {
			
		$action=false;
	}
	if (isset($_GET['btnreserv'])) {
		$reserv=true;
	}

 $str= $dao->AfficheBoot($_GET['table'],$action,NULL,$reserv);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Afficher</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/header-v.css">
	<link rel="stylesheet" type="text/css" href="css/header-v-left.css">
	<style type="text/css">
		table img{
			width: 80px;
			height: 100px;
		}
		#fl{
			height: 100px;
		}
		#con{
			
			background-color: #080;
			
	}
	#x{
		border: 1px solid #f00;
	}

	</style>
</head>
<body>

	<div class="container-fluid">
			<div class="row">
				<div  id="fl">
				<?php include 'header.html'; ?>
			</div>
			</div>
			<div class="row">
				<div class="container-fluid" id="con">
					<div class="row">
						<div class="col-md-2">
								<?php  include 'header-v.html' ;?>
						</div>
						<div class="col-md-6" id="x">
							<?php echo $str; ?>					
						</div>
							
								<div class="col-md-2">
									<?php  include 'header-v-left.php' ;?>
							

							</div>
							

					</div>
				
			</div>
			</div>


	</div>

	<!--
<?php //include 'header.html'; ?>
<div id="hd-parent">
	<?php // include 'header-v.html' ;?>
	<div class="container" id="container">
	<div class="row">
		<div class="col-md-8">
			<div class="pull-right">
		    <a href="Action.php?table=<?php //echo $_GET['table']?>&action=ajouter" class="btn btn-primary">Ajouter</a>
	       </div>
	       <div class="pull-right">
		    <a href="Action.php?action=aff-reserv" class="btn btn-primary">Vos Reservation</a>
	       </div>
			<?php
			//echo $str;
			?>
		</div>
		</div>
	</div>


</div>
-->

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