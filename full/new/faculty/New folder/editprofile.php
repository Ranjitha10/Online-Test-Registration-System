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
session_start();
if(isset($_SESSION['fid']))
{
$fid=$_SESSION['fid'];

if (!$_SESSION['fid'] == '')
{
//echo $email;
$sql="SELECT * FROM faculty WHERE fid='$fid'";
$nu=0;
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_array($result);

for($i=4;$i<8;$i++)
{	
	if($res[$i]!=NULL)
	
	$nu++;
}
}
$num=$nu+4;
}
/*$semester= $res['sem'];
$sql1="SELECT * FROM subjects WHERE sem='$semester'";
$result1 = mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1){
$res= mysql_fetch_array($result1);
}*/
}
else
{
$res['name']="";
$res['fid']="";
$res['branch']="";
$res['sub1']="";
$res['email']="";
$res['sub2']="";
$res['sub3']="";
$res['sub4']="";
$res['phone']="";
}
if(isset($_POST['phone']) ||isset($_POST['email']))
{
$fid=$_SESSION['fid'];
$phone=$_POST['phone'];
$email=$_POST['email'];

mysql_query("update faculty set phone='$phone', email='$email' where fid='$fid'");

header("location:homefaculty.php");
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
				Developed By:	Meghal Gupta, Anshul Bansal, Abhimanyu Raj" style="background-color:#1D1D1D;color:#000000;text-decoration:none">
				<img src=creator.png width="20" height="20">
				</a>
				<li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav">
                    <div style="margin:0 auto;width:50%;float: left;"><img src=logo.png width="100px" height="100px"></div>
					<div style="width:50%;float: left;color:#E6E8EB;"><br/> <br><p><i>Dept of Info. Science</i></p></div>
                    <li class="active">
                        <a href="homefaculty.php"><i class="fa fa-fw fa-desktop"></i> HOME</a>
                    </li>
                    
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i>Upload Marksheet<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li >
                                <a href="marksub1.php"><i class="fa fa-fw fa-file"></i> <?php echo $res['sub1']; ?></a>
                            </li>
                            <li>
                                <a href="marksub2.php"><i class="fa fa-fw fa-file"></i><?php echo $res['sub2']; ?></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i>Attendance Sheet<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li >
                                <a href="attsub1.php"><i class="fa fa-fw fa-file"></i><?php echo $res['sub1']; ?></a>
                            </li>
                            <li>
                                <a href="attsub2.php"><i class="fa fa-fw fa-file"></i> <?php echo $res['sub2']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit"></i>Assignment Update<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li >
                                <a href="asssub1.php"><i class="fa fa-fw fa-file"></i><?php echo $res['sub1']; ?></a>
                            </li>
                            <li>
                                <a href="asssub2.php"><i class="fa fa-fw fa-file"></i><?php echo $res['sub2']; ?></a>
                            </li>
                        </ul>
                    </li>
                   <li >
                        <a href="detail.php"><i class="fa fa-fw fa-edit"></i> Student Registered</a>
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
                            <?php echo $res['name']; ?>
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-fw fa-desktop"></i>HOME
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                 <div class="row">
                    <fieldset>
						<form action="#" method="post" name="submit">
                    <table style="width:60%; margin:0 auto">
                        
                        <legend>EDIT PROFILE</legend>
                            <table style="width:60%; margin:0 auto">
                                <tr><td><h3>Faculty ID:</h3></td>
                                <td> <h3><?php echo $res['fid']; ?></h3></td></tr>
                                <tr><td><h3>Department:</h3></td>
                                <td> <h3><?php echo $res['branch']; ?></h3></td></tr>
                                <tr><td><h3>E-mail ID:</h3></td>
                                <td><input type="text" name="email" id="email" value="<?php echo $res['email'];?>"></td></tr>
                                <tr><td><h3>Contact No:</h3></td>
                                <td> <input type="text" name="phone" id="phone" value="<?php echo $res['phone'];?>"></td></tr>
                                <tr><td><h3>Subject 1:</h3></td>
                                <td> <h3><?php echo $res['sub1']; ?><h3></td>                                
                                <tr><td><h3>Subject 2:</h3></td>
                                <td> <h3><?php echo $res['sub2']; ?></h3></td>
								<tr><td colspan="2" style="margin:0 auto"><input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
                            </table>
                    </fieldset>
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

</body>

</html>
