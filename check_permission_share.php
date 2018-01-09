<?php
include("connection.php");
session_start();
$n_id=$_REQUEST['note_id'];
echo $n_id;
$sql="SELECT permission,note_id FROM user_notes WHERE un_id=$n_id";
var_dump($sql);
$result=mysqli_query($con,$sql);
$find = 'Share';
error_reporting(0);
while($rows=mysqli_fetch_array($result))	
    {
		?>
		<input type="text" hidden value=<?php echo $rows['note_id'];?> name="note_idd">
		<?php
		$_SESSION['note_idd']=$rows['note_id'];
		$string = $rows['permission'];
		
		function iscontain($string,$find)
		{
			$check = strpos($string, $find);
			if ($check === false)
			{
					return 0;
				}
				else
				{
					return 1;
				}
			} 
			if(iscontain($string,$find))
			{
				header('Location:share3_notes.php');
			}
			else
			{
				$_SESSION['msg']='You dont have permission to share!';
				header('Location:rec_notes.php');
				//print "<p class='ses_name' align='center'>You have no notes yet Add new Notes!</p>";

			}
	}
?>
