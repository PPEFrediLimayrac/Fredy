<?php
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
include ('hashage.php');
include_once "includes\DemandeurDAO.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Fredi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/arial.js"></script>
  <script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">Fredi</a></h1>

      </div>
        <?php
          include('includes/menuprincipal.php');
        ?>
               
      <div class="clr"></div>
    </div>
  </div>
  
  <div class="hbg" >
    <div class="hbg_resize"> <img src="images/tennisConnexion.jpg" width="446" height="290" alt="Image accueil" class="hbgimg" />
      <h2> Informations </h2>
      <form action="connexion.php" method="post" name="formulaire">  
		<p> Veuillez remplir le formulaire</p>
        <p>Pseudo <br /><input type="text" name="pseudo_demandeur" placeholder="jean-paul" required/></p>
        <p> Mot de passe <br /><input type="password" name="mdp_demandeur" value="" placeholder="Viktorus" required/></p>
		<input type="submit" name="submit" value="Se connecter"></br></br>
</form>

 <?php

if(isset($_GET['inscription'])){
                        echo"<b><font color='orange'> Vous venez bien de vous inscrire, veuillez vous connecter.</font></b></br>";
                      }
          

          $pseudo_demandeur = isset($_POST['pseudo_demandeur']) ? $_POST['pseudo_demandeur'] : '';
           $mdp_demandeur = isset($_POST['mdp_demandeur']) ? $_POST['mdp_demandeur'] : '';
       
            $crypt = hashage($mdp_demandeur); 
        
         
            
        if ($submit) 
 
        

        {
           
            
            
            $DemandeurDAO = new DemandeurDAO();
            $demandeur = $DemandeurDAO->find($pseudo_demandeur, $crypt);
            
            
            if ( $demandeur['pseudo_demandeur']== $pseudo_demandeur && $demandeur['mdp_demandeur']== $crypt) {
                
                $_SESSION['pseudo_demandeur'] = $pseudo_demandeur;
                
                
                header('Location: apresconnexion.php');
                
              
            
              }
            else 
            {
                echo '<script type="text/javascript">
                      alert("Utilisateur ou mot de passe non reconnu ");
                      </script>';   
            }
        }
    ?>


		<a href="mdp_Oublie.php">   Mot de passe oublié ? </a></br>
	    <a href="inscription.php">   Pas encore inscrit ? </a>
	       
	    
	  </div>
    </div>
  </div>
      
  <div class="content">
    <div class="content_resize">
      
      
        <p> Veuillez vous connecter afin de procéder à la saisie de vos frais. Ces frais seront analysés par le trésorier et validés fin décembre. Votre bon de remboursement sera valide en janvier.</p>
    </div>    
    <div class="clr"></div>
  </div>

  <?php 
    include('includes/footer.php');
  ?>
  
</div>

</body>
</html>