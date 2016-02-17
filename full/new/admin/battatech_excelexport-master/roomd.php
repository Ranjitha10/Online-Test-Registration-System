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
	$sql2="select distinct sem from schedule as s , register as r  where s.subject=r.subject and r.roomno='$selectvalue' and date='$selectvalue1' and slot='$selectvalue2' order by sem";
	$result2=mysql_query($sql2);
	//$sql3="select sem from schedule where date='$selectvalue1' and slot='$selectvalue2' order by sem";
	//$result2=mysql_query($sql2);
	

	//$sem=array(0,0); 
	$b=0;
	while($semester= mysql_fetch_array($result2, MYSQL_ASSOC))	
	{//echo "<h3>".$semester['sem']."</h3>";
		if($b==0)
			$sem1=$semester['sem'];
		else
			$sem2=$semester['sem'];
		$b++;
	}
	
	if($b>0)
	{
	$sql7="select distinct s.subject from schedule as s , register as r where r.subject=s.subject and r.roomno='$selectvalue' and date='$selectvalue1' and slot='$selectvalue2' and sem='$sem1'";
	$result7=mysql_query($sql7);
	$resultrow1=mysql_query($sql7);
	$resultrow2=mysql_query($sql7);
	$resultrow3=mysql_query($sql7);
	$resultrow4=mysql_query($sql7);
	}
	if($b>1)
	{
	$sqlfind="select distinct s.subject from schedule as s, register as r  where r.subject=s.subject and r.roomno='$selectvalue' and date='$selectvalue1' and slot='$selectvalue2' and sem='$sem2'";
	$resultfind=mysql_query($sqlfind);
	$resultfind1=mysql_query($sqlfind);
	$resultfind2=mysql_query($sqlfind);
	$resultfind3=mysql_query($sqlfind);
	$resultfind4=mysql_query($sqlfind);
	}
//	$b=0; 
	
//	while($currentsubject= mysql_fetch_array($result7, MYSQL_ASSOC))	
//	{
//		if($b==0)
	//		$sub1=$currentsubject['subject'];
		//else
		//	$sub2=$currentsubject['subject'];
		//$b++;
	//}
	if($b>0)
	{
	$sql3="select  r.usn, seatno from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' order by seatno";
	$result3=mysql_query($sql3);
	$count3=mysql_num_rows($result3);
	}
	if($b>1)
	{
	$sql4="select  r.usn ,seatno from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' order by seatno ";
	$result4=mysql_query($sql4);
	
	//$res3=mysql_fetch_array($result3);
	$count4=mysql_num_rows($result4);
	//$res4= mysql_fetch_array($result4, MYSQL_ASSOC);
	//$res4=mysql_fetch_array($res5);
	//$c1=mysql_num_rows($res5);
	}

	
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="Scripts/jquery.battatech.excelexport.js"></script>
<style>
		table{width:60%; 
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
		button
{
	display: block;
	font-size: 1.1em;
	font-weight: bold;
	text-transform: uppercase;
	padding: 10px 15px;
	margin: 20px auto;
	color: #ccc;
	background-color: #555;
	background: -webkit-linear-gradient(#888, #555);
	background: linear-gradient(#888, #555);
	border: 0 none;
	border-radius: 3px;
	text-shadow: 0 -1px 0 #000;
	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
	cursor: pointer;
	-webkit-transition: all 150ms ease;
	transition: all 150ms ease;
}

button:hover, button:focus
{
	-webkit-animation: pulsate 1.2s linear infinite;
	animation: pulsate 1.2s linear infinite;
}
	
@-webkit-keyframes pulsate
{
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
}
		
@keyframes pulsate
{
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
}

button:active
{
	color: #fff;
	text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff;
	box-shadow: 0 1px 0 #666, 0 2px 0 #444, 0 2px 2px rgba(0,0,0,0.9);
	-webkit-transform: translateY(3px);
	transform: translateY(3px);
	-webkit-animation: none;
	animation: none;
}
	
    </style>
	</head>
<body>
							
				
							
								<?php 
								$i=0;
								if(isset($_POST['roomselect']) && isset($_POST['dateselect'])&& isset($_POST['slotselect']))
								{ $roomsql="select * from room where roomno='$selectvalue'";
								  $roomresult=mysql_query($roomsql);
								  $roomres=mysql_fetch_array($roomresult);
								  $roomie=$roomres['roomrow'];
								  if($roomie==3)
								{ 
							?>
							<table id="tblExport" style="border: 1px solid black;">
							<thead>
							<tr><td colspan="12"><h3>RVCE, Department of Information Science<br> Academic Year : 2014-2015</h3></td></tr>					
							<tr>
								<td colspan="4"><h3>ROOM NO:<?php echo $selectvalue; ?></h3></td>
								<td colspan="4"><h3>DATE:<?php echo $selectvalue1; ?></h3></td>
								<td colspan="6"><h3>SLOT:<?php if($selectvalue2==1)echo"9:00AM to 11:00AM";
									elseif($selectvalue2==2)echo"11:30AM to 1:30PM";
									elseif($selectvalue2==3)echo"2:00PM to 4:00PM";
									elseif($selectvalue2==4)echo"4:30PM to 6:30PM";?></h3></td>
							</tr>
							<tr><td colspan="12"></td></tr>
							<tr><td colspan="3">SEM<br> <?php if($b==0) echo "-"; else  echo $sem1; ?></td>
							<td colspan="3"> COURSE<br>
							<?php  if($b==0) echo "-"; else
							{$p=0;
								while($res7=mysql_fetch_array($result7,MYSQL_ASSOC)) 
								{ 	
								 if($p!=0)
											{echo "/"; echo"<br>";}
											$p++;
											$temp= $res7['subject'];
								$courseresult=mysql_query("select * from course_code where subname='$temp'");
								$courseid=mysql_fetch_array($courseresult);
								echo $res7['subject']."(".$courseid['subcode'].")";
								
							}
							}
							?>
							</td>
							<td colspan="3">SEM<br><?php if($b==2) echo $sem2; else echo "-"; ?></td>
							<td colspan="3"> COURSE<br>
							<?php  if($b==2)
							{	$p=0;
								while($resfind=mysql_fetch_array($resultfind,MYSQL_ASSOC)) 
								{   if($p!=0)
											{echo "/"; echo"<br>";}
											$p++;
									$temp= $resfind['subject'];
								$courseresult=mysql_query("select * from course_code where subname='$temp'");
								$courseid=mysql_fetch_array($courseresult);
									echo $resfind['subject']."(".$courseid['subcode'].")";
									
								}
							}
							else 
							echo "-";
							?>
							</tr>
							<tr><td colspan="12"></td></tr>
							<tr>
							<td>Seat</td>
							<td>
								<?php  if($b==0) echo"-";
								else
								{	$p=0;
									while($resrow1=mysql_fetch_array($resultrow1,MYSQL_ASSOC)) 
									   { 
											if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow1['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
										}
								}		
								?>
							</td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind1=mysql_fetch_array($resultfind1,MYSQL_ASSOC)) 
							{				if($p!=0)
											echo "/";
											$p++;
											$temp= $resfind1['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
							}
							}
							?></td>
							<td></td>
							
							
							
							
							<td>Seat</td>
							<td><?php  	if($b==0) echo"-";
							else
								{$p=0;
									while($resrow2=mysql_fetch_array($resultrow2,MYSQL_ASSOC)) 
									   { 
										if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow2['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											
											
									}	}
									
								?></td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind2=mysql_fetch_array($resultfind2,MYSQL_ASSOC)) 
							{ 
								if($p!=0)
											echo "/";
											$p++;
								$temp= $resfind2['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
								
							}
							}
							?></td>
							<td></td>
							<td>Seat</td>
							<td><?php  if($b==0) echo"-"; else 
							$p=0;
							while($resrow3=mysql_fetch_array($resultrow3,MYSQL_ASSOC)) 
									   { 	if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow3['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											
										}
										
								?></td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind3=mysql_fetch_array($resultfind3,MYSQL_ASSOC)) 
							{ 				if($p!=0)
											echo "/";
											$temp= $resfind3['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											$p++;
								
							}
							}
							?></td>
							<td></td>
							
							</tr>
							<thead>
							<?php
							}
							
							if($roomie==4)
							{ 
							?>
							<table id="tblExport" style="border: 1px solid black;">
							<thead>
							<tr><td colspan="16"><h3>RVCE, Department of Information Science<br> Academic Year : 2014-2015</h3></td></tr>					
							<tr>
								<td colspan="5"><h3>ROOM NO:<?php echo $selectvalue; ?></h3></td>
								<td colspan="5"><h3>DATE:<?php echo $selectvalue1; ?></h3></td>
								<td colspan="6"><h3>SLOT:<?php if($selectvalue2==1)echo"9:00AM to 11:00AM";
									elseif($selectvalue2==2)echo"11:30AM to 1:30PM";
									elseif($selectvalue2==3)echo"2:00PM to 4:00PM";
									elseif($selectvalue2==4)echo"4:30PM to 6:30PM";?></h3></td>
							</tr>
							<tr><td colspan="16"></td></tr>
							<tr><td colspan="4">SEM<br> <?php if($b==0) echo "-"; else  echo $sem1; ?></td>
							<td colspan="4"> COURSE<br>
							<?php  if($b==0) echo "-"; else
							{$p=0;
								while($res7=mysql_fetch_array($result7,MYSQL_ASSOC)) 
								{ 	
								 if($p!=0)
											{echo "/"; echo"<br>";}
											$p++;
											$temp= $res7['subject'];
								$courseresult=mysql_query("select * from course_code where subname='$temp'");
								$courseid=mysql_fetch_array($courseresult);
								echo $res7['subject']."(".$courseid['subcode'].")";
								
							}
							}
							?>
							</td>
							<td colspan="4">SEM<br><?php if($b==2) echo $sem2; else echo "-"; ?></td>
							<td colspan="4"> COURSE<br>
							<?php  if($b==2)
							{	$p=0;
								while($resfind=mysql_fetch_array($resultfind,MYSQL_ASSOC)) 
								{   if($p!=0)
											{echo "/"; echo"<br>";}
											$p++;
									$temp= $resfind['subject'];
								$courseresult=mysql_query("select * from course_code where subname='$temp'");
								$courseid=mysql_fetch_array($courseresult);
									echo $resfind['subject']."(".$courseid['subcode'].")";
									
								}
							}
							else 
							echo "-";
							?>
							</tr>
							<tr><td colspan="16"></td></tr>
							<tr>
							<td>Seat</td>
							<td>
								<?php  if($b==0) echo"-";
								else
								{	$p=0;
									while($resrow1=mysql_fetch_array($resultrow1,MYSQL_ASSOC)) 
									   { 
											if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow1['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
										}
								}		
								?>
							</td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind1=mysql_fetch_array($resultfind1,MYSQL_ASSOC)) 
							{				if($p!=0)
											echo "/";
											$p++;
											$temp= $resfind1['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
							}
							}
							?></td>
							<td></td>
							
							
							
							
							<td>Seat</td>
							<td><?php  	if($b==0) echo"-";
							else
								{$p=0;
									while($resrow2=mysql_fetch_array($resultrow2,MYSQL_ASSOC)) 
									   { 
										if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow2['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											
											
									}	}
									
								?></td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind2=mysql_fetch_array($resultfind2,MYSQL_ASSOC)) 
							{ 
								if($p!=0)
											echo "/";
											$p++;
								$temp= $resfind2['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
								
							}
							}
							?></td>
							<td></td>
							<td>Seat</td>
							<td><?php  if($b==0) echo"-"; else 
							$p=0;
							while($resrow3=mysql_fetch_array($resultrow3,MYSQL_ASSOC)) 
									   { 	if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow3['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											
										}
										
								?></td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind3=mysql_fetch_array($resultfind3,MYSQL_ASSOC)) 
							{ 				if($p!=0)
											echo "/";
											$temp= $resfind3['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											$p++;
								
							}
							}
							?></td>
							<td></td>
							
							
							<td>Seat</td>
							<td><?php  if($b==0) echo"-"; else 
							$p=0;
							while($resrow4=mysql_fetch_array($resultrow4,MYSQL_ASSOC)) 
									   { 	if($p!=0)
											echo "/";
											$p++;
											$temp= $resrow4['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											
										}
										
								?></td>
							<td><?php if($b<=1) echo "-"; 
							else
							{	$p=0;
								while($resfind4=mysql_fetch_array($resultfind4,MYSQL_ASSOC)) 
							{ 				if($p!=0)
											echo "/";
											$temp= $resfind4['subject'];
											$courseresult=mysql_query("select * from course_code where subname='$temp'");
											$courseid=mysql_fetch_array($courseresult);
											echo $courseid['subcode'];
											$p++;
								
							}
							}
							?></td>
							<td></td>
							
							</tr>
							<thead>
							<?php
							}
							
							}
							?>
								
									<tbody>
								<?php 
							if(isset($_POST['roomselect']) && isset($_POST['dateselect'])&& isset($_POST['slotselect']))
							{
							$roomsql="select * from room where roomno='$selectvalue'";
								  $roomresult=mysql_query($roomsql);
								  $roomres=mysql_fetch_array($roomresult);
								  $roomie=$roomres['roomrow'];
							if($roomie==3)
							{
							//for($i=0;$i<7;$i++)	
							$counter=0;
							if($b>1)
							while($res4 = mysql_fetch_array($result4, MYSQL_ASSOC))							
							{
							$counter++;

							?>
							<tr>
							<td><?php echo $i+1;?></td>
							<td >
							<?php
							
							 	if($i<7)
								{ $x=$i+1;
								$sql10 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$x'";
								$result10=mysql_query($sql10);
								$count10=mysql_num_rows($result10);
								if($count10>=1)
								{
									$res10 = mysql_fetch_assoc($result10);								
										echo $res10['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							<td>
							 <?php $f=$i+1;
								
								$sql91 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$f'";
								$result91=mysql_query($sql91);
								$count91=mysql_num_rows($result91);
								if($count91>=1)
								{
									$res91 = mysql_fetch_assoc($result91);								
										echo $res91['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							
							
							<td></td>
							<td><?php echo $i+8;?></td>
							<td>
							<?php
							$j=$i+8;
								if($i<7)
								{
								$sql8 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$j'";
								$result8=mysql_query($sql8);
								$count8=mysql_num_rows($result8);
								if($count8>=1)
								{
									$res8 = mysql_fetch_assoc($result8);								
										echo $res8['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							<td>
							<?php 
								$j=$i+8;
								if($i<7)
								{
								$sql5 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$j'";
								$result5=mysql_query($sql5);
								$count5=mysql_num_rows($result5);
								if($count5>=1)
								{
									$res5 = mysql_fetch_assoc($result5);								
										echo $res5['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							
							<td></td>
							<td><?php echo $i+15;?></td>
							<td><?php $k=$i+15;
								
								$sql9 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$k'";
								$result9=mysql_query($sql9);
								$count9=mysql_num_rows($result9);
								if($count9>=1)
								{
									$res9 = mysql_fetch_assoc($result9);								
										echo $res9['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							<td><?php $k=$i+15;
								
								$sql6 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$k'";
								$result6=mysql_query($sql6);
								$count6=mysql_num_rows($result6);
								if($count6>=1)
								{
									$res6 = mysql_fetch_assoc($result6);								
										echo $res6['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							<td></td>
							</tr>
							<?php
							$i++;
							if($i==7)
								break;
							}
							$i=0;
							
							if($b!=0)
							while($res3 = mysql_fetch_array($result3, MYSQL_ASSOC))
							{ $i++;
							if($i>$counter)
							{     if($counter>=7)
								break;
								 if(( $i== $res3['seatno']))
									{	
									?><tr><td><?php echo $i; ?></td>
									<td> <?php  echo $res3['usn']; ?> </td>
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+7; ?></td>
									<td>
										<?php  $j=$i+7;
										if($j<=$count3)
										{
										$alone="select r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$j'" ;
										$resultalone=mysql_query($alone);
										$countalone=mysql_num_rows($resultalone);
										$resalone = mysql_fetch_assoc($resultalone);								
										echo $resalone['usn'];
										}
										else 
											echo "-";
										
										?>
									</td> 
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+14; ?></td>
									<td>
										<?php  $k=$i+14;
										if($k<=$count3)
										{
										$alone1="select r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$k'" ;
										$resultalone1=mysql_query($alone1);
										$countalone1=mysql_num_rows($resultalone1);
										
											$resalone1 = mysql_fetch_assoc($resultalone1);								
											echo $resalone1['usn'];
										}
										else 
											echo "-";
										?>
									</td> 
									<td><?php echo"-"; ?></td>
									<td></td>
									</tr>
									<?php
									}
								$counter++;
								
							}
							}
							while($counter<7)
							{
							?>
							<tr>
								<td><?php echo $counter+1; ?></td>
								<td><?php echo "-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
								<td><?php echo $counter+8; ?></td>
								<td><?php echo"-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
								<td><?php echo $counter+15; ?></td>
								<td><?php echo"-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
							</tr>
							<?php
							$counter++;
							
							}
							}
							
							
							
							if($roomie==4)
							{
							//for($i=0;$i<7;$i++)	
							$counter=0;
							if($b>1)
							while($res4 = mysql_fetch_array($result4, MYSQL_ASSOC))							
							{
							$counter++;

							?>
							<tr>
							<td><?php echo $i+1;?></td>
							<td >
							<?php
							
							 	if($i<7)
								{ $x=$i+1;
								$sql10 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$x'";
								$result10=mysql_query($sql10);
								$count10=mysql_num_rows($result10);
								if($count10>=1)
								{
									$res10 = mysql_fetch_assoc($result10);								
										echo $res10['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							<td>
							<?php $f=$i+1;
								
								$sql91 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$f'";
								$result91=mysql_query($sql91);
								$count91=mysql_num_rows($result91);
								if($count91>=1)
								{
									$res91 = mysql_fetch_assoc($result91);								
										echo $res91['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							
							
							<td></td>
							<td><?php echo $i+8;?></td>
							<td>
							<?php
							$j=$i+8;
								if($i<7)
								{
								$sql8 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$j'";
								$result8=mysql_query($sql8);
								$count8=mysql_num_rows($result8);
								if($count8>=1)
								{
									$res8 = mysql_fetch_assoc($result8);								
										echo $res8['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							<td>
							<?php 
								$j=$i+8;
								if($i<7)
								{
								$sql5 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$j'";
								$result5=mysql_query($sql5);
								$count5=mysql_num_rows($result5);
								if($count5>=1)
								{
									$res5 = mysql_fetch_assoc($result5);								
										echo $res5['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							
							<td></td>
							<td><?php echo $i+15;?></td>
							<td><?php $k=$i+15;
								
								$sql9 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$k'";
								$result9=mysql_query($sql9);
								$count9=mysql_num_rows($result9);
								if($count9>=1)
								{
									$res9 = mysql_fetch_assoc($result9);								
										echo $res9['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							<td><?php $k=$i+15;
								
								$sql6 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$k'";
								$result6=mysql_query($sql6);
								$count6=mysql_num_rows($result6);
								if($count6>=1)
								{
									$res6 = mysql_fetch_assoc($result6);								
										echo $res6['usn']; 
								}	
								 else 
									{
										
										echo "-";
									} 
							?></td>
							<td></td>
							<td><?php echo $i+22;?></td>
							<td>
							<?php
							$z=$i+22;
								if($i<7)
								{
								$sql001 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$z'";
								$result001=mysql_query($sql001);
								$count001=mysql_num_rows($result001);
								if($count001>=1)
								{
									$res001 = mysql_fetch_assoc($result001);								
										echo $res001['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							<td>
							<?php 
								$z=$i+22;
								if($i<7)
								{
								$sql002 ="select  r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem2' and seatno='$z'";
								$result002=mysql_query($sql002);
								$count002=mysql_num_rows($result002);
								if($count002>=1)
								{
									$res002 = mysql_fetch_assoc($result002);								
										echo $res002['usn']; 
								}	
								 else 
									{
										
										echo "-";
									}
								}
							?>
							</td>
							
							<td></td>
							</tr>
							<?php
							$i++;
							if($i==7)
								break;
							}
							$i=0;
							
							if($b!=0)
							while($res3 = mysql_fetch_array($result3, MYSQL_ASSOC))
							{ $i++;
							if($i>$counter)
							{     if($counter>=7)
								break;
								 if(( $i== $res3['seatno']))
									{	
									?><tr><td><?php echo $i; ?></td>
									<td> <?php  echo $res3['usn']; ?> </td>
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+7; ?></td>
									<td>
										<?php  $j=$i+7;
										if($j<=$count3)
										{
										$alone="select r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$j'" ;
										$resultalone=mysql_query($alone);
										$countalone=mysql_num_rows($resultalone);
										$resalone = mysql_fetch_assoc($resultalone);								
										echo $resalone['usn'];
										}
										else 
											echo "-";
										
										?>
									</td> 
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+14; ?></td>
									<td>
										<?php  $k=$i+14;
										if($k<=$count3)
										{
										$alone1="select r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$k'" ;
										$resultalone1=mysql_query($alone1);
										$countalone1=mysql_num_rows($resultalone1);
										
											$resalone1 = mysql_fetch_assoc($resultalone1);								
											echo $resalone1['usn'];
										}
										else 
											echo "-";
										?>
									</td> 
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+21; ?></td>
									<td>
										<?php  $z=$i+21;
										if($z<=$count3)
										{
										$alone1="select r.usn from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' and seatno='$z'" ;
										$resultalone1=mysql_query($alone1);
										$countalone1=mysql_num_rows($resultalone1);
										
											$resalone1 = mysql_fetch_assoc($resultalone1);								
											echo $resalone1['usn'];
										}
										else 
											echo "-";
										?>
									</td> 
									<td><?php echo"-"; ?></td>
									<td></td>
									</tr>
									<?php
									}
								$counter++;
								
							}
							}
							while($counter<7)
							{
							?>
							<tr>
								<td><?php echo $counter+1; ?></td>
								<td><?php echo "-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
								<td><?php echo $counter+8; ?></td>
								<td><?php echo"-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
								<td><?php echo $counter+15; ?></td>
								<td><?php echo"-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td><td><?php echo $counter+22; ?></td>
								<td><?php echo"-"; ?></td>
								<td><?php echo"-"; ?></td>
								<td></td>
							</tr>
							<?php
							$counter++;
							
							}
							}
							}
							?>							
									</tbody>
								</table>
								</div>
						<div>
							<button id="btnExport">Export</button>
						</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport").btechco_excelexport({
                containerid: "tblExport"
               , datatype: $datatype.Table
            });
        });
    });
</script>
