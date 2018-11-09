<?php


require 'bd.php';


class DaoEmp{
private $nomClass;
private $ColumnName=array();
private $L=array();


public function getEmp($db,$table):array
{
		      
          
        require ucfirst($table).'.php';

        $pdo=connect($db);
        $this->nomClass=ucfirst($table);
        $stmt=$pdo->prepare("select * from $table");

		$stmt->execute();

		
		 $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$table);

		$this->getColumn($stmt);

		while ($v=$stmt->fetch()) {

			$this->L[]= $v;
		}
         
		return $this->L;

}

public function getColumn($stmt):void
{
 

   for($i=0;$i<$stmt->columnCount();$i++)
   {
   	$this->ColumnName[]=$stmt->getColumnMeta($i)['name'];
   }

}

private function tabHead() :string
{
	$str="<table border=2 style=border-collapse:collapse>
			<thead style=text-transform:capitalize>";

foreach ($this->ColumnName as  $v) {
	
$str.="<th style=padding:10px>$v</th>";

}
$str.='</thead>';
return $str;
}

public function createTab():string
{

$str=$this->tabHead();


   foreach ($this->L as $v) {
	$str.="<tr>";
	foreach ($this->nomClass::getAttr() as  $v2) {
		
		$str.= "<td style='padding:10px'>".$v->$v2()."</td>";
	}

	$str.="</tr>";
}

	$str.= "</table>";
	return $str;

}

public function insert($db,$table,$ar)
{
   $pdo=connect($db);
   $stmt=$pdo->prepare("select * from $table");
   $stmt->execute();
   $qr="insert into $table values(";
   $numcol=$stmt->columnCount();
   for ($i=0;$i <$numcol-1;$i++){
   	$qr.='?,';
   }
    $qr.='?)';
   
   $this->getColumn($stmt);
   $A=$this->ColumnName;

   $stmt=$pdo->prepare($qr);
   for($i=0; $i < $numcol; $i++){
     $param[]=$ar[$A[$i]];
   } 
   print_r($param);
   $stmt->execute($param);

}

public function createFormAjout($db,$table)
{
   $pdo=connect($db);
   $stmt=$pdo->prepare("select * from $table");
   $stmt->execute();
    $numcol=$stmt->columnCount();/*
   for ($i=0; $i < $numcol; $i++) { 
   	$A[] =$stmt->getColumnMeta($i)['name'];
   }*/

   $this->getColumn($stmt);
   $A=$this->ColumnName;
   echo "<form method='POST'  action='Verif.php'>";
  
  for ($i=0; $i <$numcol ; $i++) {
  	if (strToLower($A[$i])!='pass' && strToLower($A[$i])!='password'){
  		echo "$A[$i]: <input type='text' name='$A[$i]'>";
  	}
  	else
  		echo "$A[$i]: <input type='password' name='$A[$i]'>";
  	
  }
   echo "<input type='submit' values='Ajouter'> </form>";

}


}


