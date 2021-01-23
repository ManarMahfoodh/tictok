<?php
require("auth.php");
?>
<?php
require("h.html");
extract($_REQUEST);
  if (!isset($sb))
    die ("Invalid Request");
  try{
    require('c.php');

    if ($sb=="Update")
    {
      $c=floatval($co);
      $sql="UPDATE customer  SET name='$n', tel='$tel', des='$or', address='$ad',cost=$c where id=$uid";
      $message='<h1>User Details has been Updated</h1>';



    }
    else {
      $sql="DELETE from customer where id=$uid";
      $message='<h1>User Record has been Removed</h1>';
    }
  $r=$db->exec($sql);
  if ($r > 0)
    echo $message;
  else
    echo "<h1>Failed, Try again later</h1>";
  $db =null;
}
catch(PDOException $ex) {
    die ("Error Message ".$ex->getMessage());
}
?>
