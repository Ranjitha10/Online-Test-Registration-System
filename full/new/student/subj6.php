<?php
//error_reporting(E_ALL ^ E_NOTICE);
$host="localhost";
$username="root";
$password="root";
$db_name="exam";

$con = mysql_connect("$host","$username","$password");
if(!$con)
{
	die("cannot connect");
}

$db_sel = mysql_select_db("$db_name",$con);
if(!$db_sel)
{
	die("Cannot select db");
}



ini_set("display_errors", "1");
session_start();
if(isset($_SESSION['usn']))
{
	$usn=$_SESSION['usn'];
	
	if (!$_SESSION['usn'] == '')
	{
		//echo $email;
		$sql="SELECT * FROM student WHERE usn='$usn'";
		$result = mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count==1)
		{
			$res= mysql_fetch_array($result);
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
		$sub1=$res2['subject6'];
		$sql1= "SELECT * FROM attendence WHERE usn='$usn' AND subject='$sub1'";
		$result1 = mysql_query($sql1);
		$count1=mysql_num_rows($result1);
		if($count1>=1)
		{
			$res1= mysql_fetch_assoc($result1);
		}

			$sql3= "SELECT * FROM internal1 WHERE usn='$usn' AND subject='$sub1'";
			$result3 = mysql_query($sql3);
			$count3=mysql_num_rows($result3);
			if($count3>=1)
			{
				$res3= mysql_fetch_assoc($result3);
			}
			else
				$res3['marks']=0;
			$sql4= "SELECT * FROM internal2 WHERE usn='$usn' AND subject='$sub1'";
			$result4 = mysql_query($sql4);
			$count4=mysql_num_rows($result4);
			if($count4>=1)
			{
				$res4= mysql_fetch_assoc($result4);
			}
			else
				$res4['marks']=0;
			$sql5= "SELECT * FROM internal3 WHERE usn='$usn' AND subject='$sub1'";
			$result5 = mysql_query($sql5);
			$count5=mysql_num_rows($result5);
			if($count5>=1)
			{
				$res5= mysql_fetch_assoc($result5);
			}
			else
			$res5['marks']=0;
			$sql6= "SELECT * FROM assignment WHERE usn='$usn' AND subject='$sub1'";
			$result6 = mysql_query($sql6);
			$count6=mysql_num_rows($result6);
			if($result6)
			{
				mysql_query("insert into assignment values('$usn','$sub1',0)");
			}
			if($count6==1)
			{
				$res6= mysql_fetch_assoc($result6);
				$result6 = mysql_query($sql6);
				$count6=mysql_num_rows($result6);
			}
			$variable=$res6['submission'];
			$comm="SELECT sub6 FROM finalmarks WHERE usn='$usn' ";
			$resultnew=mysql_query($comm);
			$countnew=mysql_fetch_row($resultnew);
			$rawvar=$countnew[0];
			$rawvar2=NULL;
			if($rawvar==$rawvar2)
			{
				$newvar=0;
			}
			else
			{	
				$newvar=1;
			}
			
			$num=$nu+4;
	}

else
{
$res['name']="";
$res['usn']="";
$res['branch']="";
$res['sem']="";
$res['email']="";
$res['fathersname']="";
$res['address']="";
$res['phone']="";
$res['fathersemail']="";
$res1['subject1']="";
$res1['subject2']="";
$res1['subject3']="";
$res1['subject4']="";
$res1['subject5']="";
$res1['subject6']="";
}


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

        #test .arc2 {
            stroke-weight:0.1;
            fill: #3660b0;
        }

        #outer {
            background:#FFFFFF;
            border-radius: 5px;
            color: #000;
        }

        #div1, #div2, #div3, #div4 {
            width: 33%;
            height: 200px;
            box-sizing: border-box;
            float: left;
        }

        #div2 .arc {
            stroke-weight: 0.1;
            fill: #f0a417;
        }

        #div2 .arc2 {
            stroke-weight: 0.1;
            fill: #b00d08;
        }

        #div3 .arc {
            stroke-weight: 0.1;
            fill: #1d871b;
        }


        .selectedRadial {
            border-radius: 3px;
            background: #f4f4f4;
            color: #000;
            box-shadow: 0 1px 5px rgba(0,0,0,0.4);
            -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.4);
            border: 1px solid rgba(200,200,200,0.85);
        }

        .radial {
            border-radius: 3px;
            background: #FFFFFF;
            color: #000;

        }


    </style>
</head>

<body onload="assign()">
	<script>
		function assign()
		{
			if(<?=$variable?>!=0)
				document.getElementById("assignment").src="given.jpg";
			var variab=<?=$newvar?>;
			if(variab)
			{
			$('#finalize').hide();
			$('#done').show();
			}
			else
			{
			$('#finalize').show();
			$('#done').hide();
			}
			
		}
	</script>
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
                    <li class="active">

                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-dashboard"></i> SUBJECTS <i class="fa fa-fw fa-caret-down"></i> </a>
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
                    
                    <li>
                       <li >
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-edit"></i> REGISTER <i class="fa fa-fw fa-caret-down"></i> </a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="register1.php">1st Internal</a>
                            </li>
                            <li>
                                <a href="register2.php">2nd Internal</a>
                            </li>
                            <li>
                                <a href="register3.php">3rd Internal</a>
                            </li>
                            
                        </ul>
                    </li>
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
                            <?php echo $sub1;?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-desktop"></i>  <a href="home.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-file"></i><?php echo $sub1;?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->
                <fieldset>
                    <legend>Attendance</legend>
                <div class="row">
                    
                         <div id="main" style="width:1000px; height:200px; margin: 0px auto; ">
                            <div style="float:left; width:500px;height:300px;"><h1>Attendance Till Date :</h1></div>
                            <div id="div1" ></div>
                           
                       </div>
                    <?php $val=$res1['att'];?>
                    <script language="JavaScript">
                       var div1=d3.select(document.getElementById('div1'));
                        start();
                        function start() 
                         {
                            var rp1 = radialProgress(document.getElementById('div1'))
                            
                            .diameter(300)
                            .value(<?=$val?>)
                            .render();
                        }
                    </script>
                          
                </div>
            </fieldset>
                <!-- /.row -->
            <fieldset>
                <legend>Scores</legend>
                <div class="row">
                    
                    <div id="main" style="width:1000px; height:400px; margin: 0px auto; ">
                            <div id="div2" ></div>
                            <div id="div3" ></div>
                            <div id="div4" ></div>
                           
                     </div>
                    <?php $val1=$res3['marks']*100/45;?>
					<?php $val2=$res4['marks']*100/45;?>
					<?php $val3=$res5['marks']*100/45;?>
                    <script language="JavaScript">
                       var div2=d3.select(document.getElementById('div2'));
                       var div3=d3.select(document.getElementById('div3'));
                       var div4=d3.select(document.getElementById('div4'));
                        start();
                        function start() 
                         {
                            var rp2 = radialProgress(document.getElementById('div2'))
                            .label("INTERNAL 1")
                            .diameter(250)
                            .value(<?=$val1?>)
                            .render();

                            var rp3 = radialProgress(document.getElementById('div3'))
                            .label("INTERNAL 2")
                            .diameter(250)
                            .value(<?=$val2?>)
                            .render();

                            var rp4 = radialProgress(document.getElementById('div4'))
                            .label("INTERNAL 3")
                            .diameter(250)
                            .value(<?=$val3?>)
                            .render();
                        }
                    </script> 
                </div>
                <!-- /.row -->
                <fieldset>
                    <legend>Assignment</legend>
                    <div class="row">
                         <div id="main" style="width:1000px; height:100px; margin: 0px auto; ">
                            <div style="float:left; width:500px;height:100px;"><h1>Assignment Submitted :</h1></div>
                            <div style="float:right; width:300px;height:100px" >
                                <img id="assignment" src="notgiven.jpg" width="100" heigh="100">
							</div>
                         </div>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Finalize</legend>
                    <div class="row">
                        <div id="main" style="width:1000px; height:100px; margin: 0px auto; ">
						<?php $sum1=$val1+$val2;
								$sum2=$val2+$val3;
								$sum3=$val1+$val3;
								if($sum1>=$sum2 && $sum1>=$sum3)
								$sum=$sum1;
								else
								if($sum2>=$sum1 && $sum2>=$sum3)
								$sum=$sum2;
								else
								$sum=$sum3;
								 $val4=$res6['submission'];
								$total=$val4+$sum*45/100;
								if(Isset($_POST["FINALISE"]))
								{   
									//$check=mysql_query("SELECT * FROM finalmarks WHERE usn=$usn");
									//$countcheck=mysql_num_rows($check);
									//if($countcheck==1)
									//{
									$check=mysql_query("UPDATE finalmarks SET sub6='$total' WHERE usn='$usn'");
									//header("location=home.php");
									//}
									
									
								}
								?>
                        <div style="width:500px;float:left"><h1>Marks Obtained : <?php echo $total ;?></h1></div>
                        <div  id="finalize"  style="width:300px;float:right"> <form method="post"  action="subj6.php">
																
                            <input type="submit" class="btn btn-lg btn-primary" value="FINALISE" name="FINALISE">
                        </form>
                      </div>
					  <div  id="done"  style="width:300px;float:right"><h3>You have successfully Finalised your marks</h3></div>
                        </div>
                    </div>
                </fieldset>

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
