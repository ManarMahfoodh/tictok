<?php
extract($_POST);
if(isset($s)){
try{  require(c.php);
	$db->beginTransaction();
	$s=$db->prepare("insert into items values (NULL,?,?,?,?,?,?,?,?,?,?,?)");
						  $s->bindParam(1,$n);
						   $s->bindParam(2,$t);
						    $s->bindParam(3,$h);
							 $s->bindParam(4,$r);
							  $s->bindParam(5,$b);
							   $s->bindParam(6,$p);
	$db->commit();					
}
catch(PDOException $ex)
{    $db->rollBack();
	die($ex->getMessage());
}}
?>
<html>
<body>
<form method="post">
<ul>
<li>Name: <input name="n"/></li>
<li>Tel: <input name="t"/></li>
<li>Address:
<ol>
<li>Area:<input name="a"/></li>
<li>House:<input type='number'name="h"/></li>
<li>Road:<input type='number'name="r"/></li>
<li>block:<input type='number'name="b"/></li>
</ol></li>
<li>Product: <input name="p"/></li>
</ul>
<input type="submit" name="s" value="Order"/>
</form>
</body>
</html>