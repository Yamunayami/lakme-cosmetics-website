<?php

@include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}




if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
     
   }else{

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
  
   }

}

?>

<html>
<head>
<title>Lakme</title>
<link rel="stylesheet" href="homepagestyle.css">  

   <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
   
<?php @include 'header.php'; ?>
<img src="gif.gif" height="92%",width="92%">

 </section><br>
<div id="prod">
<a href="#.php"><button  style="height:50px;width:400px;margin-right:30px;font-size:35px;border:none;background-color:white;color:#800020"><b>Deals You Can't Miss</b></button></div>
</a>
 <br>

<section class="products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <div class="price">Rs.<?php echo $fetch_products['price']; ?>/-</div>
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>


<div id="prod">
<a href="trending.php"><button  style="height:50px;width:200px;margin-right:30px;">TOP SALES PRODUCTS</button></div>
</a>

<div id="lipistick">
<div class="lip">
<h1 class="trending">DISCOVER</h1></div></div>
<p style="text-align:center">Get inspired and get glam!Lakmé presents Masterclass with ace makeup artist Namrata Soni and dazzling Ananya Panday! </p></div>
<div id="img5"><a href="blog.html"><img src="8.jpg" height="95%" width="100%"></a></div>

<br><br>
<section class="home-contact">

   <div class="content">
   <br>
      <h3>have any questions?</h3>
      <p>If you have any questions or comments please contact us. We would love to hear from you!</p>
      <a href="contact.php"><button class="bt">Contact Us</button></a><br><br>
   </div>

</section><br>
<?php @include 'footer.php'; ?>

</body>
</html>  