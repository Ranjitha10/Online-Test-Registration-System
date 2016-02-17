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
$email = $_POST['email'];




	$sql="SELECT * FROM student WHERE usn='$_POST[usn]' and email='$email'";





$result = mysql_query($sql,$con);
echo $result;
$count=mysql_num_rows($result);
echo $count;
if($count==1)
{
$res= mysql_fetch_assoc($result);
$password=$res['password'];
$var=25;
require '/email/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'rvceise2015@gmail.com';                   // SMTP username
$mail->Password = 'rvce8thmile';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('rvceise2015@gmail.com', 'RVCE');     //Set who the message is to be sent from
$mail->addReplyTo('rvceise2015@gmail', 'RVCE');  //Set an alternative reply-to address
$mail->addAddress($email, $name);  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters        // Add attachments // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'RETRIEVAL OF PASSWORD';
$mail->Body    = $name.'YOUR USN IS:'.$usn."<br>".'YOUR PASSWORD IS:'.$password;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(folder));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
  // header("location:http://localhost/full/index.html");
   exit;
}
 
echo 'Message has been sent';
header("location:student.php");
}

    else 
	{
        $msg="USN DOES NOT EXIST";
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
          <h1 class="text-center">Forgot Password</h1>
      </div>
      <div class="modal-body">
          <form action="#" method="post" name="login"class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="usn" placeholder="USN" id="usn" onblur="myfunction()" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="email" placeholder="Email" required>
            </div>
			 <div class="form-group">
              <input type="text" class="form-control input-lg" name="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
              <button name="login" value="login" class="btn btn-primary btn-lg btn-block">Get Password</button>
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