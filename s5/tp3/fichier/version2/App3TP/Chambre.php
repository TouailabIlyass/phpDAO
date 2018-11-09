<?php 


class Chambre { 
   
     private $n_c;
private $nblits;
private $climatisation;


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
      $this->n_c='';
$this->nblits='';
$this->climatisation='';

   }

   public function construct2($a)
   {
     $this->n_c=$a[0];
$this->nblits=$a[1];
$this->climatisation=$a[2];

   }

   public function getN_c(){ return $this->n_c;}
public function getNblits(){ return $this->nblits;}
public function getClimatisation(){ return $this->climatisation;}


   public function setN_c($var){ $this->n_c=$var;}
public function setNblits($var){ $this->nblits=$var;}
public function setClimatisation($var){ $this->climatisation=$var;}

    public  function getPrimaryKey()
    {
    $tab['n_c']=$this->n_c;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getN_c";
$attr[]="getNblits";
$attr[]="getClimatisation";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="n_c";
$Column[]="nblits";
$Column[]="climatisation";


      return $Column;
   }

}
  