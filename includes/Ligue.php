<?php

require_once 'ligueDAO.php';

class Ligue
{
  //attributs de la classe
  private $id_ligue;
  private $libelle_ligue;

 
   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe
  public function get_id_ligue() {
    return $this->id_ligue;
  }

 public  function get_libelle_ligue() {
    return $this->libelle_ligue;
  }


//setters de la classe

function set_id_ligue($id_ligue) {
    $this->id_ligue = $id_ligue;
  }

  function set_libelle_ligue($libelle_ligue) {
    $this->libelle_ligue = $libelle_ligue;
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