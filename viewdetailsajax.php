<?php
require("auth.php");
?>
<?php
require("h.html");
extract($_GET);
try{
  require('c.php');
  $sql="select * from  customer where id=$uid";
  $rs=$db->query($sql);
  $db =null;
}
catch(PDOException $ex) {
    die ("Error Message ".$ex->getMessage());
}
?>
<form method='post' action='domyrequest2.php'>
<table border='1' width='1000' align='center' style='border-collapse:collapse;'>
<?php
  if ($row = $rs->fetch()){
    echo "<input type='hidden' name='uid' value='$row[0]' />\n";
    echo "<tr style='font-size:30px;background-color:rgb(247,230,255);'><th>Name</th><td><input name='n' style='border-style:none;' value='$row[1]' /></td></tr>";
        echo "<tr style='background-color:rgb(230,204,255);font-size:30px;'><th>Telephone</th><td><input style='border-style:none;' width='60px'name='tel' value='$row[2]' /></td></tr>";
        echo "<tr style='font-size:30px;background-color:rgb(247,230,255);'><th>Order</th><td><input style='border-style:none;'name='or' value='$row[3]' /></td></tr>";
        echo "<tr style='font-size:30px;background-color:rgb(230,204,255);'><th>Address</th><td><input style='border-style:none;'name='ad' value='$row[4]' /></td></tr>";
        echo "<tr style='font-size:30px;background-color:rgb(247,230,255);'><th>Total Cost</th><td><input style='border-style:none;' name='co' value='$row[7]' /></td></tr>";

    /*echo"<tr><td>name</td><td> $ro[1]</td></tr>";
    echo"<tr><td>tel</td><td> $ro[2]</td></tr>";
    echo"<tr><td>order</td><td> $ro[3]</td></tr>";
    echo"<tr><td>address</td><td> $ro[7] BD</td></tr>";
    echo"<tr><td>cost</td><td> $ro[4]</td></tr>";*/
    echo "<tr style='font-size:30px; background-color:rgb(230,204,255);'><th colspan='2'><input type='submit' name='sb' value='Update' /><input type='submit' name='sb' value='Delete' /></th></tr>";
  }
 ?>
</table>
</form>
