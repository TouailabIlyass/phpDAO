<?php

if(!isset($_COOKIE['ilyase'])){
header('Location: index.php');
}
else if(isset($_COOKIE['ilyase'])){
header('Location: home.php');
}



echo "<h1> erreur login </h1>";
