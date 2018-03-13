 <?php

require('includes/fpdf/fpdf.php');
require('includes/NoteDeFrais.php');
require('includes/Demandeur.php');
require('includes/adherent.php');

 function frais_pdf($Id_demandeur, $Id_NoteDeFrais) {
    
    
    function c($string) {
      return iconv('UTF-8', 'windows-1252', $string);
    }
    $demandeurDAO = new DemandeurDAO();
    $demandeur = $demandeurDAO->find($Id_demandeur);

    foreach ($demandeur->get_les_notes() as $note) { 
          if ($note->get_Id_NoteDeFrais() == $Id_NoteDeFrais) {
            $noteDeFrais = $note;
          }
        }
    $Annee = $noteDeFrais->get_les_lignes()[0]->get_Annee();
    $indemniteDAO = new IndemniteDAO();
    $indemnite = $indemniteDAO->find($Annee);

    $pdf = new MyFPDF();
    $pdf->AddPage();
    $pdf->setTitle('Note de frais');
    $border = 0;
    $pdf->SetMargins(10, 10, 10, 10);

   
    $pdf->SetFont ('Arial', 'B', 15);
    $pdf->Cell(70, 10, c("Note de frais des bénévoles"), $border, 1, 'C');
    $pdf->Cell(300, -10, c("Année civile : ". $noteDeFrais->get_les_lignes()[0]->get_Annee()), $border, 1, 'C');
    $pdf->SetFont ('Arial', 'B', 11);
  
    if ($demandeur->get_isRepresentant() == true) {
      $representant = $demandeur->get_Representant();

      $pdf->Cell(28, 35, c("Je sousigné(e)"), $border, 1, 'L');
      $pdf->SetFont ('Arial', '', 11);

      $pdf->ln(-13);
      $pdf->Cell(190, 7, c($representant->get_Nom().' '.$representant->get_Prenom()), 1, 1, 'C');
      $pdf->ln(-13);

      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(21, 35, c("Demeurant"), $border, 1, 'L');
      $pdf->SetFont ('Arial', '', 11);

      $pdf->ln(-13);
      $pdf->Cell(190, 7, c($representant->get_rue().' '.$representant->get_cp().' '.$representant->get_ville()), 1, 1, 'C');
      $pdf->ln(-13);

      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(10, 35, c("Certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association"), $border, 1, 'L');
      $pdf->SetFont ('Arial', '', 11);
      $trouver = false;
      $Nom = array();
      $Nom[0] = "";
     
      $pdf->ln(-13);

      foreach ($representant->get_les_adherents() as $adherent){
        foreach ($Nom as $nom ) {
          if($adherent->get_Club()->get_Nom() == $nom){
            $trouver = true;
          }
        }       
        if($trouver == false){

          $pdf->ln(0);
          $pdf->Cell(190, 7, c($adherent->get_Club()->get_Nom().' '.$adherent->get_Club()->get_AdresseClub().' '.$adherent->get_Club()->get_Cp().' '.$adherent->get_Club()->get_Ville()), 1, 1, 'C');
          $pdf->ln(0);

        }
        $Nom[] = $adherent->get_Club()->get_Nom();
        $trouver = false;
      }

      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(21, 8, c("en tant que don."), $border, 1, 'L');
      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(30, 14, c("Frais de deplacement"), $border, 0, 'L');
      $pdf->SetFont ('Arial', '', 11);
      $pdf->SetFont('Arial', '', 9);
      $header = array('Date', 'Motif', 'Trajet', 'Kilomètre','Cout trajet',c('Péages'),'Repas',c('Hébergement'),'Total');
      $lignes = $noteDeFrais->get_les_lignes();
      $totalT=$pdf->ImprovedTable($header, $lignes,$indemnite);
      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(30, 14, c("Je suis le représentant légal des adhérents suivants :"), $border, 0, 'L');
      $pdf->Ln();
      $pdf->SetFont ('Arial', '', 11);
      foreach ($representant->get_les_adherents() as $adherent){
        $pdf->ln(0);
      $pdf->Cell(190, 7, c($adherent->get_Nom().' '.$adherent->get_Prenom().' licence n° '.$adherent->get_numLicence()), 1, 1, 'C');
      $pdf->ln(0);
      }
      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(30, 14, c("Montant total des dons : ".$totalT), $border,0, 'L');
      $pdf->SetFont ('Arial', 'I', 9);
      $pdf->Ln(7);
      $pdf->Cell(30, 14, c("Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de tous les justificatifs correspondants."), $border, 0, 'L');
      $pdf->Ln(7);
      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(30, 17, c("A"), $border,0, 'L');
      $pdf->Cell(45, 17, c("Le"), $border,1, 'C');
      $pdf->Cell(30, 14, c("Signature du bénévole :"), $border,1, 'L');
      $pdf->ln(7);
      $width = 100;
      $height = 15;
      $pdf->setX(11);
      $y = $pdf->getY(50);
      $pdf->SetFont ('Arial', 'B', 11);
      $pdf->Cell(74,8, c("Partie réservé à l'association"), $border,1, 'R');
      $pdf->SetFont ('Arial', '', 11);
      $pdf->MultiCell($width,7, c("N° ordre de reçu : ".$noteDeFrais->get_les_lignes()[0]->get_Annee().' - '.$noteDeFrais->get_Id_NoteDeFrais()."\nRemis le :\nSignature du trésorier :\n\n\n"),1);
      $pdf->setY($y + $height);
    }
    
  $pdf->Output();
}
?>