<?php
  include("connection.php");
  $n_id=$_REQUEST['note_id'];
  $q="DELETE FROM notes3 where note_id='$n_id'";
  $r=mysqli_query($con,$q);
  header("Location:view_notes.php");
?>