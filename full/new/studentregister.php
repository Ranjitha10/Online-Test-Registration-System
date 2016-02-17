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
$usn=$_POST['usn'];
$pwd = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$address = $_POST['address'];
$name = $_POST['name'];
$fname= $_POST['fathersname'];
$femail= $_POST['fathersemail'];
$year=$_POST['year'];
$semtype= $_POST['sem'];
if($year==12)
{	if($semtype==1)
		$sem=1;
	if($semtype==2)
		$sem=2;
}
elseif($year==34)
{	if($semtype==1)
		$sem=3;
	if($semtype==2)
		$sem=4;
}
elseif($year==56)
{	if($semtype==1)
		$sem=5;
	if($semtype==2)
		$sem=6;
}
else
{	if($semtype==1)
		$sem=7;
	if($semtype==2)
		$sem=8;
}




	$sql="INSERT INTO student VALUES('$usn','$pwd','$name','$branch','$sem','$email','$phone','$address','$fname','$femail')";


$result = mysql_query($sql);
$sql1="SELECT * FROM subjects WHERE usn='$usn'";
$result1=mysql_query($sql1);
$res1=mysql_fetch_array($result1);
for($i = 2; $i < 10; $i++)
{
	$subject=$res1[$i];
	if($subject!=NULL)
	{
	$result2=mysql_query("insert into attendence values('$usn','$subject',0)");
	$result3=mysql_query("insert into assignment values('$usn','$subject',0)");
	}
	
}
$result4=mysql_query("insert into finalmarks values('$usn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)");

if(!$result)

echo "fail";
else
{

$var=25;
require '/email/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bansalanshul121993@gmail.com';                   // SMTP username
$mail->Password = 'bansal887@kanina';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('bansalanshul121993@gmail.com', 'RVCE');     //Set who the message is to be sent from
$mail->addReplyTo('bansalanshul121993@gmail', 'RVCE');  //Set an alternative reply-to address
$mail->addAddress($email, $name);  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters        // Add attachments // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'SIGNUP SUCCESS';
$mail->Body    = 'CONGRATULATIONS '.$name.' ! YOU HAVE SUCCESSFULLY SIGNED UP';
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
header("location:http://localhost/full/index.html");
}

?>