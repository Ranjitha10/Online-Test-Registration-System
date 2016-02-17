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
$sem=$_POST['sem'];
$internal=$_POST['internals'];
$deadline=$_POST['deadline'];
mysql_query("INSERT INTO deadline VALUES('$sem','$internal','$deadline') ");
$sqln="SELECT * FROM course WHERE sem='$sem'";
$resultn=mysql_query($sqln);
$countn=mysql_num_rows($resultn);
if($countn==1)
{
	$resn= mysql_fetch_array($resultn);
}
$time = array(0,0,0,0,0,0,0,0,0,0);
$slot = array(0,0,0,0,0,0,0,0,0,0);
$check=0;
for($i=1;$i<11;$i++) 
{   
	$j=$i+10;
	if($resn[$i]!=NULL)
	{
		$time[($i-1)]=$_POST[$i];
		$slot[($i-1)]=$_POST[$j];
	}
}
for($i=0;$i<10;$i++)
{	
	if($resn[($i+1)]!=NULL)
	{ 
	if($slot[$i]==0 ||$time[$i]==0)
	{
		$check=1;
	}
	}
}
if($check==0)
{
for($i=1;$i<11;$i++) 
{  
	$j=$i-1;
	if($resn[$i]!=NULL)
	{
	mysql_query("INSERT INTO schedule VALUES('$sem','$internal','$resn[$i]','$time[$j]','$slot[$j]')");
	}
}
header("location: testschedule.php");
}
?>