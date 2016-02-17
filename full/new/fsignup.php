<!DOCTYPE html>
<html lang="en">
<style>
.hello{
opacity:0.4;
z-index:-1;
	}
</style>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>RV COLLEGE </title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css1/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css1/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<img id="hello" src="back.png" style="width:100%;height:100%">
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <a href="http://localhost/full/index.html" <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
          <h1 class="text-center">REGISTER</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" name="myForm" action="facultyregister.php" method="post" name="login">
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="fid" name="fid" value="" onblur="myFunction()" placeholder="Faculty ID">
              <p id="error" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="name" name="name" value="" onblur="myFunction1()" placeholder="NAME">
              <p id="error1" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" id="password" name="password" value="" onblur="myFunction2()" placeholder="Password">
              <p id="error2" style="color:red"></p>
            </div>
			<div class="form-group">
              <input type="password" class="form-control input-lg" id="cpassword" name="cpassword" value="" onblur="myFunction3()" placeholder="Confirm Password">
              <p id="error3" style="color:red"></p>
            </div>
			<div class="form-group">
              <input type="text" class="form-control input-lg" id="acdyear" name="acdyear" value="" placeholder="Academic Year(eg: 2014-2015)">
              <p id="error3" style="color:red"></p>
            </div>

           <div class="form-group">
              <select class="form-control input-lg" name="branch" id="branch"  onblur="myFunction4()" class="required"> <option value="">SELECT BRANCH</option>
                <option value="CSE">COMPUTER SCIENCE ENGINEERING</option>
                <option value="ISE">INFORMATION SCIENCE ENGINEERING</option>
                <option value="EEE">ELECTRICAL ENGINEERING</option>
                <option value="ECE">ELECTRONICS AND COMMUNICATION ENGINEERING</option>
                <option value="ME">MECHANICAL ENGINEERING</option>
                <option value="BT">BIOTECH ENGINEERING</option>
                <option value="CVL">CIVIL ENGINEERING</option>
                <option value="CHE">CHEMICAL ENGINEERING</option>
              </select>
              <p id="error4" style="color:red"></p>
            </div>
            
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="email" name="email" value="" onblur="myFunction7()" placeholder="EMAIL">
              <p id="error7" style="color:red"></p>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" id="phone" name="phone" value="" onblur="myFunction8()" placeholder="PHONE NO">
              <p id="error8" style="color:red"></p>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" id="submitbtn" type="submit" value="login">Sign Up</button>
              <p id="error" style="color:red"></p>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script>
        var y,z;
        function myFunction() 
		{
			var fid = document.getElementById("fid").value;
			var reg = /fid_\d{3}$/;
			var res = reg.test(fid);
			console.log(res);
			if( fid.length==7)
			{	
				y="";
			}
			else
			{ 
				//y= " *INVALID ID ";
				document.getElementById("fid").innerHTML = "";
			}
				
               // document.getElementById("error").innerHTML = y;
				
			
		}
		function myFunction1()
		{
			var z=0;
			var x = document.forms["myForm"]["name"].value;
			if (x==null || x=="") 
			{
				z=1;             
			}
			if(z==1)
			{
                y= "* cannot be left blank ";
                document.getElementById("error1").innerHTML = y;
			}
			else
                document.getElementById("error1").innerHTML = "";//NULL;
			
		}
		function myFunction2()
		{
			var z=0;
			var x = document.forms["myForm"]["password"].value;
			if (x==null || x=="") 
			{
				z=1;             
			}
			if(z==1)
			{
                y= "* cannot be left blank ";
                document.getElementById("error2").innerHTML = y;
			}
			else
                document.getElementById("error2").innerHTML = "";//NULL;
			
		}
		function myFunction3()
		{
			var z=0;
			var x = document.forms["myForm"]["cpassword"].value;
			var w = document.forms["myForm"]["password"].value;
			
			if ( x==w)
			{
				y = "";//NULL;
                
			}
			else
                {
				y= " *should be same as password ";}
                document.getElementById("error3").innerHTML = y;
				
		}
		function myFunction4()
		{
			var x = document.forms["myForm"]["branch"].value;
			if ( x==null)
			{
				y="*cannot be left blank";
                
			}
			else
                y= " ";
            document.getElementById("error4").innerHTML = y;
		}
		
		function myFunction7()
		{
			var x = document.forms["myForm"]["email"].value;
			var atpos = x.indexOf("@");
			var dotpos = x.lastIndexOf(".");
			if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
			{
				y=" * enter valid email address";
				
			}
			else
			y="";
			document.getElementById("error7").innerHTML = y;
		}
		function myFunction8()
		{
			var z=0;
			var x = document.forms["myForm"]["phone"].value;
			if (isNaN(x))
			{
				y= "* enter valid phone number ";
			}
			else
				y="";
            document.getElementById("error8").innerHTML = y;
			
		}
		
</script>

	</body>
</html>