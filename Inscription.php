<?php
session_start();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
include ('hashage.php');
include_once "includes\DemandeurDAO.php";
include_once "includes\Demandeur.php";
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
  <div class="hbg">
    <div class="hbg_resize"> 
    	<div class="form_Ins_Un">
        <form action="inscription.php" method="post" name="formulaire">   
	      	<p> Pseudo	<br /><input type="pseudo" name="pseudo_demandeur" value="" placeholder="Viktorus" required/></p>
    			<p> Mot de passe <br /><input type="password" name="mdp_demandeur" value="" placeholder="je suis un mot de passe" required/></p>
    			<p> Confirmer mot de passe <br /><input type="password" name="mdp_demandeur2" value="" placeholder="je suis un mot de passe" required/></p>
    			<p> Adresse mail <br /><input type="mail" name="mail_demandeur" value="" placeholder="Viktorus@fredi.fr" required/></p>
          <input type="submit" name="submit" value="s'inscrire"></br>
		 
      </form>
			 </div>
		</div>

<?php
          
           $pseudo_demandeur = isset($_POST['pseudo_demandeur']) ? $_POST['pseudo_demandeur'] : '';
           $mdp_demandeur = isset($_POST['mdp_demandeur']) ? $_POST['mdp_demandeur'] : '';
           $mdp_demandeur2 = isset($_POST['mdp_demandeur2']) ? $_POST['mdp_demandeur2'] : '';
           $mail_demandeur = isset($_POST['mail_demandeur']) ? $_POST['mail_demandeur'] : '';
           

           if ($submit){

            if($mdp_demandeur == $mdp_demandeur2){

               $crypt = hashage($mdp_demandeur);
               $tableau = array("pseudo_demandeur" => $pseudo_demandeur, "mail_demandeur"=> $mail_demandeur, "mdp_demandeur" => $crypt);
               $demandeur_object = new Demandeur($tableau);
              $DemandeurDAO = new DemandeurDAO();
             $DemandeurDAO->insert_demandeur($demandeur_object);

            }
            else {
              echo "les deux mots de passes sont différents";
            }
           }
?>
     
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      
      <h2> Informations </h2>
        <p> Notre service de remboursement n'est effectif que lorsque votre licence sportive est confirmée sur Toulouse. Cette licence doit faire partie des ligues affiliées à notre service. </p>
    </div>    
    <div class="clr"></div>
  </div>


  <?php 
    include('includes/footer.php');
  ?>
  
</div>
</body>
</html>
