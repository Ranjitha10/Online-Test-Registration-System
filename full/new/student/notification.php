<?php 
//error_reporting(E_ALL ^ E_NOTICE);

$usn=$_SESSION['usn'];
echo $usn;
//echo $email;

$sql="SELECT * FROM student WHERE usn='$usn'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_array($result);
}
$semester= $res['sem'];
$nusn= $res['usn'];

$sql1="SELECT * FROM subjects WHERE sem='$semester'";
$result1 = mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1){
$res1= mysql_fetch_array($result1);
}
$nsub1=$res1['subject1'];
$nsub2=$res1['subject2'];
$nsub3=$res1['subject3'];
$nsub4=$res1['subject4'];
$nsub5=$res1['subject5'];
$nsub6=$res1['subject6'];
$nh1="SELECT * FROM schedule WHERE sem='$semester' AND internal=1";
$rnh1= mysql_query($nh1);
$countnh1=mysql_num_rows($rnh1);


$nh2="SELECT * FROM schedule WHERE sem='$semester' AND internal=2";
$rnh2= mysql_query($nh2);
$countnh2=mysql_num_rows($rnh2);

$nh3="SELECT * FROM schedule WHERE sem='$semester' AND internal=3";
$rnh3= mysql_query($nh3);
$countnh3=mysql_num_rows($rnh3);

$nh1="SELECT * FROM schedule WHERE sem='$semester' AND internal=1";
$rnh1= mysql_query($nh1);
$countnh1=mysql_num_rows($rnh1);

$as1="SELECT * FROM assignment WHERE usn='$nusn' AND subject='$nsub1'";
$ras1= mysql_query($as1);
$countas1=mysql_num_rows($ras1);

$as2="SELECT * FROM assignment WHERE usn='$nusn' AND subject='$nsub2'";
$ras2= mysql_query($as2);
$countas2=mysql_num_rows($ras2);

$as3="SELECT * FROM assignment WHERE usn='$nusn' AND subject='$nsub3'";
$ras3= mysql_query($as3);
$countas3=mysql_num_rows($ras3);

$as4="SELECT * FROM assignment WHERE usn='$nusn' AND subject='$nsub4'";
$ras4= mysql_query($as4);
$countas4=mysql_num_rows($ras4);

$as5="SELECT * FROM assignment WHERE usn='$nusn' AND subject='$nsub5'";
$ras5= mysql_query($as5);
$countas5=mysql_num_rows($ras5);

$at1="SELECT * FROM attendence WHERE usn='$nusn' AND subject='$nsub1'";
$rat1= mysql_query($at1);
$countat1=mysql_num_rows($rat1);

$facn="SELECT * FROM faculty WHERE sub1='$nsub1' OR sub2='$nsub1'";
$rfacn= mysql_query($facn);
$rrfacn=mysql_fetch_array($rfacn);
$fname=$rrfacn['name'];
?>