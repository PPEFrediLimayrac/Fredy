<?php
	session_start();
	include_once "adherent.php";
	   include_once('Club.php');

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
	$ji = $_GET['ji'];
	$pseudo = $_SESSION['pseudo_demandeur'];
	if(empty($id_adherent)){
		$id_adherent = $_GET['id_adherent'];
	}

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
$clubs = new club();
    $rows2 = $clubs->findAll();

	echo "<form method='post' action='ModifierAdh.php' style='position: center;'><br/>
		<table>
			<tr><td>Licence</td><td><input type='text' name='licence_adherent' placeholder='licence_adherent' value='".$object->get_licence_adherent()."'></td></tr>
			<tr><td>Nom</td><td><input type='text' name='nom_adherent' placeholder='nom_adherent' value='".$object->get_nom_adherent()."'></td></tr>
			<tr><td>Prenom </td><td><input type='text' name='prenom_adherent' placeholder='prenom_adherent' value='".$object->get_prenom_adherent()."'></td></tr>
			
<tr><td><label for='club'>club</label><br /></td>
          <td>  <select name='nom_club' id='nom_club' required>";

          foreach ($rows2 as $club) {
             if($club->get_nom_club()==$ji){
              echo ' <option selected value='.$club->get_nom_club().'>'.$club->get_nom_club().'</option>';
            }
         
			else   {
				 echo ' <option value='.$club->get_nom_club().'>'.$club->get_nom_club().'</option>';
			}  }       
               echo "</select></td></tr>


			<tr><td>
			  Date de naissance</td><td><input type='date' name='date_naissance' placeholder='date_naissance' value='".$object->get_date_naissance()."'></td></tr>


			
			<tr><td>Rue</td><td><input type='text' name='rue_adherent' placeholder='rue_adherent' value='".$object->get_rue_adherent()."'></td></tr>

			<tr><td>CP </td><td><input type='text' name='cp_adherent' placeholder='cp_adherent' value='".$object->get_cp_adherent()."'></td></tr>
			<tr><td>Ville</td><td><input type='text' name='ville_adherent' placeholder='ville_adherent' value='".$object->get_ville_adherent()."'></td></tr>

			<tr><td><label for='sexe_adherent'>sexe  adherent</label><br /></td>
          <td>  <select name='sexe_adherent' id='sexe_adherent' required>";
          if ($object->get_sexe_adherent()== "Homme"){
				echo "<option selected value='Homme'>Homme</option>
               <option value='Femme'>Femme</option>";

          }
          else {
          	echo "<option value='Homme'>Homme</option>
               <option selected value='Femme'>Femme</option>";
          }
            
               echo "</select></td></tr>
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