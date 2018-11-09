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


public function getEmp($table):array
{
		        if (!file_exists(ucfirst($table).'.php')) {
                    $this->createClass($table);
              }

          
              require ucfirst($table).'.php';    
          
        

        
        $this->ClassName=ucfirst($table);
        $stmt= $this->pdo->prepare("select * from $table");
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->ClassName);

		

		while ($v=$stmt->fetch()) {

			$this->L[]= $v;
		}
         $stmt->closeCursor();

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

public function createTab():string
{

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
  
   $stmt=$this->pdo->prepare("select * from $table");
   $stmt->execute();
   $qr="insert into $table values(";
   $numcol=$stmt->columnCount();
   $A=$this->getColumn($table);
   $param=array();
   for ($i=0;$i <$numcol-1;$i++){
   	$qr.='?,';
    $param[]=$ar[$A[$i]];
   }
    $qr.='?)';
    $param[]=$ar[$A[$i]];
  $stmt=$this->pdo->prepare($qr);
   $stmt->execute($param);

}

public function createFormAjout($table)
{
   
   $A=$this->getColumn($table);

  
   echo "<form method='POST'  action='Verif.php'>";
  
  for ($i=0; $i <count($A) ; $i++) {
  	if (strToLower($A[$i])!='pass' && strToLower($A[$i])!='password'){
  		echo "$A[$i]: <input type='text' name='$A[$i]'>";
  	}
  	else
  		echo "$A[$i]: <input type='password' name='$A[$i]'>";
  	
  }
   echo "<input type='submit' values='Ajouter'> </form>";

}



public function createClass($table)
{
  
  $f=fopen(ucfirst($table).'.php','w+');
  $ColumnName=$this->getColumn($table);

       
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

public function __destruct()
{

      $this->pdo=NULL;
      $this->L=NULL;

}

}


