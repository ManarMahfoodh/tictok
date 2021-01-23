<?php
require("auth.php");
?>
<html>
<body>
<?php
require("h.html");
try{
require('c.php');

$stmt=$db->prepare
("select * from customer where deliver='no'");

$stmt->execute();
$r=$stmt->rowCount();
$rows=$stmt->fetchAll();
$db =null;

}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}


echo "<form method='post' action='deliverprint.php'>";

foreach ($rows as $ro)
    echo "<p style='text-align:center;font-size:30px;background-color:rgb(247,230,255);'><input type='checkbox' name='order[]' value='$ro[0]'> $ro[3]</p>";

  echo "<input style='text-align:center;font-size:30px;background-color:rgb(247,230,255); margin-left:350px; width:50%;'type='submit' name='submit'value='submit'>";
  echo "</form>";



 ?>
</body>
</html>
