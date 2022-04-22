<?php 
Function creePDF($tab){
    require('fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    
    $pdf->Cell(40,10, $tab["nomAd"], 0,1);
    $pdf->Cell(40,10, $tab["prenomAd"], 0,1);
    $pdf->Cell(40,10, $tab["date"], 0,1);
    $pdf->Cell(40,10, $tab["instru"], 0,1);
    $pdf->Cell(40,10, $tab["place"], 0,1);


    ob_clean();
    $pdf->Output();
   
}

    
?>