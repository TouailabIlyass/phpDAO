<?php


class Dao{
private $pdo;


public function __construct($db)
{
   $this->pdo=$this->connect($db);
   $this->createAllClass($db);
}


public function getList($table,$condition=NULL)
{                  
          $qr="select * from $table ";
          if ($condition) {
           $qr.=" where ".$condition;
          }
        $stmt= $this->pdo->prepare($qr);
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,ucfirst($table));

		
$L=array();
		while ($v=$stmt->fetch()){
         $L[]=$v;
    }
         $stmt->closeCursor();
         
		     return $L;

}

public function getPDO()
{
  return $this->pdo;
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

public function tabHead($table) :string
{
	$str="<table>
			<thead><tr>";
  
foreach (ucfirst($table)::getColumn() as  $v) {
	
$str.="<th>$v</th>";

}
$str.='</tr></thead>';
return $str;
}

public function createTab($table,$list=NULL):string
{

$str=$this->tabHead($table);
  if($list==NULL)
  $list=$this->getList($table);

    
   foreach ($list as $v) {
	$str.="<tr>";
	foreach (ucfirst($table)::getAttr() as  $v2) {
		
		$str.= "<td>".$v->$v2()."</td>";
	}

	$str.="</tr>";
}

	$str.= "</table>";
	return $str;

}

public function AfficheBoot($table,$action=true,$list=NULL,$reserv=false)
{
	$str="<table class='table table-hover table-bordered table-dark'>
			<thead class='thead-light'><tr>";
  
foreach (ucfirst($table)::getColumn() as  $v) {
	
$str.="<th>$v</th>";

}
////////////////////////
if($action==true || $reserv==true) {
  
$str.="<th>Action</th>";
}


$str.='</tr></thead><tbody>';
if ($list==NULL) {
  $list=$this->getList($table);
}


foreach ($list as $v) {
	$str.="<tr>";
	foreach (ucfirst($table)::getAttr() as  $v2) {
		if ($v2=='getPhoto') {
      $str.= "<td><img src='img/".$v->$v2()."'></td>";
    }
    else
		$str.= "<td>".$v->$v2()."</td>";
	}
///////////////////////
  if ($action==true) {
    $str.="<td>
    <a href='Action.php?table=$table&id=".$v->getPrimaryKey()."&action=editer' class='btn btn-primary'>Editer</a>
    <a href='Action.php?table=$table&id=".$v->getPrimaryKey()."&action=supprimer' class='btn btn-danger'>Supprimer</a>
    ";
  }
  if ($reserv==true && $action==true) {
   $str.="<a href='Action.php?table=$table&id=".$v->getPrimaryKey()."&action=reserver' class='btn btn-success'>Reserver</a>";
  }
  else if ($reserv==true && $action==false) {
    $str.="<td><a href='Action.php?table=$table&id=".$v->getPrimaryKey()."&action=reserver' class='btn btn-success'>Reserver</a>";
  }
  $str.="</td>";

   


	$str.="</tr>";
}

	$str.= "</tbody></table>";
	return $str;

}

public function insert($table,$ar)
{
  
   $qr="insert into $table values(";
   $A=ucfirst($table)::getColumn();
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

public function reserver($ar)
{
  $stmt=$this->pdo->prepare('insert into reserv values(0,?,?)');
  $stmt->execute($ar);

}

public function update($table,$ar,$cle)
{

    $ColumnName=ucfirst($table)::getColumn();
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
      
     $stmt->execute($param);


}

public function createForm($table,$createFile=true,$WriteIn=false,$structHTML=false,$cle=NULL)
{  $file='Ajout'.ucfirst($table).'.php';

	 if ($createFile===true && file_exists($file) && $WriteIn===false) {
                    return $file;

              }
   
   $ColumnName=ucfirst($table)::getColumn();

  
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

    <form method='POST'  action='phpAdmin2.php'>
  		   $str

  <input type='submit' name='$table' value='Ajouter'>
  </form>

</body>
</html>";
}else
{
	$Form="
    <form class='F-AJ' method='POST'  action='phpAdmin2.php'>
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
   $ClassName=ucfirst($table);
   if(file_exists($ClassName.'.php') &&  $WriteFichier===false)
                   return;

  
 
  $ColumnName=$this->getColumn($table);


       
    $attr='';
    $const1='';
    $const2='';
    $get='';
    $set='';
    $getAttr='';
    $Col='';
     for($i=0;$i<count($ColumnName);$i++)
    {
    $attr.="private $$ColumnName[$i];\n";
    $const1.='$this->'.$ColumnName[$i]."='';\n";
    $const2.='$this->'.$ColumnName[$i].'=$a['."$i".'];'."\n";
    $get.='public function get'.ucfirst($ColumnName[$i]).'(){ return $this->'.$ColumnName[$i].";}\n";
    $getAttr.='$attr[]="get'.ucfirst($ColumnName[$i]).'";'."\n";
    $set.='public function set'.ucfirst($ColumnName[$i]).'($var){ $this->'.$ColumnName[$i].'=$var;}'."\n";
    $Col.='$Column[]="'.$ColumnName[$i].'";'."\n";
    }

$pri=$this->getPrimaryKey($table);
$pr='';

  foreach ($pri as $value) {
    $pr.='$tab[\''.$value.'\']=$this->'.$value.";\n";
  }
  $pr.='return serialize($tab);';


 
 $class="<?php 


class $ClassName { 
   
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
        

        $getAttr
        ".'return $attr;'."
   }

   public static function getColumn()
   {  
      

      $Col

      ".'return $Column;'."
   }

}
  ";

 $f=fopen($ClassName.'.php','w+');
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

public function createAllClass($db)
{
  
  foreach ($this->getAlltables($db) as $v) {
  $this->createClass($v[0]);
  require ucfirst($v[0].'.php');
  }


}
public function getAlltables($db)
{
    $stmt=$this->pdo->prepare('show tables');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM);
    $tab=$stmt->fetchAll();
    $stmt->closeCursor();
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

public function getProfile($id)
{
	$stmt=$this->pdo->prepare("select * from profile where id = $id ");
	$stmt->execute();
	$tab['photo']=$stmt->fetch()['photo'];
	if ($tab['photo']==NULL) {
		$tab['photo']='./img/default.jpg';
	}
	return $tab;
}
public function updateProfilePhoto($id,$ph)
{
	$stmt=$this->pdo->prepare("update profile set photo = '$ph' where id =$id");
	$stmt->execute();

}



public function createFormBoot($table,$cle=NULL,$structHTML=true)
{  
  
  $file='Ajout'.ucfirst($table).'.php';
   $action='insert';

   
   $ColumnName=ucfirst($table)::getColumn();

  
   $str='';
  if ($cle==NULL) {
  	 for ($i=0; $i <count($ColumnName); $i++)
  	 {
  	 		$str.="<div class='form-group'>
        <label for='$ColumnName[$i]'>".ucfirst($ColumnName[$i]).":</label>";
                
     if (strToLower($ColumnName[$i])=='photo' || strToLower($ColumnName[$i])=='file') {
      $str.="<input type='file' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]'></div>";
    }
  	else if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
  		$str.="<input type='text' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]'></div>";

    
	else
  		$str.="<input type='password' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]'></div>";
     }
     //return $str;
     //
  }
  else{
                  $action='update';
  				        $tab=unserialize($cle);
                  $cle2=array_keys($tab);

                $str=$cle2[0]."= ".$tab["$cle2[0]"];

                if (count($tab)>1) {
                  
                for($i=1;$i<count($tab);$i++)
                {
                  $str.=" and  $cle2[$i]=".$tab["$cle2[$i]"];
                }
                }


       $stmt=$this->pdo->prepare("select * from $table where $str");
       $stmt->execute();
       $stmt->setFetchMode(PDO::FETCH_NUM);
       
       $value=$stmt->fetch();
       $str='';
       for ($i=0; $i <count($ColumnName);$i++)
	  	 {
        $str.="<div class='form-group'>
        <label for='$ColumnName[$i]'>".ucfirst($ColumnName[$i]).":</label>";
                
if (strToLower($ColumnName[$i])=='photo' || strToLower($ColumnName[$i])=='file') 
      $str.="<input type='file' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]'></div>";
    else if (strToLower($ColumnName[$i])!='pass' && strToLower($ColumnName[$i])!='password')
      $str.="<input type='text' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]' value='$value[$i]'></div>";
  else
      $str.="<input type='password' class='form-control' name='$ColumnName[$i]' id='$ColumnName[$i]' value='$value[$i]'></div>";
	     }
      $str.="<input type='hidden' name='cle' value='$cle'>";
  
  }
 
  $title='Ajout'.ucfirst($table);
if ($structHTML==true) {
	$Form="
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-grid.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-reboot.min.css'>

	<title>$title</title>

</head>
<body>
      <div class='container'>
      <div class='row'>
      <div class='col-md-12'>

    <form method='POST'  action='Action.php?table=$table&action=$action'>
  		   $str

  <input type='submit' name=Send class='btn btn-primary' value='Send'>
  </form>
  </div>
  </div>
  </div>
<script type='text/javascript' src='js/jq-3.1.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<script type='text/javascript' src='js/bootstrap.bundle.min.js'></script>
</body>
</html>";
}else
{
	$Form="
    <form class='F-AJ' method='POST'  action='phpAdmin2.php'>
  		   $str

  <input type='submit' name='$table' value='Send'>
  </form>";
}

  $fd=fopen($file,'w+');
  fputs($fd,$Form);
  fclose($fd);
  
    return $Form;
  


}

/*

*/






}


