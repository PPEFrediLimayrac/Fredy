<?php

include_once "BloqueDAO.php";
class Bloque extends BloqueDAO{

  private $nom_bloque;
  private $annee_bloque;
  private $id_bloque;


   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe
  public function get_nom_bloque() {
    return $this->nom_bloque;
  }

 public  function get_annee_bloque() {
    return $this->annee_bloque;
  }

 public function get_id_bloque() {
    return $this->id_bloque;
  }


//setters de la classe

function set_nom_bloque($nom_bloque) {
    $this->nom_bloque = $nom_bloque;
  }

  function set_annee_bloque($annee_bloque) {
    $this->annee_bloque = $annee_bloque;
  }
 function set_id_bloque($id_bloque) {
    $this->id_bloque= $id_bloque;
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