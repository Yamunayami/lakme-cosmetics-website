<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update_order'])){
   $order_id = $_POST['order_id'];
   $exdate = $_POST['exdate'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET exdate='$exdate' , payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
   $message[] = 'payment status has been updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->

   <link rel="stylesheet" href="css/admin.css">
<style>
.placed-orders .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   max-width: 1200px;
   margin-left:280px;
   
   justify-content: center;
}

.placed-orders .box-container .box{
   padding:2rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
}

.placed-orders .box-container .box p{
   margin-bottom: 1rem;
   font-size: 2rem;
   color:var(--light-color);
}

.placed-orders .box-container .box p span{
   color:var(--pink);
}

.placed-orders .box-container .box form{
   margin-top: 1rem;
   text-align: center;
}

.placed-orders .box-container .box form select{
   width: 100%;
   border:var(--border);
   padding:1.2rem 1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   border:var(--border);
   border-radius: .5rem;
   margin:.5rem 0;
}

</style>
</head>
<body>
   
<?php @include 'admin_head.php'; ?>

<div class="heading">
    <h3>Orders</h3>
	</div>
<section class="placed-orders">



   <div class="box-container">

      <?php
      
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
        <p> Placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> Payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> Your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Total price : <span>Rs.<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
       

         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
			 <p> Delivery Date : <span><input type="date" id="checkin-date" class="box" name="exdate"></span></p>
            <select name="update_payment">

               <option value="pending">Pending</option>
               <option value="completed">Completed</option>
            </select>
            <input type="submit" name="update_order" value="update" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>





<script src="js/admin_script.js"></script>
<script>
var currentDateTime = new Date();
var year=currentDateTime.getFullYear();
var month=(currentDateTime.getMonth()+1);
var date=(currentDateTime.getDate()+1);
if(date<10){
date='0'+date;
}
if(month<10){
month='0'+month;
}
var dateTomorrow=year+"-"+month+"-"+date;
var checkinElem=document.querySelector("#checkin-date");
checkinElem.setAttribute("min",dateTomorrow);
checkinElem.onchange=function(){
}
</script>
</body>
</html>