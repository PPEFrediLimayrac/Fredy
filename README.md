# Fredy

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
Pour commencer il faut importer le fichier situé dans le dossier BDD nommé "db_fredy.sql" dans votre base  données.

Il est impératif que le projet parent soit dans un dossier nommé 'Fredy'.

Une fois la base de données installée, vous pourrez librement aller sur le site Fredy, en localhost. La page d'acceuil est index.php

Vous pourrez créer un utilisateur en accédant à la page de connexion en cliquant sur l'onglet "Connexion" puis "S'inscrire". Vous devez savoir que le mot de passe sera stocké dans la base de données en suivant une procédure de hashage, vous ne pourrez donc pas créer un Demandeur directement dans la base de données.

<h2> Demandeur </h2>
Nous considérons qu'un utilisateur inscrit est automatiquement un demandeur. Pour pouvoir gérer un adhérent il est demandé de le rajouter par le formulaire apparaissant sur la page "profilUtilisateur.php"


<h2> Ajouter adhérents </h2>
Pour ajouter un adhérent vous allez devoir renseigner plusieurs champs, avec notemment l'id du club de votre adhérent. Etant donné que vous ne pouvez pas connaître de tête les ID de chaque club, un tableau est présent en bas de la page d'ajout des adhérents, affichant les clubs disponnibles avec leur ID, vous pouvez vous y référer. 


<h2> Ajouter des clubs </h2>
Il n'existe pas d'interface permettant d'ajouter un club par le biais du site web. Si vous souhaitez rajouter / modifier / supprimer des clubs, vous devez aller directement sur la base de donnée et modifier la table "club". 


<h2> Modifier le tarif kilométrique </h2>
A chaque année est associée un tarif kilométrique. Lorsque vous souhaitez changer ce tarif kilométrique vous serrez invités à modifier cette valeur directement dans la base de données en INSERANT une nouvelle ligne dans la table, afin de garder une trace de chaque tarif kilométrique.

