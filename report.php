<?php
require("auth.php");
?>
<html>
<head>
  <style>
  h1,p{
    text-align: center;

  }
  input[type=submit]{

    background-color:  #00a3cc;/* Green */
    border: none;
    color:  white;
  font-weight: bold;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
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
margin: 8px 8px;
box-sizing: border-box;


}

  </style>
</head>
<body>
  <a href='home.php'>home</a>
<?php
require("h.html");
extract($_POST);
if (isset($sub)){
  try{
  require('c.php');

  $db->beginTransaction();

  $stmt=$db->prepare
  ("SELECT * from customer  where MONTH(odate)=? AND YEAR(odate)=?");
  $stmt->bindParam(1, $m);

  $stmt->bindParam(2, $y);




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
$sum=0;
$count=0;
//echo "<center>";
echo "<h1 style='font-size:40px;color:rgb(89,0,179);'>MONTH REPORT ($m-$y ) </h1>";
foreach ($rows as $ro) {


  $sum+=$ro[7];
  $count++;
   // echo"<p>.$ro[7]BD</p>";
}
echo "<div align='center' style='margin-left:200px;text-align:center;border:2px solid rgb(89,0,179);width:70%; background-color:rgba(230,204,255);'>";
echo "<p style='font-size:30px;font-weight:bold; text-align:center; color:rgb(64,0,128);'>TOTAL NUMBER OF SELLED ITEMS: ". $count."</p>";

echo "<p style='font-size:30px;font-weight:bold;text-align:center; color:rgba(64,0,128);'>TOTAL PROFIT IN THIS MONTH:".$sum."</p>";
//echo "</center>";
echo "<br/>";
echo "</div>";
}
else{

 ?>
 <form method="post">
   <p style='font-size: 40px;'>MONTH:<input  name='m'/></p>
   <p style='font-size: 40px;'>YEAR:<input  name='y'/></p>
   <p><input type='submit' name='sub'value='submit'/></p>
 </form>


</body>
    </html><?php }?>
