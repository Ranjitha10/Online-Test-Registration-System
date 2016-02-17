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
$sql1="SELECT * FROM course WHERE sem=1";
$result1 = mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1){
$res1= mysql_fetch_array($result1);
}
$sql2="SELECT * FROM course WHERE sem=3";
$result2 = mysql_query($sql2);
$count2=mysql_num_rows($result2);

if($count2==1){
$res2= mysql_fetch_array($result2);
}$sql3="SELECT * FROM course WHERE sem=5";
$result3 = mysql_query($sql3);
$count3=mysql_num_rows($result3);
if($count3==1){
$res3= mysql_fetch_array($result3);
}$sql4="SELECT * FROM course WHERE sem=7";
$result4 = mysql_query($sql4);
$count4=mysql_num_rows($result4);
if($count4==1){
$res4= mysql_fetch_array($result4);
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

        table, th, td {
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
                    <li class="active">
                        <a href="testschedule.php"><i class="fa fa-fw fa-dashboard"></i>Test Schedule</a>                        
                    </li>
					<li >
                        <a href="report1.php"><i class="fa fa-fw fa-dashboard"></i>Room Details</a>                        
                    </li>
					<li >
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
                            TEST SCHEDULE FIX
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="homeadmin.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-dashboard"></i>Test Schedule
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                 <div class="row">
                
                    <fieldset>
                        <legend>SELECTION</legend>
                      <form method="post" action="#" name="submit">
                         <table style="width:60%; margin:0 auto">
                            <tr><td colspan="3">
                                  <select  name="semester" id="semester">
                                        <option>SELECT SEMESTER</option>
                                        <option value="1">1st Semester</option>
                                        <option value="3">3rd Semester</option>
                                        <option value="5">5th Semester</option>
                                        <option value="7">7th Semester</option>
                                    </select><hr/>
                                    <select name="internal" >
                                        <option>SELECT INTERNAL</option>
                                        <option value="1">1st Internal</option>
                                        <option value="2">2nd Internal</option>
                                        <option value="3">3rd Internal</option>
                                        
                                    </select>
									
									<hr/>
                                    <input type="submit" name="submit" class="btn btn-lg btn-primary" value="SHOW SCHEDULE">
                            </td></tr><br>
							</table>
						</form>
						</fieldset>
						<br>
							
							<?php
								if(isset($_POST['semester']) && isset($_POST['internal']))
								{
									$sems=$_POST['semester'];
									$inte=$_POST['internal'];
								}
							?>
							
							 
							
                            <?php 
							if(isset($_POST['semester']) && isset($_POST['internal']))
								{
									$sems=$_POST['semester'];
									$inte=$_POST['internal'];
									$sqldone="select * from schedule where sem='$sems' and internal='$inte'";
									$resdone=mysql_query($sqldone);
									$countdone=mysql_num_rows($resdone);
									if($countdone>=1)
									{
									?>
									 <h3> YOU HAVE ALREADY FIXED THE SCHEDULE </h3>
									<?php
									}
									else
									{
									?>
									<fieldset>
									<legend>INTERNAL SCHEDULE</legend>
									<form method="post" action="time.php"> 
									<input type="hidden" name="sem" value="<?php echo $sems; ?>">
									<input type="hidden" name="internals" value="<?php echo $inte; ?>">
									<table style="width:60%; margin:0 auto">
									<tr>
									<td colspan="2"> DEADLINE:</td>
									<td><input type="date" name="deadline"></td>
									</tr>
									<tr><th>Course Name</th><th>DATE</th><th>TIME</th></tr>
									
									<?php
									$sqln="SELECT * FROM course WHERE sem='$sems'";
									$resultn=mysql_query($sqln);
									$countn=mysql_num_rows($resultn);
									if($countn==1)
									{
										$resn= mysql_fetch_array($resultn);
									}
							
							for($i=1;$i<11;$i++) 
							{  
								$j=$i+10;
								if($resn[$i]!=NULL)
								{
								?>
							<tr>
							<td><?php echo $resn[$i];?></td>
							<td><input type="date" name="<?php echo $i; ?>"></td>
                            <td>
                                <select name="<?php echo $j; ?>">
                                    <option value="0">SELECT TIME SLOT</option>
                                    <option value="1">9:00 AM to 11:00 AM</option>
                                    <option value="2">11:30 AM to 1:30 PM</option>
                                    <option value="3">2:00 PM to 4:00 PM</option>
                                    <option value="4">4:30 PM to 6:30 PM</option>
                                </select>
                            </td>
							</tr>
							
							<?php 
							}
							}
							?>
							
							 <tr><td colspan="3" style="align:center"><input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
                        </table>
                    </br>    
                </form>
				</fieldset>
							<?php
							}
							}
							?>
                          
							
                         
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
	

</body>

</html>

