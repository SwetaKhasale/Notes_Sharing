<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>

<script type="text/javascript" src ="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.js"></script>

<script type="text/javascript" src ="bower_components/jquery-ui.min.js"></script>

<script type="text/javascript" src ="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="my_css/my_s.css" rel="stylesheet" />
</head>
<body class="body_img">


<?php
   include("connection.php");
  
	   error_reporting(0);
if(isset($_POST['submitted']))
{
	$name=mysqli_real_escape_string($con,$_POST['user_name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=MD5($_POST['password']);
	$con_pass=MD5($_POST['con_pass']);
		
	$name=stripslashes($name); 
	$email=stripslashes($email); 
    $password=stripslashes($password);
	$con_pass=stripslashes($con_pass);
	
	if($password==$con_pass)
	{
		$query="INSERT INTO users3(user_name,email,password)VALUES('$name','$email','$password')";
		$result=mysqli_query($con,$query)or die("MySQL error:".mysqli_error($con). "<hr>\nQuery: $query");
		//$count=mysqli_num_rows($result);
		//while($rows=mysqli_fetch_array($result))
		//{
				if($result==TRUE)
				{
					     session_start();  
				  $_SESSION['user_id']=$result['user_id'];
				  $_SESSION['name']=$name;
				  $_SESSION['email']=$email;
				  $_SESSION['active'] = 0; //
                  $_SESSION['logged_in'] = true; // So we know the user has logged in
			      header("Location:home.php");
			     }
		     
		          else
		           {				 
		        	    print "<p class='error_l' align='center'>Error in your registration!</p>";
	       	       }	
	
		
	    	
	}		  
	else
	{
		print "<p class='error' align='center'>Password must match with Confirm Password!</p>";
	}
				
}

?>




<form action="registration.php" method="post">
<div class="container">
<div class = "row" >

<div class="logo" align="center">Share Notes</div>
<div class="pad">
<table  class="loginbox" align="center">
<thead>
<tr><caption>
<div class="login" align="center">Register</div></caption></tr>
</tr>
</thead>

<tbody>
<tr>
<th>
<div class="login_font" align="left">Name</div></th>
<td class="pad"><input type="text" name="user_name" class="textbox" placeholder="Enter Name"  autofocus=TRUE required pattern="[A-Za-z]{3,25}" />

</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Email</div></th>
<td class="pad"><input type="email" name="email" class="textbox" placeholder="Enter Email Id" required="required" />
</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Password</div></th>
<td class="pad">
<input type="password" name="password" class="textbox" placeholder="Enter password" required pattern="[A-Za-z0-9!@#$*+-/]{5,8}" />
</td>
</tr>

<tr> 
<th>
<div class="login_font" align="left">Confirm<br/>Password</div></th>
<td class="pad">
<input type="password" name="con_pass" class="textbox" placeholder="Enter password" required="required" />
</td>
</tr>
</tbody>

<tfoot>
<tr>
 <td></td>
 <td class="foot">
 <div align="center" class="pad">
<input type="submit" name="register" value="Confirm" class="btn" />
<input type="reset" name="cancel" value="Cancel" class="btn" />
<input type="hidden" name="submitted" />
</div>
</td>
</tr>
</tfoot>
</table>



</div></div></div>
</form>
</body>
</html>
