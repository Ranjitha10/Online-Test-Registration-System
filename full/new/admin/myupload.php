<?php 
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
$fid=$_SESSION['fid'];
$sql1="SELECT * FROM faculty WHERE fid='$fid'";
$result1=mysql_query($sql1);
$res1=mysql_fetch_assoc($result1);
$sub1=$res1['sub1'];
$fname=$res1['name'];
$sub2=$res1['sub2'];
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
                <li class="dropdown">
                                        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fname;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="editprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li > <div style="margin:0 auto"><img src=logo.png width="100px" height="100px"></div></li>
                    <li >
                        <a href="homefaculty.php"><i class="fa fa-fw fa-desktop"></i> HOME</a>
                    </li>
                    
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i>Upload Marksheet<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li >
                                <a href="marksub1.php"><i class="fa fa-fw fa-file"></i><?php echo $sub1;?></a>
                            </li>
                            <li>
                                <a href="marksub2.php"><i class="fa fa-fw fa-file"></i><?php echo $sub2;?></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-edit"></i>Attendance Sheet<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li class="active">
                                <a href="attsub1.php"><i class="fa fa-fw fa-file"></i><?php echo $sub1;?></a>
                            </li>
                            <li>
                                <a href="attsub2.php"><i class="fa fa-fw fa-file"></i><?php echo $sub2;?></a>
                            </li>
                        </ul>
                    </li>
                    <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-edit"></i>Assignment Update<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li >
                                <a href="asssub1.php"><i class="fa fa-fw fa-file"></i><?php echo $sub1;?></a>
                            </li>
                            <li>
                                <a href="asssub2.php"><i class="fa fa-fw fa-file"></i><?php echo $sub2;?></a>
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
                            ATTENDANCE
                        </h1>
                        <ol class="breadcrumb">
                           
                           <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="homefaculty.php">Home</a>
                            </li>
                             <li class="active">
                                <i class="fa fa-fw fa-file"></i>Attendance (<?php echo $sub1;?>)
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                 <div class="row">
                    <p><b>NOTE: </b><i> Here you have to upload a file which contains the database of the students undertaking this particular subject and also their attendance in this subject.</i> </p>
                </br>
                    <p> The file should follow some format as specified below:<br>
                        <i>1. File should be a *.xlsx extension file.</i><br>
                        <i>2. File should have 3 columns , with the headings as USN , Name and Attendance repectively.</i><br>
                        <i>3. Each row indicates an entry of a particular student of the class.</i><br>
                        
                    </p>
                </div>
  
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

										$column = count($data[0]);
											
										
										for($i = 2; $i < $row; $i++)
										{
											$usn = $data[$i][0];
											$att=  $data[$i][1];
												$sql2="SELECT * FROM attendence WHERE usn='$usn' and sub='$sub1'";
												$check2=mysql_query($sql2);
												$sql = " update  attendence set att='$att' WHERE usn='$usn' AND subject='$sub1'";
												$check=mysql_query($sql);
												
												
												
										}
									}

									
							}			
mysql_close($con);
										unlink($csvFile);
									
								
								echo '<div class="row">';
								echo '<h3 class = "center">Data updated Successfully <br><br> <a href="attsub1.php">Back to upload Page</a></h3>';
								echo '</div></div></div>';
								echo $check23;
								echo '1';
							}
							else
							{
								echo '<div class="row">';
								echo '<h3 class = "center">Wrong Format Uploaded <br><br> <a  href="attsub1.php">Back to upload Page</a></h3>';
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
