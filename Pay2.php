<html>
<head>
<style>
.box{
	margin-top:50px;
	width:80%;
	justify-content:center;
	margin-left:300px;
	height:120;
}
b{
	font-size:15px;
}
     .b1{
		 border:1px solid black;
		 text-align:center;
		 width:250px;
		 height:40px;
		 font-size:15px;
		 border-radius:12px;
		 top:12px;
		 margin-top:30px;
	 } 
	 .but{
		 margin-top:13px;
		 width:120px;
		 height:40px;
		 background-color:black;
		 font-size:18px;
		 border-radius:5px;
		 color:white;
		 margin-left:512px;
	 }
	 .empty{
		 font-size:2rem;
		 text-align:center;
		 text-transform:capitalize;
		 margin-left:600px;
	 }
	 
	 }
	 form{
		 top:50px;
	 }
	 </style>
</head>
<body bgcolor="#FFE4C4">
   <?php @include 'admin_head.php'; ?>
<section class="heading">
    <h3>PAYMENT REPORT</h3>

</section>

<div class="box">

	<form action="Pay1.php" method="POST" >
	<center> <B>ENTER THE STARTING DATE:</B><input type="date" name="date1" class="b1">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
     <B>ENTER THE END DATE:</B><input type="date" name="date2" class="b1"></center><br>
	 	<center> <B>ENTER THE PAYMENT METHOD:</B><input type="text" name="method" class="b1"></center>

	 
        <center> <button name="order" class="but">SEARCH</button></center>
         
</form>
</div>

</section>
</body>
</html>
