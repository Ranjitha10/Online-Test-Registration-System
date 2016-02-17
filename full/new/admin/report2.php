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


SESSION_START();
$fid=$_SESSION['fid'];

if (!$_SESSION['fid'] == '')
{
//echo $email;
$sql="SELECT * FROM hod WHERE fid='$fid'";
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

if(isset($_POST['subjectselect']) && isset($_POST['internalselect']) && isset($_POST['roomselect']))
{
	$selectvalue=$_POST['subjectselect'];
	$selectvalue1=$_POST['internalselect'];
	$selectvalue2=$_POST['roomselect'];
	if($selectvalue==1)
		{
			$sql2="SELECT name ,r.usn from register as r ,student as s where r.internal='$selectvalue1' and r.subject='$res[4]' and r.roomno='$selectvalue2' and s.usn=r.usn ";
			$subvar=$res[4];
		}
	elseif($selectvalue==2)
		{
			$sql2="SELECT name ,r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[5]' and r.roomno='$selectvalue2' and s.usn=r.usn ";
			$subvar=$res[5];
		}
	elseif($selectvalue==3)
		{
			$sql2="SELECT name , r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[6]'and r.roomno='$selectvalue2' and s.usn=r.usn";
			$subvar=$res[6];
		}
	else
		{
			$sql2="SELECT name , r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[7]' and r.roomno='$selectvalue2' and s.usn=r.usn";
			$subvar=$res[7];
		}
	$res2=mysql_query($sql2);
	$count2=mysql_num_rows($res2);
	
	$sql3="select * from schedule where subject='$subvar' and internal='$selectvalue1'";
	$result3=mysql_query($sql3);
	$res3=mysql_fetch_assoc($result3);
	
	
}
else
{ $count2=0;
	echo "PLEASE ENTER THE SEMESTER";
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
                    <li class="active">
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
					<li >
                        <a href="uploadstudent.php"><i class="fa fa-fw fa-dashboard"></i>Upload Student Courses</a>                        
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
                            Welcome ADMIN
                        </h1>
                        <ol class="breadcrumb">
                           
                            <li class="active">
                                <i class="fa fa-fw fa-destop"></i>HOME
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                <div class="row">
					<form method="post" action="#" name="Submit" style="margin:0 auto">
						<table >
						<tr ><td id="c"><select name="subjectselect">
						<option value="0">SELECT SUBJECT</option>
						<option value="1"><?php echo$res[4];?></option>
						<option value="2"><?php echo$res[5];?></option>
						<option value="3"><?php echo$res[6];?></option>
						<option value="4"><?php echo$res[7];?></option>
						</select></td>
						<td ><select name="internalselect">
						<option value="0">SELECT INTERNAL</option>
						<option value="1">Internal 1</option>
						<option value="2">Internal 2</option>
						<option value="3">Internal 3</option>					
						</select></td>
						<td ><select name="roomlselect">
						<option value="0">SELECT ROOM</option>
						<option value="1">ROOM 1</option>
						<option value="2">ROOM 2</option>
						<option value="3">ROOM 3</option>					
						<option value="4">ROOM 4</option>
						</select></td></tr>
						<tr ><td  colspan="3"><input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
						</table>
					</form>
				</div>
				<div class="row">
				<br><br>
					<?php 
								$i=0;
								//if(isset($_POST['subjectselect']) && isset($_POST['internalselect']))
								if($count2>=1)
								{?>
								<div id="dv">
								<table id="tblExport" style="border: 1px solid black;" >
								<tr>
											<td colspan="5" style="text-align:center" ></h3>RVCE , Information Science Department</h3></td>
										</tr>
										<tr>
											<td colspan="2">Subject: <?php echo $res3['subject']; ?></td>
											<td colspan="2">Date: <?php echo $res3['date']; ?></td>
											<td>SLOT: <?php if($res3['slot']==1) echo "9:00 AM";
												elseif($res3['slot']==2) echo "11:00 AM";
												elseif($res3['slot']==3) echo "1:00 PM";
												else echo "3:00PM"; ?></td>
										</tr>
										<tr>
											<td colspan="5"></td>
										</tr>
									<tr>
											<td>S.NO</td>
											<td>NAME</td>
											<td>USN</td>
											<td>BOOKLET NO</td>
											<td>SIGNATURE</td>
										</tr>
										<tr>
											<td colspan="5"></td>
										</tr>
							
							<?php }?>
								
									
									<?php
										if(isset($_POST['subjectselect']) && isset($_POST['internalselect'])) 
										{ 
											while($detail = mysql_fetch_assoc($res2)){$i+=1;?>
												<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $detail['name'];?></td>
												<td><?php echo $detail['usn'];?></td>
												<td></td><td></td>
												</tr>
									<?php }}?>									
									<?php
										if(isset($_POST['subjectselect']) && isset($_POST['internalselect'])) 
									
									echo"<tr><td colspan=\"5\">TOTAL STUDENTS REGISTERED: ".$i."</td></tr>";?>
								</table>
								</div>
						</div> 
						<br><br>
					<div  class="row" style="text-align:center">
						<a href="battatech_excelexport-master/detail.php"<button style="text-align:center"  class="btn btn-lg btn-primary"> PRINT EXCEL SHEET </button></a>
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
