<?php

include_once "AdherentDAO.php";

class Adherent extends AdherentDAO{
  //attributs de la classe
  
  private $id_adherent;
  private $licence_adherent;
  private $id_demandeur;
  private $nom_adherent;
  private $prenom_adherent;
  private $date_naissance;
  private $rue_adherent;
  private $cp_adherent;
  private $ville_adherent;
  private $sexe_adherent;
  private $id_club;
  private $nom_club;
  private $libelle_ligue;
  private $lesClubs;

    function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe


  public function get_id_adherent() {
    return $this->id_adherent;
  }
  public function get_id_demandeur() {
    return $this->id_demandeur;
  }
  public function get_licence_adherent() {
    return $this->licence_adherent;
  }
  public  function get_nom_adherent() {
    return $this->nom_adherent;
  }
  public function get_prenom_adherent() {
    return $this->prenom_adherent;
  }
  public function get_date_naissance() {
    return $this->date_naissance;
  }
  public function get_rue_adherent() {
    return $this->rue_adherent;
  }
  public function get_cp_adherent() {
    return $this->cp_adherent;
  }
  public function get_ville_adherent() {
    return $this->ville_adherent;
  }
  public function get_sexe_adherent() {
    return $this->sexe_adherent;
  }
  public function get_id_club() {
    return $this->id_club;
  }
  public function get_nom_club() {
    return $this->nom_club;
  }
  public function get_libelle_ligue() {
    return $this->libelle_ligue;
  }
  

  
//setters de la classe
  function set_id_demandeur($id_demandeur) {
    $this->id_demandeur = $id_demandeur;
  }
  function set_id_adherent($id_adherent) {
    $this->id_adherent = $id_adherent;
  }
function set_licence_adherent($licence_adherent) {
    $this->licence_adherent = $licence_adherent;
  }

  function set_nom_adherent($nom_adherent) {
    $this->nom_adherent = $nom_adherent;
  }
 function set_prenom_adherent($prenom_adherent) {
    $this->prenom_adherent = $prenom_adherent;
  } 
  function set_date_naissance($date_naissance) {
    $this->date_naissance = $date_naissance;
  } 
  function set_rue_adherent($rue_adherent) {
    $this->rue_adherent = $rue_adherent;
  }
  function set_cp_adherent($cp_adherent) {
    $this->cp_adherent = $cp_adherent;
  }
   function set_ville_adherent($ville_adherent) {
    $this->ville_adherent = $ville_adherent;
  }
   function set_sexe_adherent($sexe_adherent) {
    $this->sexe_adherent = $sexe_adherent;
  }
  function set_id_club($id_club) {
      $this->id_club = $id_club;
  }
  function set_nom_club($nom_club){
      $this->nom_club = $nom_club;
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