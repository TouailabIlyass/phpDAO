<?php 


class Admin { 
   
     private $id;


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

   }

   public function construct2($a)
   {
     $this->id=$a[0];

   }

   public function getId(){ return $this->id;}


   public function setId($var){ $this->id=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";


      return $Column;
   }

}
  