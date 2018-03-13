<?php

class Avancer
{
  //attributs de la classe
  private $id_notedefrais;
  private $id_demandeur;
  private $id_frais;


   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe


   public function get_id_notedefrais() {
    return $this->id_notedefrais;
  }
  public function get_id_demandeur() {
    return $this->id_demandeur;
  }

 public  function get_id_frais() {
    return $this->id_frais;
  }

  
  
//setters de la classe

function set_id_notedefrais($id_notedefrais) {
    $this->id_notedefrais = $id_notedefrais;
  }
function set_prenom_adherent($prenom_adherent) {
    $this->prenom_adherent = $prenom_adherent;

}

function set_id_frais($id_frais) {
    $this->id_frais = $id_frais;
  }
 
    function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
  
}