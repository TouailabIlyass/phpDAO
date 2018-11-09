<?php 


class Etudiant { 
   
     private $id;
private $nom;
private $address;


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
$this->address='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->nom=$a[1];
$this->address=$a[2];

   }

   public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}
public function getAddress(){ return $this->address;}


   public function setId($var){ $this->id=$var;}
public function setNom($var){ $this->nom=$var;}
public function setAddress($var){ $this->address=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getNom";
$attr[]="getAddress";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="nom";
$Column[]="address";


      return $Column;
   }

}
  