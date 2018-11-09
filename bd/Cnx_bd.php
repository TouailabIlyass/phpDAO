<?php




class Cnx_bd{

private static $con;

public static function CNX($base){

try{

self::$con=new PDO("mysql:host=localhost;dbname=$base;charset=utf8",'root',''
,[   
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES => false,
     PDO::ATTR_PERSISTENT => true
]


);
echo "connected";
return self::$con;
}
catch(PDOException $e){
die($e->getMessage());

}

}
public static function getCon(){
return self::$con;
}
public static function CloseCnx()
{
  unset($con);
}


}


