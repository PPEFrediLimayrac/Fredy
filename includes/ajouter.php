
<?php

session_start();
include_once "LigneFrais.php";
include_once "NoteDeFrais.php";
$pseudo = $_SESSION['pseudo_demandeur'];
$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$datelignefrais = isset($_POST['datelignefrais']) ? $_POST['datelignefrais'] : '';
$trajet_frais = isset($_POST['trajet_frais']) ? $_POST['trajet_frais'] : '';
$km_frais = isset($_POST['km_frais']) ? $_POST['km_frais'] : '';
$cout_trajet = isset($_POST['cout_trajet']) ? $_POST['cout_trajet'] : '';
$cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : '';
$cout_hebergement= isset($_POST['cout_hebergement']) ? $_POST['cout_hebergement'] : '';
$cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : '';
$idBordereau = isset($_POST['idBordereau']) ? $_POST['idBordereau'] : '';
if(empty($idBordereau)){
$idBordereau = $_GET['idBordereau'];
}
if(empty($annee)){
$annee = $_GET['annee'];}




if($submit){
$object = new LigneFrais();
if(empty($idBordereau)){
$new = new NoteDeFrais();
$t = $new->insert($annee);
$idBordereau=$t['LAST_INSERT_ID()'];
}

$idlignefrais = $object->insert($datelignefrais ,$trajet_frais, $km_frais , $cout_trajet, $cout_peage, $cout_hebergement, $cout_repas);
$h = $idlignefrais['LAST_INSERT_ID()'];
$object->insertAvancer($h, $idBordereau, $pseudo );


 header('Location: ../Bordereau.php?annee='.$annee.'');
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Fredi</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="../style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../js/cufon-yui.js"></script>
  <script type="text/javascript" src="../js/arial.js"></script>
  <script type="text/javascript" src="../js/cuf_run.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">Fredi</a></h1>

      </div>
        <?php
          include('menuprincipal.php');
        ?>
               
      <div class="clr">
        
      </div>
    </div>
    
  </div>
  <div class="hbg">
    <div class="hbg_resize"> 
      <div class="form_Ins_Un">
        
      	<form method='post' action='ajouter.php'><br/>
<input type='date' name='datelignefrais' placeholder='Date du trajet'><br/><br/>
<input type='text' name='trajet_frais' placeholder='Trajet effectué'><br/><br/>
<input type='text' name='km_frais' placeholder='KM parcourus'><br/><br/>
<input type='text' name='cout_peage' placeholder='Coût des péages'><br/><br/>
<input type='text' name='cout_hebergement' placeholder='Coût hébergement'><br/><br/>
<input type='text' name='cout_repas' placeholder='Coût repas'><br/><br/>
<input type='hidden' name ='idBordereau' value=<?php echo $idBordereau; ?>><br/>
<input type='hidden' name ='annee' value=<?php echo $annee;?>><br/>
<input type='hidden' name='cout_trajet' placeholder='cout_trajet' value="0">
<input type='submit' name='submit' value='Envoyer le formulaire'>
</form>

      <div class="clr"></div>
    </div> 
  </div>
  
	<div class="content">
    <div class="content_resize">
      </br>
    </div>    
    <div class="clr"></div>
  </div>

  <?php
    include('footer.php');
  ?>
  </div>

</body>
</html>