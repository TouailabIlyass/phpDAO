<?php 


class Note { 
   
     private $id;
private $etudiant_id;
private $annee;
private $niveau;
private $matiere;
private $note;


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
$this->etudiant_id='';
$this->annee='';
$this->niveau='';
$this->matiere='';
$this->note='';

   }

   public function construct2($a)
   {
     $this->id=$a[0];
$this->etudiant_id=$a[1];
$this->annee=$a[2];
$this->niveau=$a[3];
$this->matiere=$a[4];
$this->note=$a[5];

   }

   public function getId(){ return $this->id;}
public function getEtudiant_id(){ return $this->etudiant_id;}
public function getAnnee(){ return $this->annee;}
public function getNiveau(){ return $this->niveau;}
public function getMatiere(){ return $this->matiere;}
public function getNote(){ return $this->note;}


   public function setId($var){ $this->id=$var;}
public function setEtudiant_id($var){ $this->etudiant_id=$var;}
public function setAnnee($var){ $this->annee=$var;}
public function setNiveau($var){ $this->niveau=$var;}
public function setMatiere($var){ $this->matiere=$var;}
public function setNote($var){ $this->note=$var;}

    public  function getPrimaryKey()
    {
    $tab['id']=$this->id;
return serialize($tab);
    }

   public static function getAttr()
   {  
        

        $attr[]="getId";
$attr[]="getEtudiant_id";
$attr[]="getAnnee";
$attr[]="getNiveau";
$attr[]="getMatiere";
$attr[]="getNote";

        return $attr;
   }

   public static function getColumn()
   {  
      

      $Column[]="id";
$Column[]="etudiant_id";
$Column[]="annee";
$Column[]="niveau";
$Column[]="matiere";
$Column[]="note";


      return $Column;
   }

}
  