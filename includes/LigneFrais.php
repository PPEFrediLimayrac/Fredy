<?php

include_once "LigneFraisDAO.php";
class LigneFrais extends LigneFraisDAO{
 

  private $id_frais;
  private $datelignefrais;
  private $trajet_frais;
  private $km_frais;
  private $cout_trajet;
  private $cout_peage;
  private $cout_hebergement;
  private $cout_repas;
  private $id_motif;
  private $id_indemnite;
private $adherent;
  private $id_notedefrais; 
 


  function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

function get_id_frais() {
    return $this->id_frais;
  }
  function get_adherent(){
    return $this->adherent;
  }

function get_datelignefrais() {
    return $this->datelignefrais;
  }

function get_trajet_frais() {
    return $this->trajet_frais;
  }

function get_km_frais() {
    return $this->km_frais;
  }

function get_cout_trajet() {
    return $this->cout_trajet;
  }

function get_cout_peage() {
    return $this->cout_peage;
  }

function get_cout_hebergement() {
    return $this->cout_hebergement;
  }

function get_cout_repas() {
    return $this->cout_repas;
  }
function get_id_notedefrais() {
    return $this->id_notedefrais;
  }
function get_id_motif() {
    return $this->id_motif;
  }

function get_id_indemnite() {
    return $this->id_indemnite;
  }  



//setter

   function set_id_frais($id_frais) {
    $this->id_frais = $id_frais;
  }

  function set_datelignefrais($datelignefrais) {
    $this->datelignefrais = $datelignefrais;
  }

   function set_trajet_frais($trajet_frais) {
    $this->trajet_frais = $trajet_frais;
  }
   function set_km_frais($km_frais) {
     $this->km_frais = $km_frais;
  }
  function set_cout_trajet($cout_trajet) {
    $this->cout_trajet = $cout_trajet;
  }
   function set_cout_peage($cout_peage) {
    $this->cout_peage = $cout_peage;
  }
   function set_cout_hebergement($cout_hebergement) {
     $this->cout_hebergement = $cout_hebergement;
  }
  function set_adherent($adherent) {
     $this->adherent = $adherent;
  }
  function set_cout_repas($cout_repas) {
    $this->cout_repas = $cout_repas;
  }
  function set_id_notedefrais($id_notedefrais) {
    $this->id_notedefrais = $id_notedefrais;
  }
  function set_id_motif($id_motif) {
    $this->id_motif = $id_motif;
  }

 function set_id_indemnite($id_indemnite) {
    $this->id_indemnite = $id_indemnite;
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