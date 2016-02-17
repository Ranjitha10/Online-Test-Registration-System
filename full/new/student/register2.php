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
$usn=$_SESSION['usn'];


//echo $email;
$sql="SELECT * FROM student WHERE usn='$usn'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
$res= mysql_fetch_array($result);
}
$semester= $res['sem'];

$sql1="SELECT * FROM subjects WHERE sem='$semester'";
$result1 = mysql_query($sql1);
$count1=mysql_num_rows($result1);
if($count1==1){
$res1= mysql_fetch_array($result1);
}
$sql2="SELECT * from subjects  WHERE usn='$usn'";
		$nu=0;
		$result2 = mysql_query($sql2);
		$count2=mysql_num_rows($result2);
		if($count2>=1)
		{
			$res2= mysql_fetch_array($result2);
		}
		for($i=2;$i<10;$i++)
		{	
			if($res2[$i]!=NULL)
			$nu++;
		}
$sub1=$res2['subject1'];
$sched="SELECT * FROM schedule WHERE sem='$semester' AND internal=2 ";
$schedres= mysql_query($sched);
$schedcount=mysql_num_rows($schedres);
$sched1="SELECT * FROM schedule WHERE sem='$semester' AND internal=2 AND subject='$sub1' ";
$newres=mysql_query($sched1);
$newresult=mysql_fetch_array($newres);
$deadline=$newresult['date'];
$sqln="SELECT sc.subject,sc.date,sc.slot,a.att FROM attendence as a,schedule as sc where sc.subject=a.subject and internal=2 and a.usn='$usn'";
$resultn=mysql_query($sqln);
$num=mysql_num_rows($resultn);
$sqlm="select * from subjects where usn='$usn'";
$resultm=mysql_query($sqlm);
$ress=mysql_fetch_array($resultm);
$sqlex="select * from register where usn='$usn' and internal=2";
$resultex=mysql_query($sqlex);
$countex=mysql_num_rows($resultex);
if($countex>=1)
	$status=1;
else
	$status=0;
	
	$schedulet=0;
$date1=date('Y-m-d');
$try="select * from deadline where internal=2 and sem='$semester' ";
$resultry=mysql_query($try);
$country=mysql_num_rows($resultry);
if($country==1)
{
$end=mysql_fetch_array($resultry);
//$tempArr=explode('_', $end['date']);
$date2 = $end['date'];
if(strtotime($date1)<=strtotime($date2))
   $schedulet=0;
else
  $schedulet=1;
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

<body onload="myFunction()">

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
					<div style="width:50%;float: left;color:#E6E8EB;"><br/> <br><p><i>Dept of Info. Science<br><?php echo $res['acdyear'];?></i></p></div>
                       <li> 
						<a href="home.php"><i class="fa fa-fw fa-desktop"></i> HOME</a>
                    </li>
                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-dashboard"></i> SUBJECTS <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <?php if( $nu>0)
							{
							?>
								<li>
									<a href="subj1.php"><i class="fa fa-fw fa-file"></i> <?php echo $res2[2]; ?></a>
								</li>
							<?php 
							}
							if( $nu>1)
							{
							?>
								<li>
									<a href="subj2.php"><i class="fa fa-fw fa-file"></i> <?php echo $res2[3]; ?></a>
								</li>
							<?php 
							}
							if($nu>2)
							{
							?>
                            <li>
                                <a href="subj3.php"><i class="fa fa-fw fa-file"></i><?php echo $res2[4]; ?></a>
                            </li>
                            <?php 
							}
							if($nu>3)
							{
							?>
                            <li>
                                <a href="subj4.php"><i class="fa fa-fw fa-file"></i><?php echo $res2[5]; ?></a>
                            </li>
                            <?php
							}
							if( $nu>4)
							{
							?>
								<li>
									<a href="subj5.php"><i class="fa fa-fw fa-file"></i> <?php echo $res2[6]; ?></a>
								</li>
							<?php 
							}
							if( $nu>5)
							{
							?>
								<li>
									<a href="subj6.php"><i class="fa fa-fw fa-file"></i> <?php echo $res2[7]; ?></a>
								</li>
							<?php 
							}
							if($nu>6)
							{
							?>
                            <li>
                                <a href="subj7.php"><i class="fa fa-fw fa-file"></i><?php echo $res2[8]; ?></a>
                            </li>
                            <?php 
							}
							if($nu==8)
							{
							?>
                            <li>
                                <a href="subj8.php"><i class="fa fa-fw fa-file"></i><?php echo $res2[9]; ?></a>
                            </li>
                            <?php
							}
							?>
                            
                        </ul>
                    </li>
                    
                    <li class="active">
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i> REGISTER <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li class="active">
                                <a href="register1.php">1st Internal</a>
                            </li>
                            <li>
                                <a href="#">2nd Internal</a>
                            </li>
                            <li>
                                <a href="register3.php">3rd Internal</a>
                            </li>
                            
                        </ul>
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
                            Second Internal 
                        </h1><h3>(Deadline By: <?php if($country==1) echo $date2; else echo "NO DEADLINE SET";?>)</h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="home.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-file"></i>Second Internal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                 <div class="row" id="register" >
                 <form method="post" action="try2.php"> 
                    <fieldset>
                        <legend>EXAMS</legend>
                           

                         <table style="width:60%; margin:0 auto">
                            <tr>
                                <th>Course Name</th>
                                <th>Attendance(%)</th>
                                <th>Date of Exam</th>
                                <th>Time of Exam</th>
                                <th>Select</th>
                            </tr>
							<?php 
							while($resn=mysql_fetch_array($resultn,MYSQL_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $resn['subject']; ?></td>
								<td><?php echo $resn['att'] ; ?> </td>
                                <td><?php echo $resn['date'];?></td>
                                <td><?php if($resn['slot']==1) echo"9:00 AM to 11:00 AM";
										elseif($resn['slot']==2) echo"11:30 AM to 1:30PM";
										elseif($resn['slot']==3) echo"2:00 PM to 4:00PM";
										elseif($resn['slot']==4) echo"4:30 PM to 6:30PM";
								?></td>
								<?php 
										
									  if($resn['subject']==$ress['subject1']) $i=1; 
									  elseif($resn['subject']==$ress['subject2']) $i=2;
									  elseif($resn['subject']==$ress['subject3']) $i=3;
									  elseif($resn['subject']==$ress['subject4']) $i=4;
									  elseif($resn['subject']==$ress['subject5']) $i=5;
									  elseif($resn['subject']==$ress['subject6']) $i=6;
									  elseif($resn['subject']==$ress['subject7']) $i=7;
									  elseif($resn['subject']==$ress['subject8']) $i=8;
								?>
                                <?php if($resn['att']<0) { ?>
								<td><input type="checkbox" id="check1"name="<?php echo $i; ?>" style="width:15px;height:15px;" value="0" disabled></td>
								<?php 
								} 
								else 
								{
								
								?>
								<td><input type="checkbox" id="check1"name="<?php echo $i; ?>" style="width:15px;height:15px;" value="1"></td>
								<?php } ?>
                            </tr>
							
							<?php }
							?>
							<tr>
							<td colspan="5" style="align:center">
                            <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
                        </table>  
                    </br>
                        <p><b>**NOTE:</b><i>Students who have less than 85 % attendance in any subject will not be allowed to write those particular subjects.</i></p>         
                    </fieldset>
                </form>
                         
                </div>
				<div class="row" id="registernot" >
					<h3> Registrations not available for 2nd Internal </h3>
				</div>
				<div class="row" id="registered" >
					<h3> You have already registered !!</h3>
				</div>
				<div class="row" id="registerclose" >
					<h3> REGISTRATION CLOSED</h3>
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
              <script>
                            function myFunction() 
							{
							if(<?=$schedcount?><1)
							{
							$('#register').hide();
							$('#registernot').show();
							$('#registered').hide();
							$('#registerclose').hide();
							return;
							}		
							if(<?=$schedulet?>==1)
								{
									$('#register').hide();
									$('#registernot').hide();
									$('#registered').hide();
									$('#registerclose').show();
									return;
								}							
                           	if(<?=$status?>==1)
								{
									$('#register').hide();
									$('#registernot').hide();
									$('#registered').show();
									$('#registerclose').hide();
								}
							if(<?=$status?>==0)
								{
									$('#register').show();
									$('#registernot').hide();
									$('#registered').hide();
									$('#registerclose').hide();
								}	
						
								
							}
							
                            
                        </script>
                 
</html>
