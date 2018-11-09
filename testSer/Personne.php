<?php
class Personne{

public $_Nom;
public $_Pr;


public function __construct($n,$a)
{
$this->_Nom=$n;
$this->_Pr=$a;

}


public function Commenter()
{

  
  echo 'your name '.$this->_Nom.'and your last name '.$this->_Pr.'<br>';

} 

}
