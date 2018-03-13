<?php


//include_once "adherent.php";
include_once "ClubDAO.php";
include_once "dao.php";

class AdherentDAO extends dao{

  function findAllByPseudo($pseudo_demandeur) {
      $sql = "SELECT licence_adherent, nom_adherent, prenom_adherent, date_naissance, rue_adherent, cp_adherent, ville_adherent, sexe_adherent, nom_club, libelle_ligue, id_adherent
        FROM adherent, demandeur, club, ligue
        WHERE demandeur.id_demandeur=adherent.id_demandeur
        AND adherent.id_club=club.id_club
        AND club.id_ligue = ligue.id_ligue 
        AND pseudo_demandeur = :pseudo_demandeur";
      try {
        $sth = self::get_connexion()->prepare($sql);
        $sth->execute(array(":pseudo_demandeur" => $pseudo_demandeur));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $tableau = array();
      foreach ($rows as $row) {
        $tableau[] = new adherent($row);

      }
      return $tableau; // Retourne un tableau d'objets
  }


    function insert_adherent(Adherent $adherent_object, $pseudo_demandeur) {

        $sql = "select id_demandeur From demandeur where pseudo_demandeur=:pseudo_demandeur";
      try {
        $sth = self::get_connexion()->prepare($sql);
        $sth->execute(array(":pseudo_demandeur" => $pseudo_demandeur));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      


          $connexion = $this->get_connexion();
          $sql = "insert into adherent(licence_adherent,nom_adherent,prenom_adherent,date_naissance,rue_adherent,cp_adherent,ville_adherent,sexe_adherent,id_club, id_demandeur) Values (:licence_adherent,:nom_adherent,:prenom_adherent,:date_naissance,:rue_adherent,:cp_adherent,:ville_adherent,:sexe_adherent,:id_club, :id_demandeur) ";
          try 
          {
            $sth = $connexion->prepare($sql);
            $sth->execute(
              array(
                  ":licence_adherent" => $adherent_object->get_licence_adherent(),
                  ":nom_adherent" => $adherent_object->get_nom_adherent(),
                  ":prenom_adherent" => $adherent_object->get_prenom_adherent(),
                  ":date_naissance" => $adherent_object->get_date_naissance(),
                  ":rue_adherent" => $adherent_object->get_rue_adherent(),
                  ":cp_adherent" => $adherent_object->get_cp_adherent(),
                  ":ville_adherent" => $adherent_object->get_ville_adherent(),
                  ":sexe_adherent" => $adherent_object->get_sexe_adherent(),
                  ":id_club" => $adherent_object->get_id_club(),
                  ":id_demandeur" => $result['id_demandeur']
              )
            );
    			}catch (PDOException $e) 
          {
              throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
          }
    }


    function findByID($id_adherent) {
      $sql = "select * From adherent where id_adherent=:id_adherent";
      try {
        $sth = self::get_connexion()->prepare($sql);
        $sth->execute(array(":id_adherent" => $id_adherent));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $r = new adherent($row);
        
      return $r;
       // Retourne un tableau d'objets
    }

    function deleteAdh($id) {
    $sql = "SET FOREIGN_KEY_CHECKS=0;
            DELETE FROM adherent WHERE
            adherent.id_adherent=:id ;
            SET FOREIGN_KEY_CHECKS=1;";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id" => $id));
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
   
  }  
  

 function update($licence_adherent,$nom_adherent,$prenom_adherent,$date_naissance,$rue_adherent,$cp_adherent,$ville_adherent,$sexe_adherent, $id_adherent){
     $sql = " UPDATE `adherent` SET `licence_adherent`=:licence_adherent,`nom_adherent`=:nom_adherent,`prenom_adherent`=:prenom_adherent,`date_naissance`=:date_naissance,`cp_adherent`=:cp_adherent,`rue_adherent`=:rue_adherent,`ville_adherent`=:ville_adherent, `sexe_adherent`=:sexe_adherent WHERE adherent.id_adherent=:id_adherent";

    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":licence_adherent" => $licence_adherent,
        ":nom_adherent" => $nom_adherent,
        ":prenom_adherent" => $prenom_adherent,
        ":date_naissance" => $date_naissance,
        ":rue_adherent" => $rue_adherent,
        ":cp_adherent" => $cp_adherent,
        ":ville_adherent" => $ville_adherent,
        ":sexe_adherent" => $sexe_adherent,
        ":id_adherent" => $id_adherent
                ));;
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
  }
}
?>