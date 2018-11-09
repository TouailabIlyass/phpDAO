<?php




class emp{


	private $id,$nom,$prenom,$dept;

	public function __construct()
	{
      $a=func_get_args();
      if (func_num_args()==4) {
      	$this->construct2($a);
      }
      else 
      	$this->construct1();
     
	}

	private function construct1()
	{
	   $this->id='';
     $this->nom='';
     $this->prenom='';
     $this->dept='';
	}
	private function construct2($a)
	{
	   $this->id=$a[0];
     $this->nom=$a[1];
     $this->prenom=$a[2];
     $this->dept=$a[3];
	}
	
    
    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getPrenom(){return $this->prenom;}
    public function getDept(){return $this->dept;}

    public static function getAttr()
    {
      $attr=array();
      $attr[]="getId";
      $attr[]="getNom";
      $attr[]="getPrenom";
      $attr[]="getDept";
      return $attr;
    }

}