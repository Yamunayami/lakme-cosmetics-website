<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/sty.css">
   

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>your orders</h3>
    <p> <a href="home.php">home</a> / order </p>
</section>

<section class="placed-orders">

    <h1><center>PLACED ORDERS</center></h1>

    <div class="box-container" style="width:900px;">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box" style="font-size:20px;">
        <p> Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> Payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> Your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Total price : <span>Rs.<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
        <p> Delivery Date : <span><?php echo $fetch_orders['exdate']; ?></span> </p>
		 <p>Payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'Pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="emp" style="margin-left:450px">no orders placed yet!</p>';
    }
    ?>
    </div>

</section>


<br>




<?php @include 'footer.php'; ?>

<script src="script.js"></script>

</body>
</html>