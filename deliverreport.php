<?php
require("auth.php");
?>
<html>
<?php
require("h.html");
try{
require('c.php');

//$db->beginTransaction();

$stmt=$db->prepare
("select * from customer where deliver='no'");

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
?>
	<head>
		<script>
    var xmlHttp;

    function GetXmlHttpObject() {
      xmlHttp=null;
      try
        {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
        }
      catch (e)
        {
        // Internet Explorer
        try
          { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
        catch (e)
          { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
        }
      return xmlHttp;
      }

      function showUser(userID) {
          if (userID.length==0)
          {
            document.getElementById("userInfo").innerHTML="<b>Choose an order to display</b>";
            return;
          }
      		xmlHttp=GetXmlHttpObject();
      		var url="viewdetailsajax.php";
          url=url+"?uid="+userID;
          url=url+"&sid="+Math.random();

          xmlHttp.onreadystatechange=function (){
            if (xmlHttp.readyState==4) {
              document.getElementById("userInfo").innerHTML=xmlHttp.responseText;
            }
          };
       	  xmlHttp.open("GET",url,true);
      		xmlHttp.send(null);
      }
    </script>
  </head>
  <body>
  <?php
echo "<form method='post'>";
echo "<select style='margin-left:120px;width:80%; height:5%;'name='order' onchange='showUser(this.value)'>";
  echo "<option selected value=''></option>";
foreach ($rows as $ro)
    echo "<option value='$ro[0]' style='font-size:20px;'>$ro[3]</option>";
    echo "</select>";
  echo "</form>";
  echo"<div id='userInfo'>";
         echo"<h1 align='center'><b>Choose an Order to Display</b></h1>";
     echo"</div>";
    // echo"<h1>This is the end of the page</h1>";



 ?>
</body>
   </html>
