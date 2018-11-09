<?php


require 'bd.php';


class Dao{
private $ClassName;
private $pdo;
private $L=array();

public function __construct($db)
{
   $this->pdo=connect($db);
}


public function getList($table,$returnList=false,$WriteFichier=false):? array
{                  
            $this->ClassName=ucfirst($table);
		        if (!file_exists($this->ClassName.'.php') || $WriteFichier===true) {
                    $this->createClass($this->ClassName);

              }

          
              require $this->ClassName.'.php';    
          
        

        
        
        $stmt= $this->pdo->prepare("select * from $table");
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->ClassName);

		

		while ($v=$stmt->fetch()) {

			$this->L[]= $v;
		}
         $stmt->closeCursor();
         if ($returnList===false) {
           echo $this->createTab();
           return NULL;
         }
		     return $this->L;

}

public function getColumn($table):array
{
       $stmt= $this->pdo->prepare("select * from $table");
       $stmt->execute();
       
      $ColumnName=array();

   for($i=0;$i<$stmt->columnCount();$i++)
   { 
       $ColumnName[]=$stmt->getColumnMeta($i)['name'];
   }
    
   return $ColumnName;

}

private function tabHead() :string
{
	$str="<table>
			<thead >";

foreach ($this->getColumn($this->ClassName) as  $v) {
	
$str.="<th>$v</th>";

}
$str.='</thead>';
return $str;
}

public function createTab($tab=0):string
{

  if ($tab!==0) {
  $str='';
    foreach ($tab as  $v) {
      
      foreach ($v::getAttr() as  $v2) {
       $str.=$v->$v2().'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      }
      $str.="<br>";
    }
   return $str;;
  }

$str=$this->tabHead();


   foreach ($this->L as $v) {
	$str.="<tr>";
	foreach ($this->ClassName::getAttr() as  $v2) {
		
		$str.= "<td>".$v->$v2()."</td>";
	}

	$str.="</tr>";
}

	$str.= "</table>";
	return $str;

}

public function insert($table,$ar)
{
  
   $qr="insert into $table values(";
   $A=$this->getColumn($table);
   $param=array();
   for ($i=0;$i <count($A)-1;$i++){
   	$qr.='?,';
    $param[]=$ar[$A[$i]];
   }
    $qr.='?)';
    $param[]=$ar[$A[$i]];
  $stmt=$this->pdo->prepare($qr);
   $stmt->execute($param);

}

public function createFormAjout($table,$WriteIn=false)
{  

	 if (file_exists('Ajout'.ucfirst($table).'.php') || $WriteIn===false) {
                    return ;

              }
   
   $ColumnName=$this->getColumn($table);

  
   $str='';

  for ($i=0; $i <count($ColumnName); $i++) {
  	if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
  		$str.=ucfirst($ColumnName[$i]).": <input type='text' name='$ColumnName[$i]'>\n";
	else
  		$str.=ucfirst($ColumnName[$i]).": <input type='password' name='$ColumnName[$i]'>\n";
  	
  }
  $title='Ajout'.ucfirst($table);

  $Form="
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
	<title>$title</title>

</head>
<body>

    <form method='POST'  action='Verif.php'>
  		   $str

  <input type='submit' name='$table' value='Ajouter'>
  </form>

</body>
</html>";
$fd=fopen('Ajout'.ucfirst($table).'.php','w+');
  fputs($fd,$Form);
  fclose($fd);

}



public function createClass($table)
{
  
  $f=fopen($table.'.php','w+');
  $ColumnName=$this->getColumn(lcfirst($table));

       
    $attr='';
    $const1='';
    $const2='';
    $get='';
    $set='';
    $getAttr='';
     for($i=0;$i<count($ColumnName);$i++)
    {
    $attr.="private $$ColumnName[$i];\n";
    $const1.='$this->'.$ColumnName[$i]."='';\n";
    $const2.='$this->'.$ColumnName[$i].'=$a['."$i".'];'."\n";
    $get.='public function get'.ucfirst($ColumnName[$i]).'(){ return $this->'.$ColumnName[$i].";}\n";
    $getAttr.='$attr[]="get'.ucfirst($ColumnName[$i]).'";'."\n";
    $set.='public function set'.ucfirst($ColumnName[$i]).'($var){ $this->'.$ColumnName[$i].'=$var;}'."\n";
    }


 
 $class="<?php 


class $table { 
   
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

public function __destruct()
{

      $this->pdo=NULL;
      $this->L=NULL;

}

}


