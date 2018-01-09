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
<div align="center"><a href="home.php" class="logo_h">Share Notes</a></div>
<?php 
include("connection.php");
include("left_menu.php");
//include("right_menu.php");
include("menu.php");
session_start();
$user_id = $_SESSION['user_id'];
//error_reporting(0);
if(isset($_POST['submitted']))
  {
	 $title= mysqli_real_escape_string($con,$_POST['title']);
	 $description= mysqli_real_escape_string($con,$_POST['description']);
	 $tags=mysqli_real_escape_string($con,$_POST['tags']);; 
	 $insert="INSERT INTO notes3(title,description,tags,user_id)
	 VALUES('$title','$description','$tags',$user_id)";
	 //var_dump($insert);
     $result=mysqli_query($con,$insert);
	 if($result==TRUE)
         		{ 	   	
                       $_SESSION['note_id']=$result['note_id'];					   
                   	   $_SESSION['title']=$_POST['title'];	
                       $_SESSION['description']=$_POST['description'];
                       $_SESSION['tags']=$_POST['tags'];	                     			   
	                   header("Location:view_notes.php");
					   
					   
				 }
			 else 
			 {
					   echo "Error in inserting data".mysqli_error($con);
			 }
			 
  }

	
?>

<form name="insert_notes.php" method="post">
<div class="container">
<div class = "row" >
	
<div class="pad_left_form">
<table class="formbox">
<thead>
<tr><caption>
<div class="login" align="center">Add Notes</div></caption></tr>
</tr>
</thead>

<tbody>
<tr>
<th>
<div class="login_font" align="left">Title</div></th>
<td class="pad"><input type="text" name="title" class="textbox" placeholder="Enter Title" required />

</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Description</div></th>
<td class="pad"><textarea rows="10" cols="44" name="description" class="txta" placeholder="Write your notes" required ></textarea>
</td>
</tr>

<tr>
<th>
<div class="login_font" align="left">Tags</div></th>
<td class="pad"><textarea rows="5" cols="44" name="tags" class="txta" placeholder="Write keywords for notes" required pattern="[A-Za-z]" ></textarea>
</td>
</tr>

</tbody>

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

</body>
</html>
