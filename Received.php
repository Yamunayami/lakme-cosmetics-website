<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>
<html>
  <head>
      <title>Popup Modal Box</title>     
         </head>
		 


<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
section {
  position: fixed;
  height: 100%;
  width: 100%;
  background: #d3d3d3;
}
button {
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 10px 22px;
  border: none;
  background: #de3163;
  border-radius: 6px;
  cursor: pointer;
}
button:hover {
  background-color: #ff69b4;
}
.modal-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 480px;
  width: 100%;
  padding: 30px 20px;
  border-radius: 24px;
  background-color: #fff;
 margin-left:auto;
margin-right:auto;
}

.modal-box h2 {
  margin-top: 20px;
  font-size: 22px;
  font-weight: 500;
  color: #333;
}

</style>
  <body>
   <section>
<br><br><br><br><br><br><br><br><br><br>
<?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
          <div class="modal-box">
                <h2>Your Payment 
				  <span><?php echo 'Rs.'.$fetch_orders['total_price'].'/-' ?></span> is received!</h2><br> 
            <div class="buttons">
<a href="Thank.php">          <button>OK</button></a>
        </div>
		  <?php
        }
    }else{
        
    }
    ?>
      </div>
    </section>
  </body>
</html>
