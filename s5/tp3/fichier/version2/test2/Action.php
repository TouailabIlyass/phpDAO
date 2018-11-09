<?php
require_once('Dao.php');
$dao= new Dao('myDB');

if (isset($_GET['table'],$_GET['id'],$_GET['action'])) {
	if ($_GET['action']=='editer') {

		$dao->createFormBoot($_GET['table'],$_GET['id']);
		header('Location: Ajout'.ucfirst($_GET['table']).'.php');
		
	}else if($_GET['action']=='supprimer')
	{
		$dao->delete($_GET['table'],$_GET['id']);

		header('Location: aff.php?table='.$_GET['table']);

		//print_r($_GET['id']);

		//$tab=unserialize($_GET['id']);
        //$cle=array_keys($tab);
       // print_r($cle);
        //print_r($tab);
	}
	else if($_GET['action']=='reserver')
	{
		          $tab=unserialize($_GET['id']);
                  
                  $dao->reserver([1,$tab['n_c']]);

               
	}
}
else if (isset($_GET['table'],$_GET['action'])) {
	
	if ($_GET['action']=='ajouter') {

			echo "string";

 			$dao->createFormBoot($_GET['table']);
		    header('Location: Ajout'.ucfirst($_GET['table']).'.php');
		}
	if (isset($_POST['Send'])) {

		if ($_GET['action']=='insert') {
			
		$dao->insert($_GET['table'],$_POST);

	}
	else if($_GET['action']=='update')
	{
		
		$dao->update($_GET['table'],$_POST,$_POST['cle']);
		
	}
	header('Location: aff.php?table='.$_GET['table']);
			
		}	
	

}else if(isset($_GET['action']) && $_GET['action']=='aff-reserv')
{

	header('Location: aff.php?reserv=true');
}
