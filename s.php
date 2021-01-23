<?php
require("auth.php");
?>
<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<title>Results of Search</title>
<style>

    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}

    .w3-bar-block .w3-bar-item {padding:20px}

    div{

       border-color: grey;



    }

 div.d{

   border-radius:3%;

    border-style: solid;

     border-color: grey;





margin: 10px 10px 10px 10px;

  float:left;width:100%;

width:400px;

height: 450px;

}



div.d:hover{box-shadow: 5px 10px #e6e6e6;

  width:450px;

height: 450px;



}

.a{

  border-color: red;

  background-color: red;



}



p{

    font-weight: bold;

  text-align:left;

  font-size: 18px;

   margin-left: 15px;

   font-family: 'Times New Roman', Times, serif;

}

a.l{	color:#007acc;

text-decoration: underline;

cursor: auto;}

img{

  width:200px;

  height:200px;

  border-style: solid;

}
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
require('h.html');
extract ($_POST);
if(isset($search)){
try{
require('c.php');
$stmt=$db->prepare
("select * from customer ORDER BY odate DESC");
$stmt->execute();
$r=$stmt->rowCount();
$rows=$stmt->fetchAll();
$db =null;
$flag=false;
$us=explode(' ',trim($s));
$arr[]=-1;
echo"<table>";
echo"<tr>";
echo "<th>Order Date</th>";
echo "<th>Name</th>";
echo "<th>Telephone</th>";
echo "<th>Purchase Descripition</th>";
echo "<th>Cost</th>";
echo "<th>Address</th>";
echo "<th>Ready for Delivery</th>";
echo "<th>Show Receipt</th>";
echo "<th>Remove</th>";
echo"</tr>";
foreach($rows as $row)
{   
 foreach($us as $ss)
 {
	if(! Empty($ss))
	{
	if(strchr(strtoupper($row[3]),strtoupper($ss))!=false)
	{
        if(!in_array($row[3],$arr))
    {
		$arr[]=$row[3];
        
      echo"<tr>";
echo"<td> $row[5]</td>";
echo"<td> $row[1]</td>";
echo"<td> $row[2]</td>";
echo"<td> $row[3]</td>";
if($row[7] ==0)
echo"<td style='color:red'> No Assigned Cost </td>";
else
echo"<td> $row[7] BD</td>";
echo"<td> $row[4]</td>";

if($row[6]=='no'){
  echo "<td style='color:red'>$row[6]";
}
else {
  echo "<td style='color:green'>$row[6]";
}echo"</td>";
echo"<td> <a href='details.php?id=$row[0]'>Show Receipt</a></td>";

echo "<td>";
echo "<a href='delet.php?id=$row[0]' class='fas fa-trash-alt'></a>";
echo "</td>";
echo"</tr>";
	   
     
	
	$flag=true;
    }
	}}
	} 

 echo "</div>";
 } 
 if($flag==false)
 {
   echo "<tr><td colspan='9'><h1>NO MATCH FOUND</h1></td></tr>";
 }
 }
catch(PDOException $ex) { 
    die ("Error Message ".$ex->getMessage());
}
}
?>
</body>
</html>