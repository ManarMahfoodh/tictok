<?php
require("auth.php");
?>
<?php
extract($_POST);
if(isset($d)){

try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("UPDATE customer  SET deliver= 'yes' where id=?");

  $stmt->bindParam(1, $id);




  $stmt->execute();
  $r=$stmt->rowCount();
  $db->commit();

  $db =null;

}
catch(PDOException $ex) {
	$db->rollBack();
    die ("Error Message ".$ex->getMessage());
}
if($r==1)
header("location:show.php");


}
 ?>
