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
                    </ul>
				 <li>     hjfjhghn</li><li>iighjgk</li><li>yjghkjgj</li>
            </ul>
        </nav>
 <nav class="navbar">
 
        </nav>

        

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>

</header>