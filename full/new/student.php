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
if(isset($_POST['usn']))
{
$usn=$_POST['usn'];
$password = $_POST['password'];




	$sql="SELECT * FROM student WHERE usn='$_POST[usn]'";
	





$result = mysql_query($sql,$con);
echo $result;
$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_assoc($result);
$new=$res['password'];
if($new==$password)
{
  // Register $myusername, $mypassword and redirect to file "login_success.php"
  session_start();
  $_SESSION['usn'] =$_POST['usn'];
  $_SESSION['password']=$_POST['password'];
  $msg="";
  header("location: ./student/home.php");
  
}
else{
        $msg="Wrong Username or Password";
    }
}
else
{
	$msg="Wrong Username or Password";

}
}
?>
<!DOCTYPE html>
<style>
.hello{
opacity:0.4;
z-index:-1;
	}
</style>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>RV COLLEGE</title>
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
<img id="hello" src="back.png" style="width:100%;height:100%">
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
			
          <a href="http://localhost/full/index.html" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close()">×</button></a>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form action="#" method="post" name="login"class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="usn" placeholder="USN" id="usn" onblur="myfunction()">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button name="login" value="login" class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="signup.php">Register</a></span><span><a href="forgotpass.php">Forgot Password</a></span><br>
			  <span><?php  
						echo $msg;
						?>
						</span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          
      </div>
  </div>
  </div>
</div>
<script>
	
</script>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
		function myfunction()
		{
			var x = document.getElementById("usn");
			x.value = x.value.toUpperCase();
		}
		</script>
	</body>
</html>