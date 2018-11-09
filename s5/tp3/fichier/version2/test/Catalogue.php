<?php 


class Catalogue { 
   
     private $id;
private $path;


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
$this->path='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->path=$a[1];

   }

   public function getId(){ return $this->id;}
public function getPath(){ return $this->path;}


   public function setId($var){ $this->id=$var;}
public function setPath($var){ $this->path=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getPath";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="path";


      return $Column;
   }

}
  