<?php


class motif {
 

  private $id_motif;
  private $libelle_motif;

 


 function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

function get_id_motif() {
    return $this->id_motif;
  }

function get_libelle_motif() {
    return $this->libelle_motif;
  }





//setter

   function set_id_motif($id_motif) {
    $this->id_motif = $id_motif;
  }

  function set_libelle_motif($libelle_motif) {
    $this->libelle_motif = $libelle_motif;
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