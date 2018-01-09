<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Share Notes Index</title>

<script type="text/javascript" src ="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.js"></script>

<script type="text/javascript" src ="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="my_css/my_s.css" rel="stylesheet" />
</head>

<body class="body_img">

<?php
include("connection.php");

if(isset($_POST['submitted']))
{
	 require('login.php');
}
?>
<form action="index.php" method="post" >

<div class="container">
<div class = "row" >

<div class="logo" align="center">Share Notes</div>
<table  class="loginbox" align="center">

<thead>
<tr> 
<caption><div class="login" align="center">Login</div></caption></tr>
</tr>
</thead>

<tbody>
<tr>
<th>
<div class="login_font" align="left">Email<div></th>
<td class="pad"><input type="email" name="email" class="textbox" placeholder="Enter Email Id" required="required" autofocus=TRUE />
</td>
</tr>
<tr>
<th>
<div class="login_font" align="left">Password<div></th>
<td class="pad"><input type="password" name="password" class="textbox" placeholder="Enter password" required pattern="[A-Za-z0-9!@#$*+-/]{5,8}" />
</td>
</tr>
</tbody>

<tfoot>
<tr>
<td></td>
 <td class="foot"><div align="center" class="pad">

<input type="submit" name="login" value="Login" class="btn" />

<input type="reset" name="cancel" value="Cancel"  class="btn" />
<input type="hidden" name="submitted" />
</div></td>
</tr>
</tfoot>
</table>

<div align="center" class="reg"><a href="registration.php">New to Share Notes? Register here!</a></div>

</div>
</div>
</form>
</body>
</html>