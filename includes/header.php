
<html>
<meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slide.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<body>
<?php
include "connectDB.php";
session_start();
if(isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo.png"></a>';
	echo '<a class="hf" href="logout.php"><p class="hi">Logout</p></a>';
	echo '<a class="hf" href="index.php"><p class="hi">Book List</p></a>';
	echo '</blockquote>';
	echo '</header>';
}

if(!isset($_SESSION['id'])){
	echo '<header>';
	echo '<blockquote>';
	echo '<a href="index.php"><img src="image/logo.png"></a>';
	//echo '<a class="hf" href="register.php"><p class="hi" >Register</p></a>';
	echo '<a class="hf" href="xmlparse.php"><p class="hi">Add XML Data</p></a>';
	echo '</blockquote>';
	echo '</header>';
}