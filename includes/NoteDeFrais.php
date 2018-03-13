<?php

include_once "NoteDeFraisDAO.php";
class NoteDeFrais extends NoteDeFraisDAO{
 

  private $id_notedefrais;
  private $annee_notedefrais;

  private $id_motif;
  private $id_indemnite;

  private $les_lignesDeFrais;
  private $id_demandeur;


 function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

function get_id_notedefrais() {
    return $this->id_notedefrais;
  }

function get_annee_notedefrais() {
    return $this->annee_notedefrais;
  }

function get_id_motif() {
    return $this->id_motif;
  }

function get_id_indemnite() {
    return $this->id_indemnite;
  }
  function get_id_demandeur() {
    return $this->id_demandeur;
  }
function get_les_lignesDeFrais() {
    return $this->les_lignesDeFrais;
  }


//setter

   function set_id_notedefrais($id_notedefrais) {
    $this->id_notedefrais = $id_notedefrais;
  }

  function set_annee_notedefrais($annee_notedefrais) {
    $this->annee_notedefrais = $annee_notedefrais;
  }

  function set_id_motif($id_motif) {
    $this->id_motif = $id_motif;
  }

 function set_id_indemnite($id_indemnite) {
    $this->id_indemnite = $id_indemnite;
  }
  function set_id_demandeur($id_demandeur) {
    $this->id_demandeur = $id_demandeur;
  }
   function set_les_lignesDeFrais($les_lignesDeFrais) {
    $this->les_lignesDeFrais = $les_lignesDeFrais;
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