<?php
include("connection.php");
include("left_menu.php");
//include("right_menu.php");

session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Notes</title>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src ="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src ="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="my_css/my_s.css" rel="stylesheet" />
</head>
<body class="home_bg">


<form action="view_notes.php" method="post">

<div class="container">
<div class = "row" >
<div align="center"><a href="home.php" class="logo_h">Share Notes</a></div>	
<div class="pad_left">

<?php 
include("menu.php");
error_reporting(0);
$query="SELECT * FROM notes3 WHERE user_id=$user_id";
$result=mysqli_query($con,$query); 
$count=mysqli_fetch_row($result);

if($count==0)
{
	print "<p class='error'>You have no notes, Add new Notes!</p>";
}
else
{
	print "
<table class='view_table'>
<tr><caption>
<div class='login' align='center'>Your Notes</div></caption></tr>
</tr>
<tr>
<th class='tdv'>
<div class='login_font' align='center'>Title</div></th>
</td>

<th class='tdv' align='center'>
<div class='login_font' align='center'>Description</div></th>
<th class='tdv'>
<div class='login_font' align='center'>Tags</div></th>

<th class='tdv'>
<div class='login_font' align='center'>Delete</div></th>
<th class='tdv'>
<div class='login_font' align='center'>Edit</div></th>
<th class='tdv'>
<div class='login_font' align='center'>Share</div></th>
</tr>";
}
$query="SELECT * FROM notes3 WHERE user_id=$user_id";
$result=mysqli_query($con,$query);

while($rows=mysqli_fetch_array($result))	
    {
		$_SESSION['note_id']=$rows['note_id'];
?>
<tr class='trv'>
<td class='tdv' width=100><div class='login_font' align='left'>
<?php echo $rows['title']; ?>
</div></td>
<td class='tdv' width=200><div class='login_font' align='left'>
<?php echo $rows['description']; ?>
</div></td>
<td class='tdv' width=100><div class='login_font' align='left'>
<?php echo $rows['tags']; ?></div></td>


<td class='tdv' align='center' width=60>
<div class='login_font' align='center'>
<a href="delete_notes.php?<?php echo "note_id=$rows[note_id]";?>" onclick="return confirm('Are you sure you want to Remove?');">
 <img src='images/delete.png' ></a></div></td>

<td class='tdv' align='center' width=50>
<div class='login_font' align='center'>
<a href='edit_notes.php?<?php echo "note_id=$rows[note_id]";?>'>
<img src='images/edit.png'  ></a></div></td>

<td class='tdv' align='center' width=50>
<div class='login_font' align='center'>
<a href='share_notes.php?<?php echo "note_id=$rows[note_id]";?>'>
<img src='images/share.png' ></a></div></td>
</tr>

<?php

}
?>
</table>
</div></div></div>
</form>



</body>
</html>
