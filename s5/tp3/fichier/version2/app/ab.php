<?php
session_start();
require_once('Dao.php');
$dao= new Dao('myDB');
if(isset($_POST['Ajouter']))
                { 
                	//$tab=unserialize($_POST['x']);
                		$tab=unserialize($_POST['x']);
                    print_r($tab['n_c']);
                    $iduser=unserialize($_SESSION['login'])->getId();
                    print_r($iduser);
                     $pdo=new PDO("mysql:host=localhost;dbname=myDB",'root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
                     $stmt=$pdo->prepare('insert into reserv values(?,?,?)');
                     $stmt->execute([0,$iduser,$tab['n_c']]);
                    //$dao->insert('reserv',[0,$iduser,$tab['n_c']]);
                     header('Location: ac.php');
                }

