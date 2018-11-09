<?php 


class Emp { 
   
     private $id;
private $nom;
private $prenom;
private $dept;


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
$this->dept='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->nom=$a[1];
$this->prenom=$a[2];
$this->dept=$a[3];

   }

   public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}
public function getPrenom(){ return $this->prenom;}
public function getDept(){ return $this->dept;}


   public function setId($var){ $this->id=$var;}
public function setNom($var){ $this->nom=$var;}
public function setPrenom($var){ $this->prenom=$var;}
public function setDept($var){ $this->dept=$var;}

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
$attr[]="getDept";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="nom";
$Column[]="prenom";
$Column[]="dept";


      return $Column;
   }

}
  