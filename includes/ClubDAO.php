<?php

include_once "LigueDAO.php";
include_once "dao.php";

class ClubDAO extends DAO{

	function findIdClub() {
      $sql = "select id_club, nom_club From club";
      try {
        $sth = self::get_connexion()->prepare($sql);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $r = new club($row);
        
      return $r;
       // Retourne un tableau d'objets
    }

    function findAll() {
      $sql = "SELECT * FROM club";
      try {
        $sth = self::get_connexion()->prepare($sql);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }
      $tableau = array();
      foreach ($rows as $row) {
        $tableau[] = new adherent($row);
      }
      return $tableau;
    }

}