<?php
require 'Dao.php';

     session_start(); 
     function func($list)
     {     ?>
     	     <div>
     	   <form id="check" method="GET" action="phpAdmin2.php">
     	   	<div id="flex-table">
     	   			<table><thead><tr><th>X</th>
                    <?php
                      foreach (ucfirst($_SESSION['table'])::getColumn() as $v) {
                      	echo "<th>$v</th>";
                      }

                    ?>
                </thead><tbody>
					<?php
				for($i=0;$i<count($list);$i++)
				{
					?><tr><td><input type='checkbox' name='rows[<?php echo $list[$i]->getPrimaryKey();?>]'></td>
			    <?php
			    foreach (ucfirst($_SESSION['table'])::getAttr() as  $v2) {
			    	echo "<td>".$list[$i]->$v2()."</td>";
			    }
				}
                ?></tr></tbody>
            </table>
                    </div>
                	<input type="submit" name="traitement" value="Delete">
					<input type="submit" name="traitement" value="Edit">
					<input type="submit" name="traitement" value="Ajouter">

                </form>
                </div>
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
                 
		


	           $pdo=new PDO("mysql:host=localhost",'root','');
                 $stmt=$pdo->prepare('show databases');
                 $stmt->execute();
                 foreach ($stmt->fetchAll() as $value) {
                ?>
                <li><?php echo $value[0];?>

                		<ul>
                			
                			<?php
                               
                			$db=$value[0];
                			$p=new PDO("mysql:host=localhost;dbname=$db",'root','');
	                       $s=$p->prepare('show tables');
	                       $s->execute();
	                       foreach ($s->fetchAll() as $v) {
	                       	?>
                           <li><a href='phpAdmin2.php?dbname=<?php echo $value[0];?>&table=<?php echo  $v[0]; ?>'><?php echo $v[0] ?></a></li>
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

		<?php
             
			if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['dbname'],$_GET['table']))
			{   
              if (!empty($_GET['dbname'] && !empty($_GET['table']))) {
              	 
				 $_SESSION['dbname']=$_GET['dbname'];
				 $_SESSION['table']=$_GET['table'];
				 
				 
				 $dao = new Dao($_GET['dbname']);
				 
				$list=$dao->getList($_GET['table']);
				$str=$dao->createTab($_GET['table'],$list);
				echo func($list);
				
                
              }
			 
            
			}

			else if ($_SERVER['REQUEST_METHOD']=='GET') { 
			          
				      if (isset($_GET['rows']) && $_GET['traitement']=='Delete'  ) {
				      	$dao = new Dao($_SESSION['dbname']); 
                      for($i=0;$i<count($_GET['rows']);$i++)
                      $dao->delete($_SESSION['table'],array_keys($_GET['rows'])[$i]);
				    }
				  else if (isset($_GET['traitement']) && $_GET['traitement']=='Ajouter') {
				  		$dao = new Dao($_SESSION['dbname']);
					$file=$dao->createForm($_SESSION['table']);

					include $file;


				}
				else if (isset($_GET['traitement'])&& isset($_GET['rows']) && $_GET['traitement']=='Edit') {
						$dao = new Dao($_SESSION['dbname']);
					    $f=$dao->createForm($_SESSION['table'],false,false,false,array_keys($_GET['rows'])[0]);
                         
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
				$list=$dao->getList($_SESSION['table']);
				echo func($list);
			    }
			}
         
		?>

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

