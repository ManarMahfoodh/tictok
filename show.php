<?php
require("auth.php");
?>
<html>
<head>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style>
  table {
  width: 100%;
  border-collapse: collapse;
}
table, th, td {
  border: 1px solid black;
}
th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #008fb3;
  color: white;
}
td {
  font-size: 20px;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
  </style>
</head>
<body>

<?php
require("h.html");
extract ($_POST);
try{
require('c.php');

//$db->beginTransaction();

$stmt=$db->prepare
("select * from customer ORDER BY odate DESC");

/*$stmt->bindParam(':na', $na);
$stmt->bindParam(':t', $t);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':add', $add);

*/
$stmt->execute();
$r=$stmt->rowCount();
//$db->commit();
$rows=$stmt->fetchAll();
$db =null;

  
 } 
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}
echo "<div align='center'>";
echo "<form method='post' action='s.php'>";
echo "<input name='s'/>";
echo "<input type='submit' value='search'name='search'/>";
echo "</form>";
echo "</div>";
echo"<table>";
echo"<tr>";
echo "<th>Order Date</th>";
echo "<th>Name</th>";
echo "<th>Telephone</th>";
echo "<th>Purchase Image</th>";
echo "<th>Purchase Descripition</th>";
//echo "<th>Cost</th>";
echo "<th>Address</th>";
echo "<th>Ready for Delivery</th>";
echo "<th>Show Receipt</th>";
echo "<th>Remove</th>";


echo"</tr>";
foreach ($rows as $ro) {
  echo"<tr>";
echo"<td> $ro[5]</td>";
echo"<td> $ro[1]</td>";
echo"<td> $ro[2]</td>";
echo"<td> <image width='40' height='40' src='image/$ro[10]'></td>";
echo"<td> $ro[3]</td>";
/*if($ro[7] ==0)
echo"<td style='color:red'> No Assigned Cost </td>";
else
echo"<td> $ro[7] BD</td>";*/
echo"<td> $ro[4]</td>";

if($ro[6]=='no'){
  echo "<td style='color:red'>$ro[6]";
}
else {
  echo "<td style='color:green'>$ro[6]";
}echo"</td>";
echo"<td> <a href='details.php?id=$ro[0]'>Show Receipt</a></td>";

echo "<td>";
echo "<a href='delet.php?id=$ro[0]' class='fas fa-trash-alt'></a>";
/*echo"<form method='post' action='delet.php'>";
echo"<input type='submit' name='d' value='remove'>";
echo"<input type='hidden' name='id' value='$ro[0]'>";
echo"</form>";*/
echo "</td>";
echo"</tr>";
}

 ?>
</body>
</html>
