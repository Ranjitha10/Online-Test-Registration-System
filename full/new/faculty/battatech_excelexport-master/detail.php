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

if(isset($_POST['subjectselect']) && isset($_POST['internalselect']))
{
	$selectvalue=$_POST['subjectselect'];
	$selectvalue1=$_POST['internalselect'];
	if($selectvalue==1)
	{
		$sql2="SELECT name ,r.usn from register as r ,student as s where r.internal='$selectvalue1' and r.subject='$res[4]' and s.usn=r.usn ";
		$subvar=$res[4];
	}
	elseif($selectvalue==2)
	{	
		$sql2="SELECT name ,r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[5]' and s.usn=r.usn ";
		$subvar=$res[5];
	}
	elseif($selectvalue==3)
	{
		$sql2="SELECT name , r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[6]' and s.usn=r.usn";
		$subvar=$res[6];
	}
	else
	{
		$sql2="SELECT name , r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$res[7]' and s.usn=r.usn";
		$subvar=$res[7];
	}
	$res2=mysql_query($sql2);
	$count2=mysql_num_rows($res2);
$sql3="select * from schedule where subject='$subvar' and internal='$selectvalue1'";
$result3=mysql_query($sql3);
$res3=mysql_fetch_assoc($result3);

}
else
$count2=0;
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
								//if(isset($_POST['subjectselect']) && isset($_POST['internalselect']))
								if($count2>=1)
								{?>
								<div id="dv">
								<table id="tblExport" style="border: 1px solid black;" >
									<thead>
										<tr>
											<td colspan="5" style="text-align:center" ></h3>RVCE , Information Science Department <br> Academic Year: 2014-2015</h3></td>
										</tr>
										<tr>
											<td colspan="2">COURSE: <?php   $temp= $res3['subject'];$courseresult=mysql_query("select * from course_code where subname='$temp'");$courseid=mysql_fetch_array($courseresult); echo $res3['subject']."(".$courseid['subcode'].")";?></td>
											<td colspan="2">Date: <?php echo $res3['date']; ?></td>
											<td>SLOT: <?php if($res3['slot']==1) echo "9:00 AM to 11:00 AM";
												elseif($res3['slot']==2) echo "11:30 AM to 1:30 PM";
												elseif($res3['slot']==3) echo "2:00 PM to 4:00PM";
												else echo "4:30PM to 6:30PM"; ?></td>
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
									</thead>
							
							<?php }?>
								
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
									<?php }}?>									
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
