<?php


include_once "Demandeur.php";
include_once "AdherentDAO.php";
include_once "RepresentantDAO.php";
include_once "dao.php";



class DemandeurDAO extends DAO {




function find($pseudo_demandeur, $mdp_demandeur) {
  $connexion = $this->get_connexion();
    $sql = "select demandeur.pseudo_demandeur, demandeur.mdp_demandeur from demandeur where pseudo_demandeur=:pseudo_demandeur and mdp_demandeur=:mdp_demandeur";
    try {
      $sth = $connexion->prepare($sql);
      $sth->execute(array(":pseudo_demandeur" => $pseudo_demandeur,
                          ":mdp_demandeur" => $mdp_demandeur));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $pseudo = $row ; 
    return $pseudo ;
    }


function insert_demandeur(demandeur $demandeur_object) {

 $connexion = $this->get_connexion();
 $sql = "INSERT INTO demandeur(pseudo_demandeur ,mdp_demandeur ,mail_demandeur, nom, prenom, adresse ) VALUES ( :pseudo_demandeur, :mdp_demandeur, :mail_demandeur, :nom, :prenom, :adresse)";
 try {
   $sth = $connexion->prepare($sql);

   $sth->execute(
           array(
               ":pseudo_demandeur" => $demandeur_object->get_pseudo_demandeur(),   
                ":mdp_demandeur" => $demandeur_object->get_mdp_demandeur(),
                ":mail_demandeur" => $demandeur_object->get_mail_demandeur(),
                ":nom" => $demandeur_object->get_nom(),
                ":prenom" => $demandeur_object->get_prenom(),  
                ":adresse" => $demandeur_object->get_adresse()    
   ));

 } catch (PDOException $e) {
   throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
 }


 /*$nb = $sth->rowcount();
 return $nb;  // Retourne le nombre d'insertion*/
}

}

?>

