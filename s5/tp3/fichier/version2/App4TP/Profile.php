<?php 


class Profile { 
   
     private $id;
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
$this->photo='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->photo=$a[1];

   }

   public function getId(){ return $this->id;}
public function getPhoto(){ return $this->photo;}


   public function setId($var){ $this->id=$var;}
public function setPhoto($var){ $this->photo=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getPhoto";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="photo";


      return $Column;
   }

}
  