<?php
//error_reporting(E_ALL ^ E_NOTICE);
$host="localhost";
$username="root";
$password="root";
$db_name="exam";

$con = mysql_connect("$host","$username","$password");
if(!$con){
	die("cannot connect");
}

$db_sel = mysql_select_db("$db_name",$con);
if(!$db_sel){
	die("Cannot select db");
}
/*if(empty($_POST['username']))
{
    echo "UserName/Password is empty!";
    return false;
}
if(empty($_POST['password']))
{
    echo "Password is empty!";
    return false;
}*/
$msg="";
if(isset($_POST['fid']))
{
$fid=$_POST['fid'];
$password = $_POST['password'];




	$sql="SELECT * FROM hod WHERE fid='$_POST[fid]' and password='$_POST[password]'";





$result = mysql_query($sql,$con);
echo $result;
$count=mysql_num_rows($result);
echo $count;
if($count==1){
$res= mysql_fetch_assoc($result);

  // Register $myusername, $mypassword and redirect to file "login_success.php"
  session_start();
  $_SESSION['fid'] =$_POST['fid'];
  $_SESSION['password']=$_POST['password'];
  $msg="";
  header("location: ./hod/homehod.php");
  
}
    else {
        $msg="Wrong Username or Password";
      }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css1/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css1/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form action="faculty1.php" method="post" name="login"class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="fid" placeholder="Faculty id" id="fid" onblur="myfunction()">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button name="login" value="login" class="btn btn-primary btn-lg btn-block">Sign In</button>
			  <span><?php  
						echo $msg;
						?>
						</span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<script>
		var x = document.getElementById("fid");
		x.value = x.value.toUpperCase();
	</script>
</html>