<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, ' '. $_POST['address'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('y-m-d');
	

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }
		

    $total_products = implode(' ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'order placed already!';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'order placed successfully!';
    }
	if($method==='credit'){
	  header('Location:Credit.php');
  }elseif($method==='cash'){
	  header('Location:Thank.php');
  }elseif($method==='gpay'){
	  header('Location:Scan.php');
  }elseif($method==='bank'){
	  header('Location:Bank.php');
  }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="sty.css">

</head>
<body>
   
<?php @include 'header.php'; ?>
<section class="heading">
    <h3>checkout order</h3>
    <p> <a href="home.php">home</a> / checkout </p>
</section>
<div class="image"></div>
<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo 'Rs.'.$fetch_cart['price'].'/-'.'    Quantity-'.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
    ?>
    <div class="grand-total">Grand total : <span>Rs.<?php echo $grand_total; ?>/-</span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>place your order</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Your name :</span>
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="inputBox">
                <span>Your number :</span>
                <input type="text" name="number"  maxlength="10" placeholder="enter your number" required>
            </div>
            <div class="inputBox">
                <span>Your email :</span>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="inputBox">
                <span>Payment method :</span>
                <select name="method" required>
                    <option value="cash" >Cash on delivery</option>
                    <option value="credit" >Credit/Debit card</option>
                    <option value="gpay" >Gpay</option>
                    <option value="bank" >Bank Transfer</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address</span>
                <input type="text" name="address" placeholder="e.g. flat no, street name" required>
            </div>
            
            <div class="inputBox">
                <span>City :</span><br>
                <input type="text" name="city" placeholder="e.g. chenai" required>
            </div>
            <div class="inputBox">
                <span>State :</span><br>
                <input type="text" name="state" placeholder="e.g. tamilnadu" required>
            </div>
            <div class="inputBox">
                <span>Country :</span>
                <input type="text" name="country" placeholder="e.g. india" required>
            </div>
            <div class="inputBox">
                <span>Pin code :</span>
                <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" required>
            </div>

        </div>

        <input type="submit" name="order" value="order now" class="btn">

    </form>

</section>



<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>