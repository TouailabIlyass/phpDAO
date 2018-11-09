<?php 


class Test { 
   
     private $nom;
private $pr;
private $id1;
private $id2;


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
      $this->nom='';
$this->pr='';
$this->id1='';
$this->id2='';

   }

   public function construct2($a)
   {
     $this->nom=$a[0];
$this->pr=$a[1];
$this->id1=$a[2];
$this->id2=$a[3];

   }

   public function getNom(){ return $this->nom;}
public function getPr(){ return $this->pr;}
public function getId1(){ return $this->id1;}
public function getId2(){ return $this->id2;}


   public function setNom($var){ $this->nom=$var;}
public function setPr($var){ $this->pr=$var;}
public function setId1($var){ $this->id1=$var;}
public function setId2($var){ $this->id2=$var;}

    public  function getPrimaryKey()
    {
    $tab['id1']=$this->id1;
$tab['id2']=$this->id2;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getNom";
$attr[]="getPr";
$attr[]="getId1";
$attr[]="getId2";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="nom";
$Column[]="pr";
$Column[]="id1";
$Column[]="id2";


      return $Column;
   }

}
  