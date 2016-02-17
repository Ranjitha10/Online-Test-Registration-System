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
$fid=$_POST['fid'];
$pwd = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$name = $_POST['name'];
$acdyear = $_POST['acdyear'];




	$sql="INSERT INTO faculty VALUES('$fid','$pwd','$name','$branch','','','','','$phone','$email','$acdyear')";


$result = mysql_query($sql);

if(!$result)

echo "fail";
else
{
 
echo 'Message has been sent';
header("location:http://localhost/full/index.html");
}

?>