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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="sty.css">
   </head>
<header class="header">

    <div class="flex">
<div id="lakme"><img src="1.png"></div>
      

        <nav class="navbar">
            <ul>
			<li><a href="home.php">Home</a>
                <li><a href="#">Products</a>
                    <ul>
                        <li><a href="trending.php">Trending</a></li>
                        <li><a href="combo.php">Combo</a></li>
                    </ul>
                </li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="orders.php">orders</a></li>
                <li><a href="#">User </a>
                    <ul>
                        <li><a href="login.php">login</a></li>
                        <li><a href="register.php">register</a></li>
						<li><a href="logout.php">logout</a></li>
                    </ul>
					</li>
				<li><a href="admin.php">Admin</a></li>
                
            </ul>
        </nav>

        <div class="icons">
          
            
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
        </div>
		
		<div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>
		
		


		
      
    

</header>