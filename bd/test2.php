<?php



require_once('Cnx_bd.php');


class Emp{
private $id,$nom,$prenom,$dept;

public function __construct()
{

  $a=func_get_args();

   if(func_num_args()==4){
	$this->construct2($a[0],$a[1],$a[2],$a[3]);
}
else if(func_num_args()==0)
{
 $this->construct1();
}



}

private function construct2($id,$nom,$pre,$dept){
$this->id=$id;
$this->nom=$nom;
$this->prenom=$pre;
$this->dept=$dept;
}

private function construct1()
{
$this->id='';
$this->nom='';
$this->prenom='';
$this->dept='';
}

public function __toString(){
 return 'your name : '.$this->nom.' your last name : '.$this->prenom.'<br>';
}

}


$con=Cnx_bd::CNX('myDB');


$stmt=$con->prepare('select * from emp');
$stmt->execute();
/*
#while($ar=$stmt->fetchObject('Emp',['1','1','1','1'])){
while($ar=$stmt->fetchObject('Emp',['1','1','1','1'])){
echo $ar->toString();
}



$ar=$stmt->fetchAll(PDO::FETCH_CLASS,'Emp');
foreach($ar as $v)
echo $v->toString();
*/


$tt=$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Emp');
print_r($tt);
if($tt){
print_r($stmt);
while($v=$stmt->fetch())
echo $v;
}else echo 'class inexsistant!!!';

$con=Cnx_bd::CloseCnx();
