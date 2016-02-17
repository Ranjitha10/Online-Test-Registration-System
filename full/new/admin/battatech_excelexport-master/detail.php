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
$sql1="SELECT * FROM faculty WHERE fid='$fid'";
$result1=mysql_query($sql1);
$res1=mysql_fetch_assoc($result1);
$sub1=$res1['sub1'];
$fname=$res1['name'];
$sub2=$res1['sub2'];
$count2=0;
if(isset($_POST['subjectselect']) && isset($_POST['internalselect']))
{
	$selectvalue=$_POST['subjectselect'];
	$selectvalue1=$_POST['internalselect'];
	if($selectvalue==1)
		$sql2="SELECT name ,r.usn from register as r ,student as s where r.internal='$selectvalue1' and r.subject='$sub1' and s.usn=r.usn ";
	else
		$sql2="SELECT name , r.usn  from register as r,student as s where r.internal='$selectvalue1' and r.subject='$sub2' and s.usn=r.usn";
	$res2=mysql_query($sql2);
	$count2=mysql_num_rows($res2);
	
	
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
					<form method="post" action="#" name="Submit" style="margin:0 auto">
						<table >
						<tr ><td id="c"><select name="subjectselect">
						<option >SELECT SUBJECT</option>
						<option value="1"><?php echo$sub1;?></option>
						<option value="2"><?php echo$sub2;?></option>
						</select></td>
						<td ><select name="internalselect">
						<option >SELECT INTERNAL</option>
						<option value="1">Internal 1</option>
						<option value="2">Internal 2</option>
						<option value="3">Internal 3</option>					
						</select></td></tr>
						<tr ><td  colspan="2"><input type="submit" class="btn btn-lg btn-primary" value="Submit" name="Submit"></td></tr>
						</table>
					</form>
				</div>
							
							<?php 
								$i=0;
								//if(isset($_POST['subjectselect']) && isset($_POST['internalselect']))
								if($count2>=1)
								{?>
								<div id="dv">
								<table id="tblExport" style="border: 1px solid black;" >
									<thead>
										<tr>
										<th>S.NO</th>
										<th>NAME</th>
										<th>USN</th>
										<th>BOOKLET NO</th>
										<th>SIGNATURE</th>
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
