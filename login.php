<?php 
 session_start();
?>
<html>
<head>
  <link rel="stylesheet" type="txt/css" href="profile.css">
  <style>
  body{

    background-image: url("c.jpeg");

background-size: cover;

  }
.button {
  background-color: #00a3cc ;/* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.inp {
  width: 70%;
  padding: 20px 20px;
  margin: 8px 8px;
  box-sizing: border-box;
}
h1{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 35px;
   margin-top:50px;
   text-align: left;
    margin-left: 15px;
}
p{
  text-align:left;
  font-size: 18px;
   margin-left: 15px;
   font-family: 'Times New Roman', Times, serif;
}
div.d{
   width:450px; height:500px;
   border-radius:3%;
    border-style: solid;
     border-color: grey;
      margin-left: auto;
      margin-right: auto;
       margin-top:auto;
        margin-top:100px;
         text-align:center
}
</style>
</head>
<body >
  <div class="d">

<?php
//require('time.php');
$msg="";
$n="tick_tock_store";
$p='$2y$10$xX2pOP50Wid5RdH8yTwNAuc2ejxp1N29YJMLU0RAWTIPZvPt9lErC';
  if (isset($_GET['error']))
  {  if ($_GET['error']==1)
        $msg="<span style='color:red;'>You should login first</span>";
    else
        $msg="Unknown error";
  }
  echo $msg;
extract ($_POST);
if(isset($lg))
{ //$hps=password_hash($pass,PASSWORD_DEFAULT);
  $id=round(rand());
	if($name==$n && password_verify($pass,$p))
    {
     $_SESSION['activeUser']=$id;
	header('location:h.php');}
else	
echo "<p style='color:red;text-align:center'>Your password or username is incorrect</p>"; }

?>


<form method='post'>
  <h1 >login </h1>
<p>User Name</br> <input class="inp" name='name' placeholder=" enter your user name"/></p><br/>
<p>User Password:</br> <input class="inp" type='password' name='pass' placeholder=" enter your password"/></p><br/>
<input class="button" type='submit' value='login' name='lg'/><br/>
</form>
</body>
</html>
