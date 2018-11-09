<?php


class User{
  
private $nom,$prenom,$username,$password,$email;

public function __construct()
{
	$argv=func_get_args();

	switch (func_num_args()) {
		case 5:
			$this->__construct1($argv[0],$argv[1],$argv[2],$argv[3],$argv[4]);
			break;
		
		case 2:
			$this->__construct2($argv[0],$argv[1]);
			
	}

}
public function __construct1($n,$pr,$u,$p,$e)
{

$this->nom=$n;
$this->prenom=$pr;
$this->username=$u;
$this->password=$p;
$this->email=$e;
}


public function __construct2($u,$p)
{

$this->nom='none';
$this->prenom='none';
$this->username=$u;
$this->password=$p;
$this->email='none';
}

 
public function __destruct()
{

 echo '<br>supprission de obj create user<br>';
}

public function __toString()
{

 echo '<br> your name : '.$this->nom.
      '<br> your prenom :  '.$this->prenom.
      '<br> your username : '.$this->username.
      '<br> your password : '.$this->password.
      '<br> your email : '.$this->email.'<br>';
 
}

public function getName()
{
	return $this->nom;
}
public function getPrenom()
{
	return $this->prenom;
}

public function getUsername()
{
	return $this->username;
}
public function getPassword()
{
	return $this->password;
}

public function getEmail()
{
	return $this->email;
}


public function setName($n){ $this->nom=$n;}
public function setPrenom($n){ $this->prenom=$n;}
public function setUsername($n){ $this->username=$n;}
public function setPassword($n){ $this->password=$n;}
public function setEmail($n){ $this->email=$n;}

}
