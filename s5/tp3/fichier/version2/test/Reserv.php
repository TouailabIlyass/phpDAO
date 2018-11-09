<?php 


class Reserv { 
   
     private $id;
private $iduser;
private $idch;


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
$this->iduser='';
$this->idch='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->iduser=$a[1];
$this->idch=$a[2];

   }

   public function getId(){ return $this->id;}
public function getIduser(){ return $this->iduser;}
public function getIdch(){ return $this->idch;}


   public function setId($var){ $this->id=$var;}
public function setIduser($var){ $this->iduser=$var;}
public function setIdch($var){ $this->idch=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getIduser";
$attr[]="getIdch";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="iduser";
$Column[]="idch";


      return $Column;
   }

}
  