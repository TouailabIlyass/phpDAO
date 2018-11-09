
<nav id="hd-v-left">
<p>
  profile : <br>
  <?php 
  


      $user=unserialize($_SESSION['login']);
  echo 'username : '.$user->getUsername();
  ?>

</p>


</nav>
