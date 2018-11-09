<?php


class user{

public $id,$nom,$prenom,$username,$password,$email;

public function __construct()
{
  $a=func_get_args();

  if (func_num_args()==6)
  		$this->construct2($a);
  
  else
  	$this->construct1();
  

}

private function construct1()
{
  $this->id="";
  $this->nom="";
  $this->prenom="";
  $this->username="";
  $this->password="";
  $this->email="";
}

private function construct2($a)
{
  $this->id=$a[0];
  $this->nom=$a[1];
  $this->prenom=$a[2];
  $this->username=$a[3];
  $this->password=$a[4];
  $this->email=$a[5];
}


public function getId(){return $this->id;}
public function getNom(){return $this->nom;}
public function getPr(){return $this->prenom;}
public function getUsername(){return $this->username;}
public function getPass(){return $this->password;}
public function getEmail(){return $this->email;}

public static function  getAttr()
    {
      $attr=array();
      $attr[]="getId";
      $attr[]="getNom";
      $attr[]="getPr";
      $attr[]="getUsername";
      $attr[]="getPass";
      $attr[]="getEmail";
      return $attr;
    }


}