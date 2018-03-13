<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Fredi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="style.css" rel="stylesheet" type="text/css"/>
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
      <h2> Bienvenue <?php echo $_SESSION['pseudo_demandeur']; ?></h2>
        <div class="hbg_pos_center">
          <a class="buttonTempo" href="profilUtilisateur.php"><input type="button" name="profilUtilisateur" class="buttonTempo">Gestion de profil</a>
          </br>
          <a class="buttonTempo" href="bordereau.php"><input type="button" name="profilUtilisateur" class="buttonTempo">Accéder au Bordereau de frais</a>
        </div>
    </div>
  </div>
  <div class="content">
     
    <div class="clr"></div>
  </div>


  <?php 
    include('includes/footer.php');
  ?>
  
</div>
</body>
</html>