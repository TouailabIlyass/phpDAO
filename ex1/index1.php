<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style >
    
    input{
      display: block;
    }
  </style>
</head>
<body>
   <?php   

    include("ex1.php");

     
     $data=DB::CNX('myDB');
     $rep=$data->query('select * from emp ');

     while($l=$rep->fetch())
     {


   ?>
   <p> id : <?php   echo $l[0]; ?><br>
   	nom : <?php  echo $l[1] ;?><br>
   	prenom : <?php  echo $l[2] ;?><br>
   	dept : <?php  echo $l[3] ;?><br>



    </p>
    <?php
}
$rep->closeCursor();
#---------------------------------

$rep=$data->prepare('update emp set nom = ? where id = ? ');
$rep->execute(array('oussama',2));
     
$rep=$data->prepare('insert into emp values (?,?,?,?)');
$rep->execute(array(3,'hhh','jjjjj','info'));
#-------------------------------------


$rep=$data->prepare('select * from emp');
$rep->execute();
$rep->setFetchMode(PDO::FETCH_NUM);
#$rep->setFetchMode(PDO::FETCH_ASSOC);
     while($l=$rep->fetch())
     {
    print_r($l);

   ?>
   <p> id : <?php   echo $l[0]; ?><br>
   	nom : <?php  echo $l[1] ;?><br>
   	prenom : <?php  echo $l[2] ;?><br>
   	dept : <?php  echo $l[3] ;?><br>



    </p>
    <?php
}
$rep->closeCursor();


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST' >
  


<fieldset>
  <legend>data</legend>
  Name : <input type="text" name="name">
  Prenom : <input type="text" name="pr">
  <input type="submit" value="send" name="send">

</fieldset>

</form>

<?php



if ($_SERVER['REQUEST_METHOD']=='POST') {


  if (isset($_POST['send'])) {
    echo "your name : ".$_POST['name'].' and your prenom : '.$_POST['pr'];
  }
 

  
}

?>

</body>
</html>