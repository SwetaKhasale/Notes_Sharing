<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Share Notes</title>
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
include("menu.php");
//include("right_menu.php");
session_start();
	error_reporting(0);
$user_id = $_SESSION['user_id'];

 if(isset($_POST['submitted']))
{

	$dropu=mysqli_real_escape_string($con,$_POST['dropu']);
    $dropu=stripslashes($dropu);
	$shareby=mysqli_real_escape_string($con,$_POST['shareby']);
    $shareby=stripslashes($shareby);
    $checkbox = implode(',',$_POST['per']);	
	$checkbox=stripslashes($checkbox);
	$noteid=$_POST['note_id'];		
	$temp_id=mysqli_real_escape_string($con,$_POST['temp_id']);
	$query="INSERT INTO user_notes(permission,shareby,shareto,user_id,note_id)VALUES('$checkbox','$shareby','$dropu',$user_id,'$noteid')";
	//var_dump($query);
	$result=mysqli_query($con,$query);
	if($result==FALSE)
	{
		$_SESSION['shareby']=$result['shareby'];
		 print "<p class='error' align='center'>Error in sending note!</p>";		 
	}
	else
	{
		print "<p class='sucess_msg' align='center'>Your notes has been sent!</p>";
		//header("Location:rec_notes.php");
	}
   
}
?>



<form action="share_notes.php" method="post">
<div class="container">
<div class = "row" >
	
<div class="pad_left_form">
<table class="formbox">
<thead>
<tr><caption>
<div class="login" align="center">Share Notes</div></caption></tr>
</tr>
</thead>

<tbody>

<tr>
<th>
<div class="login_font" align="left">Share To</div></th>
<td class="pad">

<select class="dropdown" name="dropu">Users
<?php
$query="SELECT user_name,user_id FROM users3";
$result=mysqli_query($con,$query);
while($rows=mysqli_fetch_array($result))
{

?>

<option><?php echo $rows['user_name'];?></option>
<?php
}
?>


</select>



</td>
</tr>

<tr>
<th>
<?php $no=$_REQUEST['note_id'];?>
<div class="login_font" align="left">Permissions</div></th>
<td class="pad">
<input type="checkbox" name="per[]" value="Read" checked>Read<br>
<input type="checkbox" name="per[]" value="Write">Write<br>
<input type="checkbox" name="per[]" value="Share">Share<br>
</td>
</tr>

<tr>
<th>
<input type="text" value="<?php echo $no;?>" hidden name="note_id">

<div class="login_font" align="left">Share By</div></th>
<td class="pad"><input type="text" name="shareby" class="textbox" placeholder="Enter your name" required >

</td>
</tr>

</tbody>

<tfoot>
<tr>
 <td></td>
 <td class="foot">
 <div align="center" class="pad">
<input type="submit" name="add" value="Send" class="btn" />
<input type="reset" name="cancel" value="Cancel" class="btn" />
<input type="hidden" name="submitted" />
</div>
</td>
</tr>
</tfoot>
</table>
</div></div></div>
</form>

</div></div>
</body>
</html>