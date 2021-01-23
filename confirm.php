<html>
<head>
  <style>

  img {
    margin-top: 30px;
   }
    body{

      background-image: url('w4.jfif');
	 background-position:right;
	 background-size:400px 900px ;
	  background-repeat:no-repeat;
    
    
    }
</style>
<body>
<center><img src="t.jpg"width="400px"height="200px"/></center>
<?php
date_default_timezone_set('Asia/Bahrain');

extract($_POST);
if(isset($sub)){
try{
require('c.php');
if ((($_FILES["picfile"]["type"] == "image/gif")
    || ($_FILES["picfile"]["type"] == "image/jpeg")
    || ($_FILES["picfile"]["type"] == "image/pjpeg"))
    && ($_FILES["picfile"]["size"] < 10000000)) {
          if ($_FILES["picfile"]["error"] > 0) {
                echo "Return Code: " . $_FILES["picfile"]["error"] . "<br />";
          }
          else {
            /*
              How to ensure uniquness of filename?
            */
            $fdetails=explode(".",$_FILES["picfile"]["name"]);
            $fext=end($fdetails);

            $fn="pic".time().uniqid(rand()).".$fext";

            if (move_uploaded_file($_FILES["picfile"]["tmp_name"], "image/$fn"))
            {
                     // echo "Stored Sucessfully :) " ;
            }
            else {
                      die("Failed to store file");
            }
	}
$db->beginTransaction();

$stmt=$db->prepare
("insert into customer  values (Null, :na , :t, :desc, :add,:d,'no',0,'0.00','0.00',:i)");
  $d=date("Y-m-d H:i:s");
$stmt->bindParam(':na', $na);
$stmt->bindParam(':t', $t);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':add', $add);
$stmt->bindParam(':d', $d);
$stmt->bindParam(':i', $fn);
$stmt->execute();
$r=$stmt->rowCount();
$db->commit();

$db =null;

}}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}

if($r==1)
echo"<center><h1 style='font-size:40px;'>Your order is confirmed</h1></center>";}
//require("f.html");
?>
</body></html>
