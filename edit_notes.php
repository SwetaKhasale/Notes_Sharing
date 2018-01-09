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
<div class="container">
<div class = "row" >
<div class="logo_h" align="center">Share Notes</div>
<?php 
include("connection.php");
include("left_menu.php");
//include("right_menu.php");
include("menu.php");
session_start();
error_reporting(0);
$user_id = $_SESSION['note_id'];

$n_id=$_REQUEST['note_id'];
$rn_id=$_SESSION['note_idd'];
if(empty($n_id)){$n_id=0;}
if(empty($rn_id)){$rn_id=0;}

if(isset($_POST['submitted']))
  {
	  
	 $title= mysqli_real_escape_string($con,$_POST['title']);
	 $description= mysqli_real_escape_string($con,$_POST['description']);
	 $tags=mysqli_real_escape_string($con,$_POST['tags']);
	 $temp=mysqli_real_escape_string($con,$_POST['temp']);
	 $temp1=mysqli_real_escape_string($con,$_POST['temp1']);
	 $update="UPDATE notes3 SET title='$title',description='$description',tags='$tags' WHERE note_id='$temp'";
		//var_dump($update);
        	 if(mysqli_query($con,$update))
         		{ 	            					 
                   	   $_SESSION['title']=$_POST['title'];	
                       $_SESSION['description']=$_POST['description'];
                       $_SESSION['tags']=$_POST['tags'];	
                        echo "done";
                         if($temp1==0)
						 {
							  header("Location:view_notes.php");
						 }
						 else
						 {
                         						 
	                          header("Location:rec_notes.php");
						 }
				 }
			 else 
			 {
					   echo "Error in inserting data".mysqli_error($con);
			 }
			 
  }

	
?>
 
<form action="edit_notes.php" method="post">
<input type="text" hidden value="<?php echo $rn_id ;?>" name="temp1">
<div class="container">
<div class = "row" >
	
<div class="pad_left_form">
<table class="formbox">

<thead>
<tr><caption>
<div class="login" align="center">Edit Notes</div></caption></tr>
</tr>
</thead>
<?php
//$n_id=$_REQUEST['note_id'];

$sql="SELECT * FROM notes3 WHERE (note_id=$n_id) OR (note_id=$rn_id)";
//var_dump($sql);
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
 { 
  ?>
<tbody>
<tr>
<th>
<div class="login_font" align="left">Title</div></th>
<td class="pad"><input type="text" name="title" class="textbox" required value="<?php echo $row['title'];?>"  />

</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Description</div></th>
<td class="pad"><textarea rows="10" cols="44" name="description" class="txta" required ><?php echo $row['description']; ?></textarea>
</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Tags </div></th>
<td class="pad"><textarea rows="5" cols="44" name="tags" class="txta" required pattern="[A-Za-z]" ><?php echo $row['tags'];
 ?></textarea>
</td>
</tr>
<input type="text" hidden value="<?php echo $row['note_id'];?>" name="temp">
</tbody>
<?php

 }
 ?>
<tfoot>
<tr>
 <td></td>
 <td class="foot">
 <div align="center" class="pad">
<input type="submit" name="add" value="Add" class="btn" />
<input type="reset" name="cancel" value="Cancel" class="btn" />
<input type="hidden" name="submitted" />
</div>
</td>
</tr>
</tfoot>
</table>
</div></div></div>
</form>
<?php $_SESSION['note_idd']='';?>
</body>
</html>
