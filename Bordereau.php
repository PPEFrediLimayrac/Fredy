
<?php
  session_start();
  include_once "includes\NoteDeFrais.php";
  include_once "includes\LigneFrais.php";
  include_once "includes\bloque.php";
  include_once "includes\indemnite.php";

  $submit = isset($_POST['submit']) ? $_POST['submit'] : '';
  $lignefrais = new lignefrais();
 

  if($submit)
  {
    $annee= $_POST['annee'] ? $_POST['annee'] : '';
  }
  if(isset($_GET['annee']))
  {
    $annee=$_GET['annee'];
  }
  if(empty($annee)) {
    $annee = date("Y");
  }



  $valider =  isset($_POST['validerr']) ? $_POST['validerr'] : '';
  $pro = new bloque();
  $rows = $lignefrais->findAllBy($_SESSION['pseudo_demandeur'],$annee);

  if(!empty($valider)){
    
    $pro->insert($_SESSION['pseudo_demandeur'],$annee);

  }
  $pros = $pro->findAllBy($_SESSION['pseudo_demandeur'],$annee);


//  $indemnite = new indemnite();
//  $tarifKm = $indemnite->findByID($lignefrais->get_id_indemnite());
//  $tarifKm = $indemnite->get_tarif_kilometrique();
 // var_dump($tarifKm);
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
               
      <div class="clr">
        
      </div>
    </div>
    
  </div>
  <div class="hbg">
    <div class="hbg_resize"> 
      <div class="form_Ins_Un">
        <center>
        <form method="post" action="Bordereau.php">
          <SELECT name="annee" size="1">
            <OPTION>2014
            <OPTION>2015
            <OPTION>2016
            <OPTION>2017
            <OPTION>2018
          </SELECT>
          <input type='submit' name='submit' value='Choisir cette année'>
        </FORM>
      </center> 
      <?php echo "année en cours : ".$annee; ?>

        <table border=1 cellspacing=1 cellpadding=2 bordercolor="black">
            <caption><h1>Tableau des notes de frais </h1></caption>
            <tr>
              <th>ID ligne frais</th>
              <th>Date</th>
              <th>Trajet</th>   
              <th>Kms parcourus</th>
              <th>Coût Trajet</th>
              <th>Péages</th>
              <th>Repas</th>
              <th>Hebergement</th>
              <th>Total</th>
              <th>Modifier</th> 
              <th>Supprimer</th>             
            </tr>
            <?php 

             $tarifKm = new indemnite();
             $tarifKm = $tarifKm->findByAnnee($annee);

              foreach ($rows as $lignefrais) 
              {
               // $abcd = $lignefrais->get_id_frais();
                $total =$lignefrais->get_trajet_frais()+($lignefrais->get_km_frais()*$tarifKm->get_tarif_kilometrique())+$lignefrais->get_cout_trajet()+$lignefrais->get_cout_peage()+$lignefrais->get_cout_repas()+$lignefrais->get_cout_hebergement();

                if(empty($pros['id_bloque']) )
                {  
                  echo('<tr>
                  <td>'.$lignefrais->get_id_frais().'</td>
                  <td>'.$lignefrais->get_datelignefrais().'</td>
                  <td>'.$lignefrais->get_trajet_frais().'</td>
                  <td>'.$lignefrais->get_km_frais().'</td>
                  <td>'.$lignefrais->get_cout_trajet().'</td>
                  <td>'.$lignefrais->get_cout_peage().'</td>
                  <td>'.$lignefrais->get_cout_repas().'</td>
                  <td>'.$lignefrais->get_cout_hebergement().'</td>
                    <td>'.$total.'</td>
                  <td><a href="includes/Modifier.php?idBordereau='.$lignefrais->get_id_frais().'&annee='.$annee.'"><img src="images/modif.jpg" width="60" height="60"></td>
                  <td><a href="includes/supprimer.php?idBordereau='.$lignefrais->get_id_frais().'&annee='.$annee.'"><img src="images/delete.png" width="60" height="60" style="positio
                  n: center;"></a></td>
                  </tr>');   
                }else
                {
                  echo('<tr>
                      <td>'.$lignefrais->get_id_frais().'</td>
                      <td>'.$lignefrais->get_datelignefrais().'</td>
                      <td>'.$lignefrais->get_trajet_frais().'</td>
                      <td>'.$lignefrais->get_km_frais().'</td>
                      <td>'.$lignefrais->get_cout_trajet().'</td>
                      <td>'.$lignefrais->get_cout_peage().'</td>
                      <td>'.$lignefrais->get_cout_repas().'</td>
                      <td>'.$lignefrais->get_cout_hebergement().'</td>
                      <td>'.$total.'</td>
                      <td></td>
                      <td></td>
                    </tr>');
                }
              }
            ?>
        </table> 
      <?php 
        if(empty($pros['id_bloque']))
        { 

            echo '<p><a href="includes/ajouter.php?idBordereau='.$lignefrais->get_id_notedefrais().'&annee='.$annee.'"><img src="images/ajout.png" width="60" height="60"></a></p>';
            echo '<form method="post" action="Bordereau.php?annee='.$annee.'">
            <input type="submit" name="validerr" value="valider le bordereau">
            </form>';
        }
      ?>
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
    include('includes/footer.php');
  ?>
  </div>

</body>
</html> 