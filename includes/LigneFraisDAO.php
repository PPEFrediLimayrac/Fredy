<?php

include_once "LigneFrais.php";
include_once "AvancerDAO.php";
include_once "indemniteDAO.php";
include_once "MotifDAO.php";
include_once "dao.php";

class LigneFraisDAO extends dao{


function findAllBy($pseudo_demandeur, $annee) {
    $sql = "select avancer.id_notedefrais, lignefrais.id_frais, lignefrais.datelignefrais,trajet_frais, km_frais, cout_trajet, cout_peage, cout_repas, cout_hebergement
      from lignefrais, notedefrais, demandeur, avancer
      where demandeur.id_demandeur=avancer.id_demandeur
      and avancer.id_frais=lignefrais.id_frais
      and notedefrais.id_notedefrais = avancer.id_notedefrais
      
      and pseudo_demandeur = :pseudo_demandeur
      and notedefrais.annee_notedefrais = :annee;";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":pseudo_demandeur" => $pseudo_demandeur,
                          ":annee" => $annee ));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new LigneFrais($row);
    }
    return $tableau; // Retourne un tableau d'objets
  }

  function findById($id) {
    $sql = "select * From lignefrais where id_frais=:id";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id" => $id));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
      
      $r = new LigneFrais($row);
      
     return $r;
     // Retourne un tableau d'objets
  }

function delete($id) {
    $sql = "SET FOREIGN_KEY_CHECKS=0;
DELETE FROM lignefrais WHERE
 lignefrais.id_frais=:id ;

SET FOREIGN_KEY_CHECKS=1;";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id" => $id));;
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
   
  }  
  

 function update($datelignefrais ,$trajet_frais, $km_frais , $cout_trajet, $cout_peage, $cout_hebergement, $cout_repas,$idBordereau){
     $sql = " UPDATE `lignefrais` SET `datelignefrais`=:datelignefrais,`trajet_frais`=:trajet_frais,`km_frais`=:km_frais,`cout_trajet`=:cout_trajet,`cout_peage`=:cout_peage,`cout_hebergement`=:cout_hebergement,`cout_repas`=:cout_repas WHERE lignefrais.id_frais=:idBordereau
";

    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":cout_trajet" => $cout_trajet,
        ":datelignefrais" => $datelignefrais,
        ":trajet_frais" => $trajet_frais,
        ":km_frais" => $km_frais,
        ":cout_peage" => $cout_peage,
        ":cout_hebergement" => $cout_hebergement,
        ":cout_repas" => $cout_repas,
        ":idBordereau" => $idBordereau
                ));;
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
  }


  function insert($datelignefrais ,$trajet_frais, $km_frais , $cout_trajet, $cout_peage, $cout_hebergement, $cout_repas){
  	 $sql = "insert into lignefrais (datelignefrais ,trajet_frais, km_frais , cout_trajet, cout_peage, cout_hebergement, cout_repas) values (:datelignefrais ,:trajet_frais, :km_frais , :cout_trajet, :cout_peage, :cout_hebergement, :cout_repas) ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":cout_trajet" => $cout_trajet,
      	":datelignefrais" => $datelignefrais,
      	":trajet_frais" => $trajet_frais,
      	":km_frais" => $km_frais,
      	":cout_peage" => $cout_peage,
      	":cout_hebergement" => $cout_hebergement,
      	":cout_repas" => $cout_repas,
      	      	));;
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

   $sql = "SELECT LAST_INSERT_ID() FROM lignefrais";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array());;
       $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
return $row;

}

function insertAvancer($idlignefrais, $idBordereau, $pseudo){

	   $sql = "SELECT id_demandeur FROM demandeur where pseudo_demandeur=:pseudo";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":pseudo" => $pseudo));
       $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    print_r($row);

  	 $sql = "insert into avancer(id_demandeur, id_frais, id_notedefrais) values (:id_demandeur, :id_frais, :id_notedefrais)";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_frais" => $idlignefrais,
      	":id_notedefrais" => $idBordereau,
      	":id_demandeur" => $row['id_demandeur']));
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }


}


}