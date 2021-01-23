<?php
require("auth.php");
?>

<?php

extract($_REQUEST);

$delcost=0;
try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("SELECT * FROM  customer where id=?");

  $stmt->bindParam(1, $id);




  $stmt->execute();
  $r=$stmt->rowCount();
  $rows=$stmt->fetchAll();

  $db->commit();

  $db =null;

}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}
/*if(isset($print)){
 require('fpdf/fpdf.php');
 $title="TicTok Store";
$pdf= new FPDF();
$pdf->AddPage();
$pdf->Image('t.jpg',50,30,40,40);
$pdf->Ln(50);
$pdf->setTitle($title);
$pdf->setFont('Arial','B',15);
$w=$pdf->GetStringWidth($title)+6;
$pdf->SetX((210-$w)/2);
$pdf->SetDrawColor(221,221,221,1);
$pdf->SetFillColor(255,255,255,1);
//$pdf->SetFillColor(10,158,0,1);
//$pdf->SetTextColor(255,255,255,1);
//$pdf->SetLineWidth(0);
$pdf->Cell(80,20,$title,0,1,'c',true);
//$pdf->Cell($w,10,$title,1,1,'c',true);
$pdf->Ln(20);
$pdf->Line(10,70,200,70);
$pdf->SetTextColor(0,0,0,1);
$w=$pdf->GetStringWidth($des)+30;
$pdf->Line(10,170,200,170);
$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Customer Name: ',0,0,'c');
$pdf->Cell(60,10,$name,0,1,'c');

$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Tel: ',0,0,'c');
$pdf->Cell(60,10,$tel,0,1,'c');

$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Address: ',0,0,'c');
$pdf->Cell(60,10,$add,0,1,'c');

$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Order: ',0,0,'c');
$pdf->Cell(60,10,$des,0,1,'c');



$pdf->SetX((100-$w)/2);
$pdf->Cell(60,10,'Total Cost: ',0,0,'c');
$pdf->Cell(60,10,$co,0,1,'c');
$pdf->Output();
}*/?>
<html>

<head>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
  <!--h1,p{
    text-align: center;
  }
  input[type=submit]{
    height: 60px;
    background-color:  #00a3cc;/* Green */
    border: none;
    color:  white;
  font-weight: bold;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;


    cursor: pointer;
    width:auto;
  }

input[type=submit]:hover {
  background-color:  #99ebff ;
}
input {
      height: 60px;

padding: 10px 10px;



}-->
  </style>
  <script type="text/javascript">
        
    function codespeedy(){
      var print_div = document.getElementById("hello");
var print_area = window.open();
print_area.document.write(print_div.innerHTML);
print_area.document.close();
print_area.focus();
print_area.print();
print_area.close();
// This is the code print a particular div element
    }
  </script>
</head>
<body>

  <?php
  require("h.html");
  echo "<a style='margin-left:1300px;font-size:50px; margin-top:15px;' href='show.php' class='fa fa-backward'></a>";
  /*foreach ($rows as $ro) {
	if($ro[7]==0){
echo"<form method='post' action='cost.php'>";
echo"<p style='font-size:20px'>Please Enter the Total Cost for the Order<input  name='c' >";//value='$ro[7]'
echo"<input type='hidden' name='id' value='$ro[0]'>";
echo"<input type='submit' name='d' value='submit'></p>";
echo"</form>";}  
  }*/
echo "<div id='hello'>";
//echo "<image src='t.jpg' style='margin-top:15px;'width='150px'height='100px'>";
echo "<h1 style='text-align:left;'>tick_tock_store</h1>";
echo "<h4>Mobile 35109279</h4>";
echo "<h4>Snap Chat fatti86</h4>";
echo "<h2 style='text-align:left;'>BILL TO</h2>";
foreach ($rows as $ro) {
echo"<image width='200' height='200' style='margin-left:'src='image/$ro[10]'>";
echo "<h4 style='text-align:left;'>Customer Name : $ro[1]</h4>";
echo "<h4 style='text-align:left;'>Customer Tel : $ro[2]</h4>";
//echo "<h1 >Customer Order : $ro[3]</h1>";
echo "<h4 style='text-align:left;'>Customer Address : $ro[4]</h4>";
/*if($ro[7]!=0)
echo "<h1>cost :$ro[7] BD</h1>";
else{
echo"<form method='post' action='cost.php'>";
echo"<p>Please Enter the cost<input  name='c' >";//value='$ro[7]'
echo"<input type='hidden' name='id' value='$ro[0]'>";
echo"<input type='submit' name='d' value='submit'></p>";
echo"</form>";}*/

//}
//echo "<a href='#' onclick='window.print(); return false;'>Print Me</a>";
echo "<table border='2px' width='800px' style='border-right:none;border-left:none; border-bottom:none; border-collapse:collapse;'>";
echo "<tr>";
echo "<th style='font-size:20px;'>DESCRIPTION</th>";
echo "<th style='font-size:20px;'>AMOUNT</th>";
echo "</tr>";
echo "<tr>";
echo"<form method='post' action='e.php'>";
echo"<input type='hidden' name='id' value='$ro[0]'>";
echo "<td ><input style='border-style:none;'cols='50' rows='10'name='tx1[]' value='$ro[3]'/></td>";//value='$ro[7]'
echo "<td align='center'><input style='border-style:none;' cols='50' rows='10'name='tx2[]' value='$ro[8]'/></td>";
/*echo"<form method='post'>";
echo"<input  name='name' value='$ro[1]'>";
echo"<input name='tel' value='$ro[2]'>";
echo"<input name='des' value='$ro[3]'>";
echo"<input name='add' value='$ro[4]'>";
echo"<input  name='co' value='$ro[7]'>";*/
echo "</tr>";
echo "<tr>";
echo "<td><input style='border-style:none;'cols='50' rows='10'name='tx1[]' /></td>";//value='$ro[7]'
echo "<td align='center'><input style='border-style:none;' cols='50' rows='10'name='tx2[]' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input style='border-style:none;'cols='50' rows='10'name='tx1[]' /></td>";//value='$ro[7]'
echo "<td align='center'><input style='border-style:none;' cols='50' rows='10'name='tx2[]' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input style='border-style:none;'cols='50' rows='10'name='tx1[]' /></td>";//value='$ro[7]'
echo "<td align='center'><input style='border-style:none;' cols='50' rows='10'name='tx2[]' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input style='border-style:none;'cols='50' rows='10'name='tx1[]' /></td>";//value='$ro[7]'
echo "<td align='center'><input style='border-style:none;' cols='50' rows='10'name='tx2[]' /></td>";
echo "</tr>";
echo "<tr>";
echo "<td style=' border-style:none;'></td>";
$t=0.0;
if(isset($coss))
	$t=$coss;
echo "<td style=' border-left:none;'><h4 style='text-align:left;'>SUBTOTAL : BHD $t</h4> </td>";
echo "</tr>";
echo "<tr>";
echo "<td style='border-style:none;'></td>";
if($ro[6]=='yes')
{ echo "<td style=' border-left:none;'><h4 style='text-align:left;'>Delivery Charge : BHD 2.00</h4>
</td>"; 
$delcost=2.00;}
else
{echo "<td style=' border-left:none;'><h4 style='text-align:left;'>Delivery Charge : BHD 0.00</h4>
</td>";	
$delcost=0.00;}
echo "</tr>";
$tt=$delcost+$ro[7];
echo "<tr>";
echo "<td style=' border-style:none;'></td>";
echo "<td style=' border-left:none;'> <h4 style='text-align:left;'>Total : BHD $tt <input type='hidden'style='border-style:none;' name='total' value='$tt'/> </h4>
</td>";
echo "</tr>";
echo "</table>";
}
echo "</div>"; 
echo"<p style='text-align:left;'><input type='submit'name='sub' value='submit'><i class='material-icons'>submit</i></p>";
//echo"<p style='text-align:left'><input type='button' onClick='codespeedy()' name='print' value='print'><i class='material-icons'>print</i></p>";
echo"</form>";

 ?>
