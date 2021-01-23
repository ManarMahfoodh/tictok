<?php
require("auth.php");
?>
<?php

extract($_POST);
if(isset($order)){


  require('fpdf/fpdf.php');
  $title="Tic_Tok_Store";
 $pdf= new FPDF();
 $pdf->AddPage();
 //$pdf->Image('t.jpg',50,10,80,40);
 //$pdf->Ln(50);
 $pdf->setTitle($title);
 $pdf->setFont('Arial','B',15);
 $w=$pdf->GetStringWidth($title)+6;
 $pdf->SetX((210-$w)/2);
 $pdf->SetDrawColor(221,221,221,1);
 $pdf->SetFillColor(255,255,255,1);
 //$pdf->SetFillColor(10,158,0,1);
 //$pdf->SetTextColor(255,255,255,1);
 //$pdf->SetLineWidth(0);
 $pdf->Cell(60,10,$title,0,1,'c',true);
 //$pdf->Cell($w,10,$title,1,1,'c',true);
 $pdf->Ln(20);
 $pdf->Line(10,70,200,70);
 $pdf->SetTextColor(0,0,0,1);
 $w=$pdf->GetStringWidth($title)+30;
 $pdf->Line(10,170,200,170);




   $del=0.0;
   $t=0;
   $c=0;
  $total=0;

  foreach ($order as $value) {

  try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("UPDATE customer  SET deliver= 'yes' where id=?");

  $stmt->bindParam(1, $value);


  $stmt->execute();
  $r=$stmt->rowCount();
  $db->commit();
  //$rows=$stmt->fetchAll();
  $db =null;


  }
  catch(PDOException $ex) {
  	$db->rollBack();
      die ("Error Message ".$ex->getMessage());
  }

}

foreach ($order as $value) {

  try{
  require('c.php');

  $stmt=$db->prepare
  ("SELECT * from customer where id=?");
    $stmt->bindParam(1, $value);
  $stmt->execute();
  $r=$stmt->rowCount();
  $rows=$stmt->fetchAll();
  $db =null;

  }
  catch(PDOException $ex) {
  	$db->rollBack();
      die ("Error Message ".$ex->getMessage());
  }

foreach($rows as $ro){
  /*echo"<tr>";
echo"<td> $ro[1]</td>";
echo"<td> $ro[2]</td>";
echo"<td> $ro[3]</td>";
echo"<td> $ro[7] BD</td>";
echo"<td> $ro[4]</td>";
echo"</tr>";*/
$total+=$ro[7];
$c++;
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'order No.',0,0,'c');
$pdf->Cell(60,10,$c,0,1,'c');
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Customer Name: ',0,0,'c');
$pdf->Cell(60,10,$ro[1],0,1,'c');

$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Tel: ',0,0,'c');
$pdf->Cell(60,10,$ro[2],0,1,'c');

$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Address: ',0,0,'c');
$pdf->Cell(60,10,$ro[4],0,1,'c');
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'------------------------------------------------------------------------------------------------------------',0,0,'c');
$pdf->Cell(60,10,'--',0,1,'c');
/*$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Order: ',0,0,'c');
$pdf->Cell(60,10,$ro[3],0,1,'c');



$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Cost: ',0,0,'c');
$pdf->Cell(60,10,$ro[7],0,1,'c');
//$pdf->Output();*/

}

}
$del=$c*2;
$t=$total-$del;
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Total Cost: ',0,0,'c');
$pdf->Cell(60,10,$total,0,1,'c');
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Delivery Charge: ',0,0,'c');
$pdf->Cell(60,10,$del,0,1,'c');
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'TOTAL: ',0,0,'c');
$pdf->Cell(60,10,$t,0,1,'c');
$pdf->Output();


}



 ?>
</table>
</body>
</html>
