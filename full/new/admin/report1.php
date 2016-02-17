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



ini_set("display_errors", "1");
//echo $email;
$sql="SELECT * FROM hod WHERE fid='admin'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_array($result);
}
if(isset($_POST['roomselect']) && isset($_POST['dateselect'])&& isset($_POST['slotselect']))
{
	$selectvalue=$_POST['roomselect'];
	$selectvalue1=$_POST['dateselect'];
	$selectvalue2=$_POST['slotselect'];
	$sql2="select distinct sem from schedule where date='$selectvalue1' and slot='$selectvalue2' ORDER BY sem ";
	$result2=mysql_query($sql2);
	$b=0;
	//$sem=array(0,0); 
	
	while($semester= mysql_fetch_array($result2, MYSQL_ASSOC))	
	{//echo "<h3>".$semester['sem']."</h3>";
		if($b==0)
			$sem1=$semester['sem'];
		else
			$sem2=$semester['sem'];
		$b++;
	}
	$sql7="select subject from schedule where date='$selectvalue1' and slot='$selectvalue2' ORDER BY sem";
	$result7=mysql_query($sql7);
	$b=0; 
	
	while($currentsubject= mysql_fetch_array($result7, MYSQL_ASSOC))	
	{
		if($b==0)
			$sub1=$currentsubject['subject'];
		else
			$sub2=$currentsubject['subject'];
		$b++;
	}
	$sql3="select  r.usn , seatno from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' order by seatno";
	$sql4="select  r.usn ,seatno from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' order by seatno ";
	$result3=mysql_query($sql3);
	$result4=mysql_query($sql4);
	$count3=mysql_num_rows($result3);
	//$res3=mysql_fetch_array($result3);
	$count4=mysql_num_rows($result4);
	//$res4= mysql_fetch_array($result4, MYSQL_ASSOC);
	//$res4=mysql_fetch_array($res5);
	//$c1=mysql_num_rows($res5);
	

	
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="js/d3.min.js"></script>
    <script type="text/javascript" src="js/radialProgress.js"></script>

    <link type="text/css" rel="stylesheet" href="css/graph-style.css">
    <title>RV COLLEGE</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
		table{width:50%; 
		margin:0 auto;
		border: 1px solid black;
        border-collapse: collapse;
        padding: 25px;
        text-align: center;
		}
         th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 25px;
        text-align: center;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <div style=" color:#E6E8EB; left:230px; top: 10px;position :absolute;font-size:200%"><p>ONLINE TEST REGISTRATION SYSTEM</p></div>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $res['name'];?> <b class="caret"></b> </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
				<li>
				<a href=" " 
				title="
				Developed By:	Shreya Khanna And Sampada Sethi" style="background-color:#1D1D1D;color:#000000;text-decoration:none">
				<img src=creator.png width="20" height="20">
				</a>
				<li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav">
                    <div style="margin:0 auto;width:50%;float: left;"><img src=logo.png width="100px" height="100px"></div>
					<div style="width:50%;float: left;color:#E6E8EB;"><br/> <br><p><i>Dept of Info. Science<br>2015-2015</i></p></div>
                     <li>
						<a href="homeadmin.php"><i class="fa fa-fw fa-desktop"></i> HOME</a>
                    </li>
                    <li >
                        <a href="testschedule.php"><i class="fa fa-fw fa-dashboard"></i>Test Schedule</a>                        
                    </li>
					<li class="active">
                        <a href="report1.php"><i class="fa fa-fw fa-dashboard"></i>Room Details</a>                        
                    </li>
					<li>
                        <a href="uploadfaculty.php"><i class="fa fa-fw fa-dashboard"></i>Upload Faculty Details</a>                        
                    </li>	
					<li >
                        <a href="uploadstudent.php"><i class="fa fa-fw fa-dashboard"></i>Upload Student Courses</a>                        
                    </li>
					<li>
                        <a href="uploadcourse.php"><i class="fa fa-fw fa-dashboard"></i>Upload Courses Details</a>                        
                    </li>
					  <li>
                        <a href="roomsize.php"><i class="fa fa-fw fa-dashboard"></i>Upload Room Structure </a>                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ROOM DETAILS
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="homeadmin.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-dashboard"></i>Room Details
                            </li>
                        </ol>
                    </div>
                </div>
                 <div class="row">
					<form method="post" action="battatech_excelexport-master/roomd.php" name="Submit" name="Submit" style="margin:0 auto">
						<table >
						<tr ><td ><select name="roomselect">
						<option value="0">SELECT ROOM</option>
						<option value="1">ROOM NO 1</option>
						<option value="2">ROOM NO 2</option>
						<option value="3">ROOM NO 3</option>
						<option value="4">ROOM NO 4</option>
						<option value="5">ROOM NO 5</option>
						<option value="6">ROOM NO 6</option>
						<option value="7">ROOM NO 7</option>
						<option value="8">ROOM NO 8</option>
						</select></td>
						<td ><input type="date" name="dateselect"></td>
						<td><select name="slotselect">
						<option value="0">DATE SLOT</option>
						<option value="1">9:00 AM</option>
						<option value="2">11:00 AM</option>
						<option value="3">1:00 PM</option>
						<option value="4">3:00 PM</option>
						</select></td></tr>
						<tr ><td  colspan="3"><input type="submit" class="btn btn-lg btn-primary" value="View Excel Sheet" name="Submit"></td></tr>
						</table>
					</form>
				</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script type="text/javascript">
	

</body>

</html>

