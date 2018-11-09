<?php

if(isset($_COOKIE['www.ilyase.com'])){
header('Location: home.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>registre.php</title>
</head>
<body>

<fieldset>
	
 <legend>Registre</legend>
 <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

 	Nom : <input type="text" name="nom">
 	Prenom : <input type="text" name="prenom">
 	username : <input type="text" name="username" id="username">
 	email : <input type="email" name="email" id="email">
 	password : <input type="password" name="password">
 	<input type="submit" name="signin" value="Sign In" id="signin">
 	<input type="reset" name="reset" value="Reset">

 	
 </form>

</fieldset>
<?php require_once('Verif.php');?>
<script type="text/javascript" src="jq-3.1.0.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
       $('#username').on('keyup',function(){

         $.ajax({
         		type: 'POST',
         		url: 'check.php',
         		data: $('#username').serialize(),
         		dataType: 'text',
         		success: function(str){
         			
         			if (str==1) {
         				$('#username').css('border','2px solid #f00');
         				$('#signin').attr('disabled','disabled').removeAttr('enable');
         				

         			}
         			else{
         				$('#username').css('border','2px solid #080');
         				$('#signin').attr('enable','enable').removeAttr('disabled');


         			}
         		}




         });



       });
       



	});


</script>
</body>
</html>


