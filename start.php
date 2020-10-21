<?php
ob_start(); //Turns on output buffering 


$SQL_CON = mysqli_connect("localhost:3307", "root", "Abhi123$$$", "bookstore"); 
if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}
?>