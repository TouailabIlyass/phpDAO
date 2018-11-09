<?php



$profile=$dao->getProfile($user->getId());

?>
<div id="phd-left">
<nav id="hd-v-left">
	<img src="<?php echo $profile['photo']?>" id='photo-profile' >
<p>
 
  <?php 
  


      
  echo 'username : '.$user->getUsername();
  ?>
&nbsp;<img id='addClick' src="img/add.png" width="20">
</p>
	<div id="parametre" class="parametre">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >

<input type="submit" name="deco" value="Deconexion">
</form>

	<form method="POST" action="home.php" enctype = "multipart/form-data">

	<input type="file" name="image"/>
	<input type="submit" name="send" value="send"/>
	</form>
</div>

</nav>
</div>