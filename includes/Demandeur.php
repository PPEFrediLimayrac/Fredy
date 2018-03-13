<?php

class demandeur 
{
  //attributs de la classe
  private $id_demandeur;
  private $mail_demandeur;
  private $mdp_demandeur;
  private $pseudo_demandeur;


   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe
  public function get_id_demandeur() {
    return $this->id_demandeur;
  }

 public function get_pseudo_demandeur() {
    return $this->pseudo_demandeur;
  }


 public  function get_mail_demandeur() {
    return $this->mail_demandeur;
  }

 public function get_mdp_demandeur() {
    return $this->mdp_demandeur;
  }


//setters de la classe

function set_id_demandeur($id_demandeur) {
    $this->id_demandeur = $id_demandeur;
  }
function set_pseudo_demandeur($pseudo_demandeur) {
    $this->pseudo_demandeur = $pseudo_demandeur;
  }
  function set_mail_demandeur($mail_demandeur) {
    $this->mail_demandeur = $mail_demandeur;
  }
 function set_mdp_demandeur($mdp_demandeur) {
    $this->mdp_demandeur = $mdp_demandeur;
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