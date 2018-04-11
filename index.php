<?php 
    session_start(); 
    include_once "includes/init.php";
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
          include('includes/menuPrincipal.php');
        ?>
               
      <div class="clr"></div>
    </div>
  </div>
  <div class="hbg">
    <div class="hbg_resize"> <img src="images/accueil.jpg" width="446" height="210" alt="Image accueil" class="hbgimg" />
      <h2> Fredi </h2>
      <p class="hbg_text1"> 
          Le site Fredi vous permet de générer des notes de frais afin de vous faire rembourser vos déplacements générés par les compétitions.
      </p>
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