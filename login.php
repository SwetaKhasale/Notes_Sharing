
<?php

    $email=mysqli_real_escape_string($con,$_POST['email']);
	$password=MD5($_POST['password']);
	
	$email=stripslashes($email); 
    $password=stripslashes($password);
	
	$query="SELECT * FROM users3 WHERE email='$email' and password='$password'";
	$result=mysqli_query($con,$query);
	$rows=mysqli_fetch_array($result);
	   if($rows>1)
		     {    
                  session_start();	
                  //$_SESSION['note_id']=$rows['note_id'];				  
				  $_SESSION['user_id']=$rows['user_id'];
				  $_SESSION['name']=$rows['user_name'];
				  //$name=$_SESSION['name'];
				  $_SESSION['email']=$rows['email'];
                  $_SESSION['active'] = $rows['active'];
				  $_SESSION['share_id']=$rows['share_id'];
                  $_SESSION['logged_in'] = true;				  
			      header("Location:home.php");
		     }
		    else
		     {
		        	print "<p class='error_l' align='center'>Invalid Email or Password!</p>";
	       	 }
	  

