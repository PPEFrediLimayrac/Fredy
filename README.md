# Fredi

Projet réalisé par :

<ul> 
  <li>ALARY Adrien </li>
  <li>JOSEPH Clément </li>
  <li>MARIAUD Téophile </li>
  <li>PASQUIER Victor </li>
</ul>

Un jeu de test est disponible dans la base de données,
il faut importer cette dernière: db_fredi.

Il reste quelques erreurs qui vont être modifiées promptement.

Ce site comprend un système de connexion, une gestion des données des adhérents/demandeurs ainsi qu' un gestionnaire de bordereau de frais.


<h2> Guide d'installation </h2>
Pour commencer il faut importer le fichier situé dans le dossier BDD nommé "db_fredi.sql" dans votre base  données.

Une fois la base de données installée, vous pourrez librement aller sur le site fredi, en localhost. La page d'acceuil est index.php

Vous pourrez créer un utilisateur en accédant à la page de connexion en cliquant sur l'onglet "Connexion" puis "S'inscrire". Vous devez savoir que le mot de passe sera stocké dans la base de données en suivant une procédure de hashage, vous ne pourrez donc pas créer un Demandeur directement dans la base de données.

<h2> Demandeur </h2>
Nous considérons qu'un utilisateur inscrit est automatiquement un demandeur. Pour pouvoir gérer un adhérent il est demandé de le rajouter par le formulaire apparaissant sur la page "profilUtilisateur.php"


<h2> Ajouter adhérents </h2>
Pour ajouter un adhérent vous allez devoir renseigner plusieurs champs, avec notemment l'id du club de votre adhérent. Etant donné que 
