<?php 


class Login { 
   
     private $username;
private $password;


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
      $this->username='';
$this->password='';

   }

   public function construct2($a)
   {
     $this->username=$a[0];
$this->password=$a[1];

   }

   public function getUsername(){ return $this->username;}
public function getPassword(){ return $this->password;}


   public function setUsername($var){ $this->username=$var;}
public function setPassword($var){ $this->password=$var;}

    public  function getPrimaryKey()
    {
    $tab['username']=$this->username;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getUsername";
$attr[]="getPassword";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="username";
$Column[]="password";


      return $Column;
   }

}
  