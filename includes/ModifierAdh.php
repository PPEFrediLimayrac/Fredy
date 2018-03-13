<?php
	session_start();
	include_once "adherent.php";

	$id_adherent=isset($_POST['id_adherent']) ? $_POST['id_adherent'] : '';
	$licence_adherent=isset($_POST['licence_adherent']) ? $_POST['licence_adherent'] : '';
	$id_club=isset($_POST['id_club']) ? $_POST['id_club'] : '';
	$nom_adherent=isset($_POST['nom_adherent']) ? $_POST['nom_adherent'] : '';
	$prenom_adherent=isset($_POST['prenom_adherent']) ? $_POST['prenom_adherent'] : '';
	$date_naissance=isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '';
	$ville_adherent=isset($_POST['ville_adherent']) ? $_POST['ville_adherent'] : '';
	$cp_adherent=isset($_POST['cp_adherent']) ? $_POST['cp_adherent'] : '';
	$rue_adherent=isset($_POST['rue_adherent']) ? $_POST['rue_adherent'] : '';
	$sexe_adherent=isset($_POST['sexe_adherent']) ? $_POST['sexe_adherent'] : '';

	$pseudo = $_SESSION['pseudo_demandeur'];
	if(empty($id_adherent)){
		$id_adherent = $_GET['id_adherent'];
	}
	echo $id_adherent;
	$object = new adherent();
	$object = $object->findByID($id_adherent);
	$submit = isset($_POST['submit']);
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
        <h1><a href="../index.php">Fredi</a></h1>

      </div>
        <?php
          include('menuprincipal.php');
        ?>
               
      <div class="clr"></div>
    </div>
  </div>
<div class="hbg">
    <div class="hbg_resize"> 
    	<div class="form_Ins_Un">
<?php

	echo "<form method='post' action='ModifierAdh.php' style='position: center;'><br/>
		<table>
			<tr><td>Licence</td><td><input type='licence_adherent' name='licence_adherent' placeholder='licence_adherent' value=".$object->get_licence_adherent()."></td></tr>
			<tr><td>Nom</td><td><input type='nom_adherent' name='nom_adherent' placeholder='nom_adherent' value=".$object->get_nom_adherent()."></td></tr>
			<tr><td>Prenom </td><td><input type='prenom_adherent' name='prenom_adherent' placeholder='prenom_adherent' value=".$object->get_prenom_adherent()."></td></tr>
			
			<tr><td>Date naissance</td><td><input type='date_naissance' name='date_naissance' placeholder='date_naissance' value=".$object->get_date_naissance()."><br/>
			<tr><td>Rue</td><td><input type='rue_adherent' name='rue_adherent' placeholder='rue_adherent' value=".$object->get_rue_adherent()."></td></tr>
			<tr><td>CP </td><td><input type='cp_adherent' name='cp_adherent' placeholder='cp_adherent' value=".$object->get_cp_adherent()."></td></tr>
			<tr><td>Ville</td><td><input type='ville_adherent' name='ville_adherent' placeholder='ville_adherent' value=".$object->get_ville_adherent()."></td></tr>
			<tr><td>Sexe</td><td><input type='sexe_adherent' name='sexe_adherent' placeholder='sexe_adherent' value=".$object->get_sexe_adherent()."></td></tr>
			<input type='hidden' name ='id_adherent' value='".$id_adherent."'>
			<tr><td><input type='submit' name='submit' value='Valider les modifications'></td>
		</table>
	</form>";


	if ($submit){
	$object->update($licence_adherent,$nom_adherent,$prenom_adherent,$date_naissance,$rue_adherent,$cp_adherent,$ville_adherent,$sexe_adherent,$id_adherent );
	header('Location: ../profilUtilisateur.php');
	}
?>
		</div>
	</div>
</div>