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
if(isset($_SESSION['fid']))
{

$fid=$_SESSION['fid'];

ini_set("display_errors", "1");
//echo $email;
$sql="SELECT * FROM hod WHERE fid='$fid'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){
$res= mysql_fetch_array($result);
}
}
else
{
$res['name']="";
$res['fid']="";
$res['email']="";
$res['department']="";
$res['phone']="";
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
                    <li>
                        <a href="testschedule.php"><i class="fa fa-fw fa-dashboard"></i>Test Schedule</a>                        
                    </li>
                   <li>
                        <a href="report1.php"><i class="fa fa-fw fa-dashboard"></i>Room Details</a>                        
                    </li>
					<li>
                        <a href="uploadfaculty.php"><i class="fa fa-fw fa-dashboard"></i>Upload Faculty Details</a>                        
                    </li>	
					<li>
                        <a href="uploadstudent.php"><i class="fa fa-fw fa-dashboard"></i>Upload Student Courses</a>                        
                    </li>
					<li class ="active">
                        <a href="uploadcourse.php"><i class="fa fa-fw fa-dashboard"></i>Upload Courses Details</a>                        
                    </li>
					<li>
                        <a href="roomsize.php"><i class="fa fa-fw fa-dashboard"></i>Upload Room Structure </a>                        
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse
			-->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome ADMIN
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-fw fa-desktop"></i><a href="homeadmin.php" >Home</a>
                            </li>
							<li class="active">
                                <i class="fa fa-fw fa-dashboard"></i>Student Details
                            </li>

                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->
                
                <!-- /.row -->

                
                <!-- /.row -->
                 
				  <div class="row">
					<form name="upload_form" role="form" action="courseexcel.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    
               
                    <p><b>NOTE: </b><i> Here you have to upload a file which contains the database of the courses against their course codes for a particular academic year .</i> </p>
                </br>
                    <p> The file should follow some format as specified below:<br>
						<i>1. File should be a *.xlsx extension file.</i><br>
                        <i>2. File should have 3 columns , with the headings as Course and Course code.</i><br>
                        <br>
						AN EXAMPLE IS SHOWN BELOW
                        
                    </p>
					
                </div>
				<div class="row">
				<img src="examplestudentdetail.png" style="width:80%;height:250px;align:center"> 
				</div><br>
                <div class="row">
                    
                        <fieldset>
						
                            <legend>Upload Course Details </legend>
                            <div>
                                
                                <div >
                                    <input id="file" name="file" class="input-file" type="file">
                                </div>
                            </div><br>
							<button  class="btn btn-lg btn-primary" align = "center">Submit</button>
                            
							</form>
                        </fieldset>
                   

                </div>
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
