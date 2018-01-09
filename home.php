<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.js"></script>


<script type="text/javascript" src ="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="my_css/my_s.css" rel="stylesheet" />
</head>
<body class="home_bg">
<div class="container">
<div class = "row" >
<div align="center" ><a href="home.php" class="logo_h">Share Notes</a></div>
<?php
include("connection.php");
include("left_menu.php");
//include("right_menu.php");
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
	print "<p class='ses_name'align='center'>You must login first!</p>";
	header("Location:index.php");
}
else
{           
                $user_id = $_SESSION['user_id'];
                $name = $_SESSION['name'];	              
				$email = $_SESSION['email'];
                $active = $_SESSION['active'];
				$query="UPDATE users3 SET active='1' WHERE email='$email'";
                $_SESSION['active'] = 1;
				print "<p class='ses_name' align='center'>Welcome ".$name." to Shares Notes!</p>";
}
//print "<p class='ses_name'align='center'>Welcome ".$_SESSION['name']." to Shares Notes!</p>";
?>
</div></div>
</body>
</html>
