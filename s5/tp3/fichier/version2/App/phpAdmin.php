<?php
require 'Dao.php';

     session_start(); 
     function XXX($list,$str=NULL)
     {     ?>
     	
     	   <form id="check" method="GET" action="phpAdmin.php">
     	   	<div id="flex-table">
     	   			<table><thead><th>X</th></thead><tbody>
					<?php
					

				for($i=0;$i<count($list);$i++)
				{
					?><tr><td><input type='checkbox' name="rows[<?php echo $list[$i]->getPrimaryKey();?>]"></td></tr>
			    <?php
				}
                ?></tbody>
            </table><?php
                    echo $str;
                    ?>
                    </div>
                	<input type="submit" name="traitement" value="Delete">
					<input type="submit" name="traitement" value="Edit">
					<input type="submit" name="traitement" value="Ajouter">

                </form>
                <?php
     }     

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<div id="parent-flex">
	<nav>
		<h2>Admin</h2>
		<ul class="db">
			<?php
                 //require 'bd.php';
                //$pdo=connect('phpmyadmin');
			     /*
					<li><a href='phpAdmin.php?dbname=<?php echo $value['Database']; ?>'><?php echo $value['Database'];?></a>
			     */
		


	           $pdo=new PDO("mysql:host=localhost",'root','');
                 $stmt=$pdo->prepare('show databases');
                 $stmt->execute();
                 foreach ($stmt->fetchAll() as $value) {
                ?>
                <li><?php echo $value['Database'];?>

                		<ul>
                			
                			<?php
                               //$p=connect($value['Database']);
                			$db=$value['Database'];
                			$p=new PDO("mysql:host=localhost;dbname=$db",'root','');
	                       $s=$p->prepare('show tables');
	                       $s->execute();
	                       foreach ($s->fetchAll() as $v) {
	                       	?>
                           <li><a href='phpAdmin.php?dbname=<?php echo $value['Database'];?>&table=<?php echo  $v['Tables_in_'.$value['Database']]; ?>'><?php echo $v['Tables_in_'.$value['Database']] ?></a></li>
	                       	<?php
	                       }



                		?>
                			
                		</ul>

                </li>

                   <?php
                 }
                 $stmt->closeCursor();
			?>


		</ul>

	</nav>
	<div id="ok">

		<?php
             
			if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['dbname'],$_GET['table']))
			{   
              if (!empty($_GET['dbname'] && !empty($_GET['table']))) {
              	  $db=$_GET['dbname'];
				 $table=$_GET['table'];
				 $_SESSION['dbname']=$db;
				 $_SESSION['table']=$table;
				 
				 
				 $dao = new Dao($db);
				 
				$list=$dao->getList($_GET['table'],true);
				$str=$dao->createTab();
				echo XXX($list,$str);
				
                
              }
			 
            
			}

			else if ($_SERVER['REQUEST_METHOD']=='GET') { 
			          $dao = new Dao($_SESSION['dbname']); 
				      if (isset($_GET['rows']) && $_GET['traitement']=='Delete'  ) {
                     
                     
                      for($i=0;$i<count($_GET['rows']);$i++)
                      $dao->delete($_SESSION['table'],array_keys($_GET['rows'])[$i]);
				    }
				  else if (isset($_GET['traitement']) && $_GET['traitement']=='Ajouter') {

					$file=$dao->createFormAjout($_SESSION['table']);

					include $file;


				}
				else if (isset($_GET['traitement'])&& isset($_GET['rows']) && $_GET['traitement']=='Edit') {
						
					    $f=$dao->createFormAjout($_SESSION['table'],false,false,false,array_keys($_GET['rows'])[0]);
                         
                         echo $f;
                         $_SESSION['update']=array_keys($_GET['rows'])[0];
                     
                         


				}
				
			}
			else if ($_SERVER['REQUEST_METHOD']=='POST') {
				$dao = new Dao($_SESSION['dbname']);
				if (isset($_SESSION['update'])) {
					
					$dao->update($_SESSION['table'],$_POST,$_SESSION['update']);
					unset($_SESSION['update']);
				}else
				{
					
				$dao->insert($_SESSION['table'],$_POST);
				$list=$dao->getList($_SESSION['table'],true);
				echo XXX($list,$dao->createTab());
			    }
			}

		?>

	</div>
</div>


<script type="text/javascript" src="jq-3.1.0.js"></script>
<script type="text/javascript">
	$(function(){

        $('.db > li').on('click',function(){

        	$(this).toggleClass('c');
        });

        $('table').attr({
        	border: '2px'
        });

	});


</script>
</body>
</html>

<?php
/*

<input type='checkbox' name="rows[<?php echo $tab ;?>]">
<table><thead>
		<?php

			if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['dbname'],$_GET['table']))
			{   
              if (!empty($_GET['dbname'] && !empty($_GET['table']))) {
              	require 'Dao.php';
				$db=$_GET['dbname'];
				//$stmt=$pdo->prepare("use $db");
				//$stmt->execute();
				//$stmt=$pdo->prepare("show tables");
				//$stmt->execute();
				$dao= new Dao($db);
				$list=$dao->getList($_GET['table'],true);
				$Column=$dao->getColumn($_GET['table']);
                    
				foreach ($Column as $value) {
					?>
					<th>
					  <?php
                           echo $value;
					  ?>
						</th>
						<?php
					}
                    ?>
                 </thead>
               <?php
              }
			 

			}

		?>
</table>

?>
*/