<?php

include_once "indemniteDAO.php";

class indemnite extends indemniteDAO {
 

  private $id_indemnite;
  private $annee_indemnite;
  private $tarif_kilometrique;
 


 function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

function get_id_indemnite() {
    return $this->id_indemnite;
  }

function get_annee_indemnite() {
    return $this->annee_indemnite;
  }

function get_tarif_kilometrique() {
    return $this->tarif_kilometrique;
  }



//setter

   function set_id_indemnite($id_indemnite) {
    $this->id_indemnite = $id_indemnite;
  }

  function set_annee_indemnite($annee_indemnite) {
    $this->annee_indemnite = $annee_indemnite;
  }

  function set_tarif_kilometrique($tarif_kilometrique) {
    $this->tarif_kilometrique = $tarif_kilometrique;
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