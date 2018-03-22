<?php


include_once "dao.php";


class IndemniteDAO extends dao{

	function findByannee($annee){
    $sql = "select tarif_kilometrique from indemnite
      where annee_indemnite = :annee ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":annee" => $annee));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

   return $row ; 
  }



}