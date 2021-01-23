<?php
require("auth.php");
?> 
 <html>
 <head>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

extract($_POST);
require("h.html");
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
if(isset($sub)){
$cos=0.0;
for($i=0;$i<5;$i++)
{  if(isset($tx2))
	$cos+=floatval($tx2[$i]);

	
	
}

/*try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("UPDATE customer  SET des=?,costde=? , total=? where id=?");
  //$cos=floatval($c);
  $stmt->bindParam(1, $tx1);
  $stmt->bindParam(2, $tx2);
   $stmt->bindParam(3, $total);
  $stmt->bindParam(4, $id);



  $stmt->execute();
  $r=$stmt->rowCount();
  $db->commit();

  $db =null;

}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}*/

//header("location:details.php?id=$id&coss=$cos&pr=$tx2&det=$tx1");
echo "<div id='hello'>";
//echo "<image src='t.jpg' style='margin-top:15px;'width='150px'height='100px'>";
echo "<h1 style='text-align:left;'>tick_tock_store</h1>";
echo "<h4>Mobile 35109279</h4>";
echo "<h4>Snap Chat fatti86</h4>";
echo "<h2 style='text-align:left;'>BILL TO</h2>";
foreach ($rows as $ro) {
echo "<h4 style='text-align:left;'>Customer Name : $ro[1]</h4>";
echo "<h4 style='text-align:left;'>Customer Tel : $ro[2]</h4>";
//echo "<h1 >Customer Order : $ro[3]</h1>";
echo "<h4 style='text-align:left;'>Customer Address : $ro[4]</h4>";
echo "<table border='2px' width='800px' style='border-right:none;border-left:none; border-bottom:none; border-collapse:collapse;'>";
echo "<tr>";
echo "<th style='font-size:20px;'>DESCRIPTION</th>";
echo "<th style='font-size:20px;'>AMOUNT</th>";
echo "</tr>";
echo "<tr>";
for($i=0;$i<count($tx1);$i++){
echo "<tr>";
echo "<td>$tx1[$i]</td>";//value='$ro[7]'
echo "<td align='center'>$tx2[$i]</td>";
echo "</tr>";}
echo "<td style=' border-style:none;'></td>";
echo "<td style=' border-left:none;'><h4 style='text-align:left;'>SUBTOTAL : BHD $cos</h4> </td>";
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
$tt=$delcost+$cos;
echo "<tr>";
echo "<td style=' border-style:none;'></td>";
echo "<td style=' border-left:none;'> <h4 style='text-align:left;'>Total : BHD $tt <input type='hidden'style='border-style:none;' name='total' value='$tt'/> </h4>
</td>";
echo "</tr>";
echo "</table>";
}
echo "</div>"; 
echo"<p style='text-align:left'><input type='button' onClick='codespeedy()' name='print' value='print'><i class='material-icons'></i></p>";

}

 ?>
 </body>
 </html>