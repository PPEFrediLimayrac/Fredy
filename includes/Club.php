<?php

require_once 'clubDAO.php';

class Club extends ClubDAO{

  private $id_club;
  private $nom_club;
  private $adresse_club;
  private $cp_club;
  private $ville_club;
  private $sigle_club;
  private $nom_president;
  private $id_ligue;


   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe
  public function get_id_club() {
    return $this->id_club;
  }

 public  function get_nom_club() {
    return $this->nom_club;
  }

 public function get_adresse_club() {
    return $this->adresse_club;
  }
 public function get_cp_club() {
    return $this->cp_club;
  }
  public function get_ville_club() {
    return $this->ville_club;
  }
  public function get_sigle_club() {
    return $this->sigle_club;
  }
  public function get_nom_president() {
    return $this->nom_president;
  }
  public function get_id_ligue() {
    return $this->id_ligue;
  }

//setters de la classe

function set_id_club($id_club) {
    $this->id_club = $id_club;
  }

  function set_nom_club($nom_club) {
    $this->nom_club = $nom_club;
  }
 function set_adresse_club($adresse_club) {
    $this->adresse_club= $adresse_club;
  } 
  function set_cp_club($cp_club) {
    $this->cp_club = $cp_club;
  } 
  function set_ville_club($ville_club) {
    $this->ville_club = $ville_club;
  }
 
 function set_sigle_club($sigle_club) {
    $this->sigle_club = $sigle_club;
  }
   function set_nom_president($nom_president) {
    $this->nom_president = $nom_president;
  }
  function set_id_ligue($id_ligue) {
    $this->id_ligue = $id_ligue;
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