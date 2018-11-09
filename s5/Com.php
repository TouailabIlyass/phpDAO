<?php
class Com{

public $_Nom;
public $_Com;
public $_image;


public function __construct($n,$a,$b)
{
$this->_Nom=$n;
$this->_Com=$a;
$this->_image=$b;

}


public function Commenter()
{

  
  echo 
  "<tr>
	  <td>.$this->_Nom.</td>
	  <td>.$this->_Com</td>
	  <td>.<img src=$this->_image width=100 height=100></td>
  </tr> ";

} 

}
