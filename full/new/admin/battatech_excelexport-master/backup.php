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
	$sql2="select sem from schedule where date='$selectvalue1' and slot='$selectvalue2' order by sem";
	$result2=mysql_query($sql2);
	//$sql3="select sem from schedule where date='$selectvalue1' and slot='$selectvalue2' order by sem";
	//$result2=mysql_query($sql2);
	
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
	$sql7="select subject from schedule where date='$selectvalue1' and slot='$selectvalue2'";
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
	$sql3="select  r.usn, seatno from schedule as s, register as r where s.subject=r.subject and date='$selectvalue1' and slot='$selectvalue2' and roomno='$selectvalue' and sem='$sem1' order by seatno";
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
							
				<div class="row">
					<form method="post" action="#" name="Submit" name="Submit" style="margin:0 auto">
						<table >
						<tr ><td ><select name="roomselect">
						<option value="0">SELECT ROOM</option>
						<option value="1">ROOM NO 1</option>
						<option value="2">ROOM NO 2</option>
						<option value="3">ROOM NO 3</option>
						</select></td>
						<td ><input type="date" name="dateselect"></td>
						<td><select name="slotselect">
						<option value="0">DATE SLOT</option>
						<option value="1">9:00 AM</option>
						<option value="2">11:00 AM</option>
						<option value="3">1:00 PM</option>
						<option alue="4">3:00 PM</option>
						</select></td></tr>
						<tr ><td  colspan="3"><input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
						</table>
					</form>
					<br>
				</div>
							
														<?php 
								$i=0;
								if(isset($_POST['roomselect']) && isset($_POST['dateselect'])&& isset($_POST['slotselect']))
								{
							?>
							<table id="tblExport" style="border: 1px solid black;">
							<thead>
							<tr><td colspan="11"><h3 >ROOM LAYOUT</h3></td></tr>
							<tr>
								<td colspan="4"><h3>ROOM NO:<?php echo $selectvalue; ?></h3></td>
								<td colspan="4"><h3>DATE:<?php echo $selectvalue1; ?></h3></td>
								<td colspan="3"><h3>SLOT:<?php echo $selectvalue2; ?></h3></td>
							</tr>
							<tr><td colspan="11"></td></tr>
							<tr><td colspan="6">SEM: <?php echo $sem1; ?></td>
							<td colspan="5">SEM: <?php echo $sem2; ?></td></tr>
							<tr><td colspan="11"></td></tr>
							<tr>
							<td>Seat</td>
							<td><?php echo $sem1; ?></td>
							<td><?php echo $sem2; ?></td>
							<td></td>
							<td>Seat</td>
							<td><?php echo $sem1; ?></td>
							<td><?php echo $sem2; ?></td>
							<td></td>
							<td>Seat</td>
							<td><?php echo $sem1; ?></td>
							<td><?php echo $sem2; ?></td>
							
							</tr>
							<thead>
							<?php
							}
							?>
								
									<tbody>
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
									<?php }}?>								<?php 
							if(isset($_POST['roomselect']) && isset($_POST['dateselect'])&& isset($_POST['slotselect']))
							{
							//for($i=0;$i<7;$i++)	
							$counter=0;
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
							<?php  if((($i+1)== $res4['seatno']) && $i<7)
									{	
										echo $res4['usn']; 
									}
									else 
										echo "-";
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
							
							</tr>
							<?php
							$i++;
							if($i==7)
								break;
							}
							$i=0;
							while($res3 = mysql_fetch_array($result3, MYSQL_ASSOC))
							{ $i++;
							if($i>$counter)
							{     
								 if(( $i== $res3['seatno']))
									{	
										?><td><?php echo $i; ?></td>
									   <td> <?php  echo $res3['usn']; ?> </td>
									   <td><?php echo"-"; ?></td>
									  <td></td>
									<td><?php echo $i+7; ?></td>
									<td><?php echo"-"; ?></td>
									<td><?php echo"-"; ?></td>
									<td></td>
									<td><?php echo $i+14; ?></td>
									<td><?php echo"-"; ?></td>
									<td><?php echo"-"; ?></td>
									<?php
									}
								$counter++;
								if($counter>=7)
								break;
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
							</tr>
							<?php
							$counter++;
							
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
