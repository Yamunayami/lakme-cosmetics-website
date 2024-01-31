<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `admin` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_admin.php');
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
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
   
<?php @include 'admin_head.php'; ?>
<div class="heading" >
    <h3>Admin Login Information</h3>
	</div>
<section class="users">

   <div class="box-container">
      <?php
         $select_admin = mysqli_query($conn, "SELECT * FROM `admin`") or die('query failed');
         if(mysqli_num_rows($select_admin) > 0){
            while($fetch_admin = mysqli_fetch_assoc($select_admin)){
      ?>
      <div class="box">
         <p>user id : <span><?php echo $fetch_admin['id']; ?></span></p>
         <p>username : <span><?php echo $fetch_admin['name']; ?></span></p>
         <p>email : <span><?php echo $fetch_admin['email']; ?></span></p>
         <p>user type : <span style="color:<?php if($fetch_admin['user_type'] == 'admin'){ echo 'var(--orange)'; }; ?>"><?php echo $fetch_admin['user_type']; ?></span></p>
         <a href="admin_admin.php?delete=<?php echo $fetch_admin['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete</a>
      </div>
      <?php
         }
      }
      ?>
   </div>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>