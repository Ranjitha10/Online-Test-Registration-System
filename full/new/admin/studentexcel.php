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
$fname=$res['name'];
}
$sem=$_POST['sem'];
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
                    <li >
                        <a href="homeadmin.php"><i class="fa fa-fw fa-desktop"></i> HOME</a>
                    </li>
                    <li>
                        <a href="testschedule.php"><i class="fa fa-fw fa-dashboard"></i>Test Schedule</a>                        
                    </li>
                   <li >
                        <a href="report1.php"><i class="fa fa-fw fa-dashboard"></i>Room Details</a>                        
                    </li>
					<li >
                        <a href="uploadfaculty.php"><i class="fa fa-fw fa-dashboard"></i>Upload Faculty Details</a>                        
                    </li>
					<li class="active">
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
                            Upload Student Details
                        </h1>
                        <ol class="breadcrumb">
                           
                           <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="homeadmin.php">Home</a>
                            </li>
                             <li class="active">
                                <i class="fa fa-fw fa-file"></i>Student Details
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                 <div class="row">
                    <p><b>NOTE: </b><i> Here you have to upload a file which contains the database of the students undertaking this particular subject .</i> </p>
                </br>
                    <p> The file should follow some format as specified below:<br>
						<i>1. File should be a *.xlsx extension file.</i><br>
                        <i>2. File should have 9 columns , with the headings as USN ,Subject1, Subject2..... respectively.</i><br>
                        <i>3. Each row indicates an entry of a particular student of the particular semester.</i><br>
						<br>
						AN EXAMPLE IS SHOWN BELOW
                        
                    </p>
                </div>
				<div class="row">
				<img src="examplestudentdetail.png" style="width:80%;height:250px;align:center"> 
				</div><br>
				
	<?php



							$allowedExts = array('xls' ,'xlsx' ,'Excel5' , 'Excel2003XML' , 'Excel2007' ,'Excel' ,'Excel2010');
							$allowedExts = array('xls' ,'xlsx' ,'Excel5' , 'Excel2003XML' , 'Excel2007' ,'Excel' ,'Excel2010');
							$temp = explode(".", $_FILES["file"]["name"]);
							$extension = end($temp);
							$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);	

							if( (($ext=="xls") || ($ext=="xlsx")) && in_array($extension, $allowedExts) )
							{
								if ($_FILES["file"]["error"] > 0)
								{
									echo "Error: " . $_FILES["file"]["error"] . "<br>";
								}
								else
								{
									$excel_readers = array('Excel5' ,'Excel','Excel2003XML' , 'Excel2007' ,'Excel2010');
									define("UPLOAD_DIR", "uploads/");
									if (!empty($_FILES["file"]))
									{
										$myFile = $_FILES["file"];
										if ($myFile["error"] !== UPLOAD_ERR_OK)
										{
											echo "An error occurred.";
											exit;
										}
										$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
													 
										$i = 0;
										$parts = pathinfo($name);
										while (file_exists(UPLOAD_DIR . $name))
										{
											$i++;
											$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
										}
													 
										$success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);
										if (!$success) 
										{ 
											echo "<h2><small>Unable to save file.</small></h2>";
											exit;
										}

										chmod(UPLOAD_DIR . $name, 0644);
										require_once('Library/PHPExcel.php');
										 $reader = PHPExcel_IOFactory::createReader('Excel2007');
										$reader->setReadDataOnly(true);
													 
										$path = UPLOAD_DIR . $name;
										$excel = $reader->load($path);
													 
										$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
										$writer->save('data.csv');


										function readCSV($csvFile)
										{
											$file_handle = fopen($csvFile, 'r');
											while (!feof($file_handle) )
											{
												$line_of_text[] = fgetcsv($file_handle, 1024);
											}
											fclose($file_handle);
											return $line_of_text;
										}
										$csvFile = 'data.csv';
										$data = readCSV($csvFile);
										
										$row = 0;
										foreach($data as $fields) $row++;
										
										$row = 0;
										foreach($data as $fields) $row++;
										
										$column = count($data[0]);
										
										for($i =2;$i<$row-1; $i++)
										{
											$usn = $data[$i][0];
											$sub1=  $data[$i][1];
											$sub2=  $data[$i][2];
											$sub3=  $data[$i][3];
											$sub4=  $data[$i][4];
											$sub5=  $data[$i][5];
											$sub6=  $data[$i][6];
											$sub7=  $data[$i][7];
											$sub8=  $data[$i][8];
											echo $usn;
											if($sub8=='null'||$sub8=='NULL'||$sub8=='Null')
											{
												if($sub7=='null'||$sub7=='NULL'||$sub7=='Null')
												{
													if($sub6=='null'||$sub6=='NULL'||$sub6=='Null')
													{
														if($sub5=='null'||$sub5=='NULL'||$sub5=='Null')
														{
															if($sub4=='null'||$sub4=='NULL'||$sub4=='Null')
															{
																if($sub3=='null'||$sub3=='NULL'||$sub3=='Null')
																{
																	if($sub2=='null'||$sub2=='NULL'||$sub2=='Null')
																	{
																		$sql = " insert into  subjects values('$usn','$sem','$sub1',NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
																	}
																	else
																	{
																		$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2',NULL,NULL,NULL,NULL,NULL,NULL)";
																	}
																}
																else
																{	
																	$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3',NULL,NULL,NULL,NULL,NULL)";
																}
															}
															else
															{
																$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3','$sub4',NULL,NULL,NULL,NULL)";
															}
														}
														else
														{
															$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3','$sub4','$sub5',NULL,NULL,NULL)";
														}
													}
													else
													{
														$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6',NULL,NULL)";
													}
												}
												else
												{
													$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7',NULL)";
												}
											}
											else
											{
												$sql = " insert into  subjects values('$usn','$sem','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7','$sub8')";
											}
												$check=mysql_query($sql);
												
												
												
										}
									}
									
									
							}			
mysql_close($con);
										unlink($csvFile);
									
								
								echo '<div class="row">';
								echo '<h3 class = "center">Data updated Successfully <br><br> <a href="uploadstudent.php">Back to upload Page</a></h3>';
								echo '</div></div></div>';
						
							}
							else
							{
								echo '<div class="row">';
								echo '<h3 class = "center">Wrong Format Uploaded <br><br> <a  href="uploadstudent.php">Back to upload Page</a></h3>';
								echo '</div></div></div>';
								
							}
							
						?>
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
