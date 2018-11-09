<?php 


class User { 
   
     private $id;
private $nom;
private $prenom;
private $username;
private $password;
private $email;
private $photo;


   public function __construct()
   {
      $a=func_get_args();

      if (func_num_args()==0)
      $this->construct1();
  
      else
      $this->construct2($a);
      
   }

   public function construct1()
   {
      $this->id='';
$this->nom='';
$this->prenom='';
$this->username='';
$this->password='';
$this->email='';
$this->photo='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->nom=$a[1];
$this->prenom=$a[2];
$this->username=$a[3];
$this->password=$a[4];
$this->email=$a[5];
$this->photo=$a[6];

   }

   public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}
public function getPrenom(){ return $this->prenom;}
public function getUsername(){ return $this->username;}
public function getPassword(){ return $this->password;}
public function getEmail(){ return $this->email;}
public function getPhoto(){ return $this->photo;}


   public function setId($var){ $this->id=$var;}
public function setNom($var){ $this->nom=$var;}
public function setPrenom($var){ $this->prenom=$var;}
public function setUsername($var){ $this->username=$var;}
public function setPassword($var){ $this->password=$var;}
public function setEmail($var){ $this->email=$var;}
public function setPhoto($var){ $this->photo=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getNom";
$attr[]="getPrenom";
$attr[]="getUsername";
$attr[]="getPassword";
$attr[]="getEmail";
$attr[]="getPhoto";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="nom";
$Column[]="prenom";
$Column[]="username";
$Column[]="password";
$Column[]="email";
$Column[]="photo";


      return $Column;
   }

}
  