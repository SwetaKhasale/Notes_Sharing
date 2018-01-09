<?php


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'notes3';
$con =mysqli_connect($host,$user,$pass,$db) or die($mysqli->error);



//$con=mysqli_connect("localhost","root","");
//$db=mysqli_query($con,'CREATE DATABASE IF NOT EXISTS notessharing');
/* Database connection settings */
//USE notessharing;
/*$db_select=mysqli_select_db($con,'notessharing');*/

if(!$con)
{
    print "<p class='error' align='center'> Connection Failed";
	 echo mysqli_error($con);
}
else
{
$usertable=mysqli_query($con,"CREATE TABLE IF NOT EXISTS users3 (
user_id int not null auto_increment primary key,
user_name varchar(255) not null,
email varchar(255) not null,
password varchar(8) not null
)ENGINE=InnoDB");

$notestable=mysqli_query($con,"CREATE TABLE IF NOT EXISTS notes3 (
note_id int not null auto_increment primary key,
title varchar(255) not null,
description text not null,
tags varchar(355),
user_id int not null,
FOREIGN KEY fk_user(user_id)
REFERENCES users(user_id) 
ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB");


/*$user_note="CREATE TABLE IF NOT EXISTS user_notes (
un_id int not null auto_increment primary key,
permission varchar(255) not null,
shareby varchar(255) not null,
user_id int not null,
FOREIGN KEY fk_user(user_id)
REFERENCES users3(user_id) 
ON UPDATE CASCADE ON DELETE RESTRICT,
note_id int not null,
FOREIGN KEY fk_note(note_id)
REFERENCES notes3(note_id) 
ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=InnoDB";*/
}


/*if(mysqli_query($con,$usertable,$notestable))
{
	
	echo "Table created";
}
else
{
	echo "Error";
}*/

?>