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
session_start();
$usn=$_SESSION['usn'];
	$sql="SELECT * FROM student WHERE usn='$usn'";
	$result = mysql_query($sql,$con);
	$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_array($result);
}
$email=$res['email'];
$name=$res['name'];
$sem=$res['sem'];
$sql2="select * from register where usn='$usn' and internal=3";
$result2=mysql_query($sql2);
require '/email/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'bansalanshul121993@gmail.com';                   // SMTP username
$mail->Password = 'bansal887@kanina';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('rvceise2014@gmail.com', 'RVCE');     //Set who the message is to be sent from
$mail->addReplyTo('rvceise2014@gmail', 'RVCE');  //Set an alternative reply-to address
$mail->addAddress($email, $name);  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters        // Add attachments // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'SIGNUP SUCCESS';
while($res2=mysql_fetch_array($result2,MYSQL_ASSOC))
{
	$mail->Body = $mail->Body . $res2['subject'] . "-> Room No: " .$res2['roomno'] ."-> Seat No:".$res2['seatno']."<br>";
}
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(folder));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   header("location:mailnotsent3.php");
   exit;
}
 
echo 'Message has been sent';
header("location:registered.php");
?>