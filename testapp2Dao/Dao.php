<?php


class Dao{
private $ClassName;
private $pdo;
private $L=array();

public function __construct($db)
{
   $this->pdo=$this->connect($db);
}


public function getList($table,$returnList=false):? array
{                  
              $this->ClassName=ucfirst($table);
              $this->createClass($this->ClassName,true);

              

          
              require $this->ClassName.'.php';    
          
        

        
        
        $stmt= $this->pdo->prepare("select * from $table");
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->ClassName);

		

		while ($this->L[]=$stmt->fetch());
         $stmt->closeCursor();
         if ($returnList===false) {
           echo $this->createTab();
           return NULL;
         }
		     return $this->L;

}

public function getColumn($table):array
{
       $stmt=$this->pdo->prepare("select * from $table");
       $stmt->execute();
       
      $ColumnName=array();

   for($i=0;$i<$stmt->columnCount();$i++)
   { 
       $ColumnName[]=$stmt->getColumnMeta($i)['name'];
   }
    

   return $ColumnName;

}

public function connect($db)
{


  try{


  $pdo=new PDO("mysql:host=localhost;dbname=$db",'root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  return $pdo;
}
catch(PDOException $e)
{
 die($e->getMessage());
}



}

public function tabHead() :string
{
	$str="<table>
			<thead >";

foreach ($this->getColumn(lcfirst($this->ClassName)) as  $v) {
	
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

public function update($table,$ar,$cle)
{

    $ColumnName=$this->getColumn($table);
     $sql="update $table set ";
     $param=array();
    for($i=0;$i<count($ColumnName)-1;$i++)
    {
      $sql.="$ColumnName[$i]=?, ";
      $param[]=$ar[$ColumnName[$i]];
    }
    $sql.="$ColumnName[$i]=? where ";
    $param[]=$ar[$ColumnName[$i]];
        

                  $tab=unserialize($cle);
                  $cle=array_keys($tab);

                $sql.=$cle[0]."= ".$tab["$cle[0]"];

                if (count($tab)>1) {
                  
                for($i=1;$i<count($tab);$i++)
                {
                  $sql.=" and  $cle[$i]=".$tab["$cle[$i]"];
                }
                }

    $stmt=$this->pdo->prepare($sql);
      //print_r($stmt);
     $stmt->execute($param);


}

public function createForm($table,$createFile=true,$WriteIn=false,$structHTML=false,$cle=NULL)
{  $file='Ajout'.ucfirst($table).'.php';

	 if ($createFile===true && file_exists($file) && $WriteIn===false) {
                    return $file;

              }
   
   $ColumnName=$this->getColumn($table);

  
   $str='';
  if ($cle==NULL) {
  	 for ($i=0; $i <count($ColumnName); $i++)
  	 {
  	if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
  		$str.=ucfirst($ColumnName[$i]).": <input type='text' name='$ColumnName[$i]'>\n";
	else
  		$str.=ucfirst($ColumnName[$i]).": <input type='password' name='$ColumnName[$i]'>\n";
     }
     
  }
  else{
  				        $tab=unserialize($cle);
                  $cle=array_keys($tab);

                $str=$cle[0]."= ".$tab["$cle[0]"];

                if (count($tab)>1) {
                  
                for($i=1;$i<count($tab);$i++)
                {
                  $str.=" and  $cle[$i]=".$tab["$cle[$i]"];
                }
                }


       $stmt=$this->pdo->prepare("select * from $table where $str");
       $stmt->execute();
       $stmt->setFetchMode(PDO::FETCH_NUM);
       
       $value=$stmt->fetch();
       $str='';
       for ($i=0; $i <count($ColumnName);$i++)
	  	 {
	  	if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
	  		$str.=ucfirst($ColumnName[$i]).": <input type='text' name='$ColumnName[$i]' value='$value[$i]'>\n";
		else
	  		$str.=ucfirst($ColumnName[$i]).": <input type='password' name='$ColumnName[$i]' value='$value[$i]'>\n";
	     }

  
  }
 
  $title='Ajout'.ucfirst($table);
if ($structHTML==true) {
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
}else
{
	$Form="
    <form class='F-AJ' method='POST'  action='phpAdmin.php'>
  		   $str

  <input type='submit' name='$table' value='Send'>
  </form>";
}
  if ($createFile===true) {
  $fd=fopen($file,'w+');
  fputs($fd,$Form);
  fclose($fd);
  }else
    return $Form;
  
  return $file;

}



public function createClass($table,$WriteFichier=false)
{
    if(file_exists($table.'.php') &&  $WriteFichier===false)
                return;
                   

           
 
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

$pri=$this->getPrimaryKey(lcfirst($table));
$pr='';

  foreach ($pri as $value) {
    $pr.='$tab[\''.$value.'\']=$this->'.$value.";\n";
  }
  $pr.='return serialize($tab);';


 
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
    public  function getPrimaryKey()
    {
    $pr
    }

   public static function getAttr()
   {  
        ".'$attr=array();'."

        $getAttr
        ".'return $attr;'."
   }

}
  ";

 $f=fopen($table.'.php','w+');
fputs($f,$class);

fclose($f);

}

public function getPrimaryKey($table)
{
  $stmt=$this->pdo->prepare("show columns from $table");
  $stmt->execute();
  $tab=array();
  foreach ($stmt->fetchAll() as  $value) {
    if ($value['Key']=='PRI') {
      $tab[]=$value['Field'];
    }
  }

  return $tab;
}

public function delete($table,$cle)
{

  $tab=unserialize($cle);
  $cle=array_keys($tab);

$str=$cle[0]."= ".$tab["$cle[0]"];

if (count($tab)>1) {
  
for($i=1;$i<count($tab);$i++)
{
  $str.=" and  $cle[$i]=".$tab["$cle[$i]"];
}
}


       $stmt=$this->pdo->prepare("delete  from $table where $str");
       $stmt->execute();
}


public function __destruct()
{

      $this->pdo=NULL;
      $this->L=NULL;
      

}




public function createTab2():void
{

?>
<table border="2px">
  <thead>
    <?php 
        foreach ($this->getColumn(lcfirst($this->ClassName)) as  $v) {
           ?>
             <th><?php echo $v;?></th>
          <?php
          }
     ?>
  </thead>
  <tbody>
    <?php
     foreach ($this->L as $v) {
       ?>
       <tr>
       <?php
       foreach ($this->ClassName::getAttr() as  $v2) {
          ?>
          <td><?php echo $v->$v2();?></td>
          <?php
       }
       ?>

      </tr>
      <?php
     }
     
    ?>


  </tbody>

</table> 
<?php
}


public function login($table,$email,$username,$password)
{

  $stmt=$this->pdo->prepare("select * from $table where (email=:email or username=:username) and password=:password ");

 $stmt->bindParam('email',$email);
 $stmt->bindParam('username',$username);
 $stmt->bindParam('password',$password);
 $stmt->execute();

 $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,ucfirst($table));
 $obj=NULL;
   if($stmt->rowCount())
     $obj=$stmt->fetch();

     $stmt->closeCursor();
     return $obj;

}


}

?>
