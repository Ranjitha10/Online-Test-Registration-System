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
$sql1="SELECT * FROM subjects WHERE usn='$usn'";
	$result1 = mysql_query($sql1,$con);
	$count1=mysql_num_rows($result1);
if($count1==1){
$res1= mysql_fetch_array($result1);
}
$flow1="SELECT * FROM count2 WHERE sem='$sem'";
$resflow1=mysql_query($flow1);
$coun1=mysql_num_rows($resflow1);
if($coun1==1){
$rf1= mysql_fetch_array($resflow1);
}
$j=0;
for($i=2;$i<10;$i++)
{
	if($res1[$i]!=NULL)
	{
		$subarray[$j]=$res1[$i];
		$j++;
	}
}

$roomsql1="select * from room where roomno='1'";
$roomresult1=mysql_query($roomsql1);
$roomres1=mysql_fetch_array($roomresult1);
$roomie1=$roomres1['roomrow']*7;

$roomsql2="select * from room where roomno='2'";
$roomresult2=mysql_query($roomsql2);
$roomres2=mysql_fetch_array($roomresult2);
$roomie2=$roomres2['roomrow']*7;

$roomsql3="select * from room where roomno='3'";
$roomresult3=mysql_query($roomsql3);
$roomres3=mysql_fetch_array($roomresult3);
$roomie3=$roomres3['roomrow']*7;

$roomsql4="select * from room where roomno='4'";
$roomresult4=mysql_query($roomsql4);
$roomres4=mysql_fetch_array($roomresult4);
$roomie4=$roomres4['roomrow']*7;

$roomsql5="select * from room where roomno='5'";
$roomresult5=mysql_query($roomsql5);
$roomres5=mysql_fetch_array($roomresult5);
$roomie5=$roomres5['roomrow']*7;

$roomsql6="select * from room where roomno='6'";
$roomresult6=mysql_query($roomsql6);
$roomres6=mysql_fetch_array($roomresult6);
$roomie6=$roomres6['roomrow']*7;

$roomsql7="select * from room where roomno='7'";
$roomresult7=mysql_query($roomsql7);
$roomres7=mysql_fetch_array($roomresult7);
$roomie7=$roomres7['roomrow']*7;

$roomsql8="select * from room where roomno='8'";
$roomresult8=mysql_query($roomsql8);
$roomres8=mysql_fetch_array($roomresult8);
$roomie8=$roomres8['roomrow']*7;
$roomie=array(0,$roomie1,$roomie2,$roomie3,$roomie4,$roomie5,$roomie6,$roomie7,$roomie8);
if(isset($_POST['1']))
{
	$sub1= $_POST['1'];
	
if($sub1==1)
{
	$rfu1=$rf1['sub1']+1;
	$ca1=$rfu1;
	mysql_query("update count2 set sub1='$rfu1' where sem='$sem' ");
	$sql="insert into register values(2,'$res1[2]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca1="DID NOT REGISTER";



if(isset($_POST['2']))
{	
	$sub2= $_POST['2'];
	
if($sub2==1)
{	$rfu1=$rf1['sub2']+1;
	$ca2=$rfu1;
	mysql_query("update count2 set sub2='$rfu1' where sem='$sem' ");
	$sql="insert into register values(2,'$res1[3]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca2="DID NOT REGISTER";

if(isset($_POST['3']))
{	
$sub3= $_POST['3'];
if($sub3==1)
{
	$rfu1=$rf1['sub3']+1;
	$ca3=$rfu1;
	mysql_query("update count2 set sub3='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[4]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca3="DID NOT REGISTER";

if(isset($_POST['4']))
{	
$sub4= $_POST['4'];
if($sub4==1)
{
	$rfu1=$rf1['sub4']+1;
	$ca4=$rfu1;
	mysql_query("update count2 set sub4='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[5]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca4="DID NOT REGISTER";

if(isset($_POST['5']))
{	
$sub5= $_POST['5'];
if($sub5==1)
{
	
	$rfu1=$rf1['sub5']+1;
	$ca5=$rfu1;
	mysql_query("update count2 set sub5='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[6]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca5="DID NOT REGISTER";

if(isset($_POST['6']))
{ 
$sub6= $_POST['6'];
if($sub6==1)
{
	
	$rfu1=$rf1['sub6']+1;
	$ca6=$rfu1;
	mysql_query("update count2 set sub6='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[7]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca6="DID NOT REGISTER";

if(isset($_POST['7']))
{ 
$sub7= $_POST['7'];
if($sub7==1)
{
	
	$rfu1=$rf1['sub7']+1;
	$ca7=$rfu1;
	mysql_query("update count2 set sub7='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[8]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca7="DID NOT REGISTER";


if(isset($_POST['8']))
{ 
$sub8= $_POST['8'];
if($sub8==1)
{
	
	$rfu1=$rf1['sub8']+1;
	$ca8=$rfu1;
	mysql_query("update count2 set sub8='$rfu1' where sem='$sem'");
	$sql="insert into register values(2,'$res1[9]','$usn','','')";
	$result = mysql_query($sql,$con);
}
}
else
$ca8="DID NOT REGISTER";

$countarray= array($ca1,$ca2,$ca3,$ca4,$ca5,$ca6,$ca7,$ca8);
foreach($subarray as $key => $value)
{
	$subjectactive=$subarray["$key"];
	echo $subjectactive;
	$query1="select * from schedule where subject='$subjectactive' and internal=2";
	$resultquery1=mysql_query($query1);
	$resquery1=mysql_fetch_array($resultquery1);
	$datenow=$resquery1['date'];
	$timenow=$resquery1['slot'];
	$countingas=mysql_query("select distinct sem from schedule where date='$datenow' and slot='$timenow'");
	$counting=mysql_num_rows($countingas);
	echo $roomie[1];
	
	if($counting<=2)
	{
		$room=0;
		$seat=0;
		if(is_numeric($countarray["$key"]))
		{
			if($countarray["$key"]<=$roomie[1])
			{
				$room=1;
				$seat=$countarray["$key"];
			}
			elseif($countarray["$key"]<=($roomie[1]+$roomie[2]))
			{
				$room=2;
				$seat=$countarray["$key"]-$roomie[1];
			}
			elseif($countarray["$key"]<=($roomie[1]+$roomie[2]+$roomie[3]))
			{
				$room=3;
				$seat=$countarray["$key"]-$roomie[1]-$roomie[2];
			}
			else
			{
				$room=4;
				$seat=$countarray["$key"]-$roomie[1]-$roomie[2]-$roomie[3];
			}
			$subjectactive=$subarray["$key"];
			$updq="update register set roomno='$room', seatno='$seat' where usn='$usn' and subject='$subjectactive' and internal='2'";
			$resupd=mysql_query($updq);
		}
	}
	else
	{
		if($sem==3 || $sem==7)
		{
			$room=0;
			$seat=0;
			
			if(is_numeric($countarray["$key"]))
			{
				if($countarray["$key"]<=$roomie[1])
				{
					$room=1;
					$seat=$countarray["$key"];
				}	
				elseif($countarray["$key"]<=($roomie[1]+$roomie[2]))
				{
					$room=2;
					$seat=$countarray["$key"]-$roomie[1];
				}
				elseif($countarray["$key"]<=($roomie[1]+$roomie[2]+$roomie[3]))
				{
					$room=3;
					$seat=$countarray["$key"]-$roomie[1]-$roomie[2];
				}
				else
				{
					$room=4;
					$seat=$countarray["$key"]-$roomie[1]-$roomie[2]-$roomie[3];
				}
					
				$subjectactive=$subarray["$key"];
				$updq="update register set roomno='$room', seatno='$seat' where usn='$usn' and subject='$subjectactive' and internal='2'";
				$resupd=mysql_query($updq);
			}
		}
		else
		{
			$room=0;
			$seat=0;
			if(is_numeric($countarray["$key"]))
			{
				if($countarray["$key"]<=$roomie[5])
				{
					$room=5;
					$seat=$countarray["$key"];
				}	
				elseif($countarray["$key"]<=($roomie[5]+$roomie[6]))
				{
					$room=6;
					$seat=$countarray["$key"]-$roomie[5];
				}
				elseif($countarray["$key"]<=($roomie[5]+$roomie[6]+$roomie[7]))
				{
					$room=7;
					$seat=$countarray["$key"]-$roomie[5]-$roomie[6];
				}
				else
				{
					$room=8;
					$seat=$countarray["$key"]-$roomie[5]-$roomie[6]-$roomie[7];
				}
				$subjectactive=$subarray["$key"];
				$updq="update register set roomno='$room', seatno='$seat' where usn='$usn' and subject='$subjectactive' and internal='2'";
				$resupd=mysql_query($updq);
			}
		}
	}
header("location: mail2.php");	
}	
/*
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
$mail->addReplyTo('bansalanshul121993@gmail.com', 'RVCE');  //Set an alternative reply-to address
$mail->addAddress($email,$name);  // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters        // Add attachments // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 

$mail->Subject = 'Registeration Details';
foreach($subarray as $key => $value)
{
	$room=" ";
	$seat="";
	if(is_numeric($countarray["$key"])){
		
		$room=$countarray["$key"]/21;
		$room=$room+1;
		$room=(int)$room;
		$seat=$countarray["$key"]%21;
		//$seat=$countarray["$key"]%21;
		$seat1=$seat+$room-1;
		
		
		$subjectactive=$subarray["$key"];
		$updq="update register set roomno='$room', seatno='$seat1' where usn='$usn' and subject='$subjectactive' and internal='1'";
		$resupd=mysql_query($updq);		
		
	$mail->Body = $mail->Body . $subarray["$key"] . "-> Room No: " .$room ."-> Seat No:".$seat1."<br>";
	
	}
	}

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
 
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(folder));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
header("location: registered.php"); */
?>