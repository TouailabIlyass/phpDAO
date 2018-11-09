<?php 


class Xx { 
   
     private $id;
private $nom;


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

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->nom=$a[1];

   }

   public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}


   public function setId($var){ $this->id=$var;}
public function setNom($var){ $this->nom=$var;}

    public  function getPrimaryKey()
    {
    return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getNom";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="nom";


      return $Column;
   }

}
  