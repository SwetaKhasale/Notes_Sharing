
<!--Panel-->
<table class="sidebar_right">
<?php 
$query="SELECT user_name FROM users3";
$result=mysqli_query($con,$query);
while($rows=mysqli_fetch_array($result))	
{
?>
<tr class="tr">
<td class="td"><a href='#' class='anchor'><?php echo $rows['user_name']; ?></a></td>
</tr>

<?php
}
?>
</table>