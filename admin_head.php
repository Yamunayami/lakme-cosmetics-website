<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<head>
	<title>Admin Dashbord html and css</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel ="stylesheet" type="text/css" href="adm.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<input type="checkbox" id="menu" name="">
	<div class="sidebar">
		<div class="sidebar-brand">
			<a href="admin.php"><h1 style="font-size:28px;text-decoration:none;color:white;"><span class="fa fa-user"></span>Admin Dashboard</h1></a>
		</div>

		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="home.php" class="active"><span class="fa fa-home"></span><span>Lakme</span></a>
				</li>
				<li>
					<a href="admin_products.php"><span class="fa fa-list"></span><span>Add Product</span></a>
				</li>
				<li>
					<a href="admin_combo.php"><span class="fa fa-th-large"></span><span>Add Combo Product</span></a>
				</li>
				<li>
					<a href="admin_trending.php"><span class="fa fa-th-large"></span><span>Add Trending Product</span></a>
				</li>
				<li>
					<a href="admin_orders.php"><span class="fa fa-shopping-cart"></span><span>Orders</span></a>
				</li>
				
				<li>
					<a href="Rep1.php"><span class="fa fa-sliders"></span><span>Sales Report</span></a>
				</li>				
				<li>
					<a href="Pro1.php"><span class="fa fa-list"></span><span>Product Report</span></a>
				</li>				
				<li>
					<a href="Pay1.php"><span class="fa fa-dedent"></span><span>Payment Report</span></a>
				</li>				
				<li>
					<a href="admin_users.php"><span class="fa fa-user"></span><span>Users</span></a>
				</li>
				<li>
					<a href="admin_admin.php"><span class="fa fa-user-circle"></span><span>Admin Info</span></a>
				</li>

				<li>
					<a href="admin_contacts.php"><span class="fa fa-comments"></span><span>Messages</span></a>
				</li>
			</ul>
		</div>
	</div>

			
</body>
