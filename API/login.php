<?php
//
// top14server - Serveur web service RESTful
//
// Authentifie un client Android et renvoie une réponse JSON
// Exemple : http://192.168.26.1/Fredy/API/login.php?user=jef&password=jefjef
include "../includes/DemandeurDAO.php";
include "../includes/lignefrais.php";
include "../hashage.php";
include "inc/fonctions.inc.php";

//require_once "../src/config/init.php";



// Récupère les paramètres dans l'URL
$user = isset($_GET["user"]) ? $_GET["user"] : "";
$password = isset($_GET["password"]) ? $_GET["password"] : "";
$password = hashage($password);

// Vérifie si le user existe
if (isset($user) && isset($password)) {
	if($user != "" && $password != ""){
		//$demandeurDAO = new DemandeurDAO();
		//$demandeur = $demandeurDAO->findAllByMail($user);

		$DemandeurDAO = new DemandeurDAO();
        $demandeur = $DemandeurDAO->find($user, $password);
		
		if(  $demandeur['pseudo_demandeur']== $user && $demandeur['mdp_demandeur']== $password ){
		 $_SESSION['pseudo_demandeur'] = $user;
		//$demandeur = serialize($_SESSION['demandeur']);
      	//$demandeur = unserialize($demandeur);
      	/*echo "<pre>";
		print_r($demandeur);
		echo "</pre>";*/
		$trouve = null;
		 $lignefrais = new lignefrais();
		 $rows = $lignefrais->findAllBy($_SESSION['pseudo_demandeur'],date('YY'));



			foreach ($rows as $lignefrais) {
				if($lignefrais->get_datelignefrais() == date("Y")){
					$myLigne = array(
					 // "id_Ligne" => $ligne->get_Id_Ligne(), 
					  "Date" => $lignefrais->get_datelignefrais(), 
					  "Km" => $lignefrais->get_km_frais(), 
					  "CoutPeage" => $lignefrais->get_cout_peage(),  
					  "CoutRepas" =>$lignefrais->get_cout_repas(), 
					  "CoutHebergement" => $lignefrais->get_cout_hebergement(),  
					  "Trajet" => $lignefrais->get_trajet_frais(),      
					  "Adherent" => $lignefrais->get_adherent()  
					);
					$trouve[] = $myLigne;
				}
			}
		
		if($trouve != null){
			// $lesLignes = array(
			// 	"lesLignes" => $trouve
			// );
			$lesLignes = $trouve;
		}else {
			$lesLignes = "aucune ligne dans l'année courante";
		}
		 // Crée un token aléatoire (<PHP7)
		 $token = bin2hex(openssl_random_pseudo_bytes(15));
		 // Ajoute le token au fichier des tokens
		 add_token($token);
		}else{
			$lesLignes = "nope";
			$token = null;
		}
	}  
} else {
  $lesLignes = "user non authentifié";
  $token = null;
}

// Construit le format JSON
$json = build_json($lesLignes, $token, NULL);
// Envoie la réponse 
send_json($json);