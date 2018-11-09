<?php

class DB{
private static $bd;

public static function CNX($base)
{
  try{
 self::$bd=new PDO("mysql:host=localhost;dbname=$base;charset=utf8",'root','');
  echo "cnx";
return self::$bd;
  
   }
catch(Exception $e){
   
   die('erreur : '.$e->getMessage());

}

}

public static function getDB(){ 

return self::$bd;}

}






