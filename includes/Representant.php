<?php

class Representant 
{
  //attributs de la classe

  private $id_demandeur;
  private $nom_representant;
  private $prenom_representant;
  private $rue_representant;
  private $cp_representant;
  private $ville_representant;



   function __construct(array $tableau = null) {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }


// getters de la classe
   public function get_id_demandeur() {
    return $this->id_demandeur;
  }
  public function get_nom_representant() {
    return $this->nom_representant;
  }

 public  function get_prenom_representant() {
    return $this->prenom_representant;
  }

 public function get_rue_representant() {
    return $this->rue_representant;
  }
 public function get_cp_representant() {
    return $this->cp_representant;
  }
  public function get_ville_representant() {
    return $this->ville_representant;
  }
 

//setters de la classe
function set_id_demandeur($id_demandeur) {
    $this->id_demandeur = $id_demandeur;
  }

function set_nom_representant($nom_representant) {
    $this->nom_representant = $nom_representant;
  }

  function set_prenom_representant($prenom_representant) {
    $this->prenom_representant = $prenom_representant;
  }
 function set_rue_representant($rue_representant) {
    $this->rue_representant = $rue_representant;
  } 
  function set_cp_representant($cp_representant) {
    $this->cp_representant = $cp_representant;
  } 
  function set_ville_representant($ville_representant) {
    $this->ville_representant = $ville_representant;
  }
 
    function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
  



  public function index() {
    // Vérifie si l'utilisateur est connecté
    if (!Auth::est_authentifie()) {
      $this->redirect('utilisateur/login');
    }
    // Lecture de tous les utilisateurs
    $utilisateurDAO = new UtilisateurDAO();
    $utilisateurs = $utilisateurDAO->findAll();
    // Appele la vue 
    $this->show_view('utilisateur/index', array('utilisateurs' => $utilisateurs));
  }

  /**
   * Détails d'un utilisateur
   */
  public function details($id_utilisateur) {
    // Vérifie si l'utilisateur est connecté
    if (!Auth::est_authentifie()) {
      $this->redirect('utilisateur/login');
    }
    // Lecture du utilisateur
    $utilisateurDAO = new UtilisateurDAO();
    $utilisateur = $utilisateurDAO->find($id_utilisateur);
    // Appele la vue 
    $this->show_view('utilisateur/details', array(
        'utilisateur' => $utilisateur
    ));
  }

  /**
   * Inscrit un utilisateur
   */
  public function register() {
    // Formulaire saisi ?
    if ($this->request->exists("submit")) {
      // le formulaire est soumis
      $utilisateur = new Utilisateur(array(
          'login' => $this->request->get('login'),
          'password' => $this->request->get('password'),
          
      ));
      if (Auth::inscrire($utilisateur)) {
        Flash::add("Vous êtes inscrit !", 1);
      } else {
        Flash::add("Une erreur est survenue lors de l'inscription, veuillez réessayer SVP", 3);
      }
    } else {
      // Le formulaire n'a pas été soumis
      $utilisateur = new Utilisateur();
    }

    // Appele la vue 
    $this->show_view('utilisateur/register', array(
        'utilisateur' => $utilisateur,
        'action' => 'utilisateur/register'
    ));
  }

  /**
   * Connecte un utilisateur
   */
  public function login() {
    // Formulaire saisi ?
    if ($this->request->exists("submit")) {
      // le formulaire est soumis
      $utilisateur = new Utilisateur(array(
          'login' => $this->request->get('login'),
          'password' => $this->request->get('password')
              )
      );
      if (Auth::connecter($utilisateur)) {
        Flash::add("Vous êtes connecté !");
      } else {
        Flash::add("Erreur, veuillez réessayer SVP", 3);
      }
    } else {
      // Le formulaire n'a pas été soumis
      $utilisateur = new Utilisateur();
    }
    // Appele la vue 
    $this->show_view('utilisateur/login', array(
        'utilisateur' => $utilisateur,
        'action' => 'utilisateur/login'
    ));
  }

  /**
   * Connecte un utilisateur
   */
  public function logout() {
    if (Auth::deconnecter()) {
      // TODO : à cette instant, il n'y a plus de session donc ce message ne s'affichera jamais
      Flash::add("Vous êtes déconnecté !");
    } else {
      Flash::add("Erreur, impossible de vous déconnecter", 3);
    }
    // On redirige vers la page d'accueil
    $this->redirect('index');
  }

}


