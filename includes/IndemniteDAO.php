<?php


include_once "dao.php";


class IndemniteDAO extends dao{

	function findByID($id_indemnite) {
    $sql = "select * from indemnite
      where id_indemnite = :id_indemnite ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":id_indemnite" => $id_indemnite));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

    $tableau = array();
    foreach ($rows as $row) {
      $tableau[] = new indemnite($row);
    }
    return $tableau; // Retourne un tableau d'objets
  }



}