<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

?>

<html>
<head>
<title>REPORT</title>
	    <link rel="stylesheet" href="admin.css" >
		  <link rel="stylesheet" href="css/admin.css">
		    	<link rel="stylesheet" type="text/css"

	<link rel ="stylesheet" type="text/css" href="css/adm.css">

	</head>
<style>
.empty{
	margin-left:500px;
}
form{
top:50px;
}
.box{
	margin-left:400px;
	font-size:20px;
}
.b1{
	height:30px;
	width:150px;
	font-size:20px;
}
.but{
	height:30px;
	width:150px;
	font-size:20px;
	background-color:#f33a6a;
}
</style>

<section class="heading">
    <h3>REPORT</h3>

</section>
<br><br>
<div class="box">
<form action="Rep2.php" method="POST">
<b>ENTER THE STARTING DATE:</b>&nbsp;&nbsp;&nbsp;<input type="date" name="date1" class="b1"><br><br>
<b>ENTER THE END DATE:</b>&nbsp;&nbsp;&nbsp;<input type="date" name="date2" class="b1">
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<button name="order" class="but">SEARCH</button><br><br><br>
</form>
</div>
</html>