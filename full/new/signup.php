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
$newsql="select * from student where usn='$usn'";
$newresult=mysql_query($newsql);
$newcount=mysql_num_rows($newresult);
$newresult2=mysql_query("select * from subjects where usn='$usn'");
$newcount2=mysql_num_rows($newresult2);
if($newcount2==1)
{
if($newcount<1)
{
$msg="";
$pwd = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$address = $_POST['address'];
$name = $_POST['name'];
$fname= $_POST['fathersname'];
$femail= $_POST['fathersemail'];
$year=$_POST['year'];
$acdyear=$_POST['acdyear'];
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




	$sql="INSERT INTO student VALUES('$acdyear','$usn','$pwd','$name','$branch','$sem','$email','$phone','$address','$fname','$femail')";


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


header("location:student.php");
}

else
$msg="This USN has already been registered";
}
else
$msg="Usn is not present in Database";
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
	<img id="hello" src="back.png" style="width:100%;height:100%">
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <a href="http://localhost/full/index.html" <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
          <h1 class="text-center">REGISTER</h1>
		  <h3 class="text-center" color="red"><?php echo $msg;?></h3>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" name="myForm" action="#" method="post" name="login">
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="usn" name="usn" value="" onblur="myFunction()" placeholder="USN" required>
              <p id="error" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="name" name="name" value="" onblur="myFunction1()" placeholder="NAME" required>
              <p id="error1" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="password" name="password" value="" onblur="myFunction2()" placeholder="Password" required>
              <p id="error2" style="color:red"></p>
            </div>
			<div class="form-group">
              <input type="password" class="form-control input-lg" id="cpassword" name="cpassword" value="" onblur="myFunction3()" placeholder="Confirm Password" required>
              <p id="error3" style="color:red"></p>
            </div>

           <div class="form-group">
              <select class="form-control input-lg" name="branch" id="branch"   class="required" required> 
			  <option value="">SELECT BRANCH</option>
                <option value="CSE">COMPUTER SCIENCE ENGINEERING</option>
                <option value="ISE">INFORMATION SCIENCE ENGINEERING</option>
                <option value="EEE">ELECTRICAL ENGINEERING</option>
                <option value="ECE">ELECTRONICS AND COMMUNICATION ENGINEERING</option>
                <option value="ME">MECHANICAL ENGINEERING</option>
                <option value="BT">BIOTECH ENGINEERING</option>
                <option value="CVL">CIVIL ENGINEERING</option>
                <option value="CHE">CHEMICAL ENGINEERING</option>
              </select>
              <p id="error4" style="color:red"></p>
            </div>
            <div class="form-group">
				<select class="form-control input-lg" name="year" id="year" class="required" required> 
				<option value="">SELECT YEAR</option>
					<option value="12">1st</option>
					<option value="34">2nd</option>
					<option value="56">3rd</option>
					<option value="78">4th</option>
				</select>              
				
            </div>
			<div class="form-group">
				<select class="form-control input-lg" name="sem" id="sem"   class="required" required> 
					<option value="">SELECT SEMESTER TYPE</option>
					<option value="1">ODD</option>
					<option value="2">EVEN</option>
					
				</select>              
				<p id="error5" style="color:red"></p>
            </div>
			<div class="form-group">
              <input type="text" class="form-control input-lg" id="acdyear" name="acdyear" value=""  placeholder="Academic Year(eg: 2015-2015)" required>
              <p id="error6" style="color:red"></p>
            </div>
			
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="email" name="email" value="" onblur="myFunction6()" placeholder="EMAIL" required>
              <p id="error6" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="phone" name="phone" value="" onblur="myFunction7()" placeholder="PHONE NO" required>
              <p id="error7" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="address" name="address" value="" onblur="myFunction8()" placeholder="ADDRESS" required>
              <p id="error8" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="fathersname" name="fathersname" value="" onblur="myFunction9()" placeholder="FATHER'S NAME" required>
              <p id="error9" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="fathrsemail" name="fathersemail" value="" onblur="myFunction10()" placeholder="FATHER'S EMAIL" >
              <p id="error10" style="color:red"></p>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" id="submitbtn" type="submit" value="login">Sign Up</button>
              <p id="error" style="color:red"></p>
            </div>
          </form>
		  
      </div>
      <div class="modal-footer">
          	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script>
        var y,z;
        function myFunction() 
		{
			var x = document.getElementById("usn");
			x.value = x.value.toUpperCase();
			var usn = document.getElementById("usn").value;
			var reg = /[1-4]{1}[A-Z]{2}\d{2}[A-Z]{2}\d{2}/;
			var res = reg.test(usn);
			console.log(res);
			if(res && usn.length==10)
			{	
				y="";
			}
			else
			{
				y= " *INVALID USN ";}
                document.getElementById("error").innerHTML = y;
				
		
			
		
			
		}
		function myFunction1()
		{
			var z=0;
			var x = document.forms["myForm"]["name"].value;
			if ((x==null || x=="") ) 
			{
				z=1;             
			}
			if(z==1)
			{
                y= "* cannot be left blank ";
                document.getElementById("error1").innerHTML = y;
			}
			else
                document.getElementById("error1").innerHTML = "";//NULL;
		
			var x = document.getElementById("name");
			x.value = x.value.toUpperCase();
		
			
		}
		function myFunction2()
		{
			var z=0;
			var x = document.forms["myForm"]["password"].value;
			if (x==null || x=="") 
			{
				z=1;             
			}
			if(z==1)
			{
                y= "* cannot be left blank ";
                document.getElementById("error2").innerHTML = y;
			}
			else
                document.getElementById("error2").innerHTML = "";//NULL;
			
		}
		function myFunction3()
		{
			var z=0;
			var x = document.forms["myForm"]["cpassword"].value;
			var w = document.forms["myForm"]["password"].value;
			
			if ( x==w)
			{
				y = "";//NULL;
                
			}
			else
                {
				y= " *should be same as password ";}
                document.getElementById("error3").innerHTML = y;
				
		}
		function myFunction4()
		{
			var x = document.forms["myForm"]["branch"].value;
			if ( x==null)
			{
				y="*cannot be left blank";
                
			}
			else
                y= " ";
            document.getElementById("error4").innerHTML = y;
		}
		function myFunction5()
		{
			var x = document.forms["myForm"]["sem"].value;
			if (x!=1 && x!=3 && x!=5 &&x!=7)
			{
				y=" *select valid semester type";
            }
			else
            y="";
            document.getElementById("error5").innerHTML = y;
		}
		function myFunction6()
		{
			var x = document.forms["myForm"]["email"].value;
			var atpos = x.indexOf("@");
			var dotpos = x.lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
			{
				y=" * enter valid email address";
			}
			else y="";
			 document.getElementById("error7").innerHTML = y;
		}
		function myFunction7()
		{
			var z=0;
			var x = document.forms["myForm"]["phone"].value;
			if (isNaN(x))
			{
				y= "* enter valid phone number ";
			}
			else if(x.length !=10)
				y="* enter valid phone number";
				else
				y="";
            document.getElementById("error7").innerHTML = y;
			
		}
		function myFunction8()
		{
			var z=0;
			var x = document.forms["myForm"]["address"].value;
			if (x==null || x=="") 
			{
			    y= "* cannot be left blank ";
                document.getElementById("error8").innerHTML = y;
			}
			else
                document.getElementById("error8").innerHTML = "";//NULL;
				var x = document.getElementById("address");
			x.value = x.value.toUpperCase();
			
		}function myFunction9()
		{
			var z=0;
			var x = document.forms["myForm"]["fathersname"].value;
			if (x==null || x=="") 
			{
				y= "* cannot be left blank ";
                document.getElementById("error9").innerHTML = y;
			}
			else
                document.getElementById("error9").innerHTML = "";//NULL;
				var x = document.getElementById("fathersname");
			x.value = x.value.toUpperCase();
			
		}
		function myFunction10()
		{
			var x = document.forms["myForm"]["fathersemail"].value;
			var atpos = x.indexOf("@");
			var dotpos = x.lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
			{
				y=" * enter valid email address";
				document.getElementById("error10").innerHTML = y;
			}
		}
</script>
<script type="text/javascript">
	$('#year').change(function(){
	   selection = $(this).val();
	   switch(selection)
	   {
			case '12':
				$('#1').show();
				$('#2').hide();
				$('#3').hide();
				$('#4').hide();
				break;
			case '34':
				$('#1').hide();
				$('#2').show();
				$('#3').hide();
				$('#4').hide();
				break;
			case '56':
				$('#1').hide();
				$('#2').hide();
				$('#3').show();
				$('#4').hide();
				break;
			case '78':
				$('#1').hide();
				$('#2').hide();
				$('#3').hide();
				$('#4').show();
				break;
		}
		});
</script>
	</body>
</html>