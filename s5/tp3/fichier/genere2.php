<?php





function createClass($table)
{
  //cnx bd



$f=fopen(ucfirst($table).'.php','w+');
$stmt=$pdo->prepare("select * from $table");

$stmt->execute();
$ColumnName=array();


   for($i=0;$i<$stmt->columnCount();$i++)
   {
   	$ColumnName[]=$stmt->getColumnMeta($i)['name'];
   }
    
   
$attr='';
$const1='';
$const2='';
$get='';
$set='';
$getAttr='';
 for($i=0;$i<$stmt->columnCount();$i++)
{
$attr.="private $$ColumnName[$i];\n";
$const1.='$this->'.$ColumnName[$i]."='';\n";
$const2.='$this->'.$ColumnName[$i].'=$a['."$i".'];'."\n";
$get.='public function get'.ucfirst($ColumnName[$i]).'(){ return $this->'.$ColumnName[$i].";}\n";
$getAttr.='$attr[]="get'.ucfirst($ColumnName[$i]).'";'."\n";
$set.='public function set'.ucfirst($ColumnName[$i]).'($var){ $this->'.$ColumnName[$i].'=$var;}'."\n";
}


 $class="<?php \n\n\n\nclass  ".ucfirst($table)." { \n\n
   
   $attr

   public function __construct()
   {
      ".'$a=func_get_args();

      if (func_num_args()==0)
      $this->construct1();
  
      else
      $this->construct2($a);
      '."
   }

   public function construct1()
   {
      $const1
   }

   public function construct2(".'$a'.")
   {
   	 $const2
   }

   $get

   $set

   public static function getAttr()
   {  
   	    ".'$attr=array();'."

   	    $getAttr
   	    ".'return $attr;'."
   }

}
 	";


fputs($f,$class);

fclose($f);

}




$stmt=$pdo->prepare('show tables');
$stmt->execute();

foreach ($stmt->fetchAll() as $v) {
createClass($v[0]);
}




?>