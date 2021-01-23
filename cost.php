<?php
require("auth.php");
?>
<?php

extract($_POST);

if(isset($c)){

try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("UPDATE customer  SET cost= ? where id=?");
  $cos=floatval($c);
  $stmt->bindParam(1, $cos);
  $stmt->bindParam(2, $id);




  $stmt->execute();
  $r=$stmt->rowCount();
  $db->commit();

  $db =null;

}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}

header("location:details.php?id=$id");


}

 ?>
