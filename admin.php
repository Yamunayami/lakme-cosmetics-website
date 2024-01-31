<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

?>

<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Responsiive Admin Dashboard | CodingLab</title>
    <link rel="stylesheet" href="css/admin.css" >
	<link rel="stylesheet" href="css/adm.css" >
	<link rel="stylesheet" href="css/admin_header.css">
	   <link rel="stylesheet" href="css/admin_style.css">
  </head>
  
  
  <body>
<?php @include 'admin_head.php'; ?>
<div class="content">
		
		<header>
			<p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Dashboard</span></p>

			<div class="search-wrapper">
				<span class="fa fa-search"></span>
				<input type="search" name="" placeholder="Search here" />
			</div>

			<div class="user-wrapper" id="dropdown">
				<div>
					<h1>Profile</h1>
					<h3>Admin</h3>
				</div>
				
				<img src="Yami.jpg" width="50" height="50" class="logo-admin">
				<div class="dropdown-content">
				<p>Mon profil</p>
				<p>Deconnexion</p>
				</div>
				
			</div>
		</header>
		<br><br><br><br><br><br><br><br><br><br>

 <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Orders</div><br>
              <div class="number">      <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3></div>
 </div></div>
         
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Products</div><br>
              <div class="number">         <?php
            $select_trending = mysqli_query($conn, "SELECT * FROM `trending`") or die('query failed');
            $number_of_trending = mysqli_num_rows($select_trending);
         ?>
         <h3><?php echo $number_of_trending; ?></h3></div>
  </div></div>
		<div class="box">
            <div class="right-side">
              <div class="box-topic">Combo Products</div><br>
              <div class="number">         <?php
            $select_combo = mysqli_query($conn, "SELECT * FROM `combo`") or die('query failed');
            $number_of_combo = mysqli_num_rows($select_trending);
         ?>
         <h3><?php echo $number_of_combo; ?></h3></div>
  </div></div>
             <div class="box">
            <div class="right-side">
              <div class="box-topic">Users</div><br>
              <div class="number">         <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3></div>
             </div> </div></div>
			  <div class="home-content">
        <div class="overview-boxes">
			   <div class="box">
            <div class="right-side">
              <div class="box-topic">Completed Payment</div><br>
              <div class="number"> <?php
            $total_completes = 0;
            $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            while($fetch_completes = mysqli_fetch_assoc($select_completes)){
               $total_completes += $fetch_completes['total_price'];
            };
         ?>
         <h3>Rs <?php echo $total_completes; ?>/-</h3>
		 </div>
             </div> </div>
			       <div class="box">
            <div class="right-side">
              <div class="box-topic">Pending</div><br>
              <div class="number"><?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
               $total_pendings += $fetch_pendings['total_price'];
            };
         ?>
         <h3>Rs <?php echo $total_pendings; ?>/-</h3>
		  </div>
             </div> </div>
			 <div class="box">
            <div class="right-side">
              <div class="box-topic">Admin Info</div><br>
              <div class="number">         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `admin`") or die('query failed');
            $number_of_admin = mysqli_num_rows($select_trending);
         ?>
         <h3><?php echo $number_of_admin; ?></h3></div>
  </div></div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Message</div><br>
              <div class="number">         <?php
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3></div>
              
          </div>
        </div>

        </div>
      </div>
<?php @include 'slider.php'; ?>