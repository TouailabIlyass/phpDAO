<?php 


class Produit { 
   
     private $id;
private $nom;
private $prix;
private $description;
private $image;


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
$this->prix='';
$this->description='';
$this->image='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->nom=$a[1];
$this->prix=$a[2];
$this->description=$a[3];
$this->image=$a[4];

   }

   public function getId(){ return $this->id;}
public function getNom(){ return $this->nom;}
public function getPrix(){ return $this->prix;}
public function getDescription(){ return $this->description;}
public function getImage(){ return $this->image;}


   public function setId($var){ $this->id=$var;}
public function setNom($var){ $this->nom=$var;}
public function setPrix($var){ $this->prix=$var;}
public function setDescription($var){ $this->description=$var;}
public function setImage($var){ $this->image=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getNom";
$attr[]="getPrix";
$attr[]="getDescription";
$attr[]="getImage";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="nom";
$Column[]="prix";
$Column[]="description";
$Column[]="image";


      return $Column;
   }

}
  