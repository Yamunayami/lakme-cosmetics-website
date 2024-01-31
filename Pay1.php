<html>
<head>
<link rel ="stylesheet" type="text/css" href="css/adm.css">
	    <link rel="stylesheet" href="admin.css" >
		  <link rel="stylesheet" href="css/admin.css">
</head>
<style>
td{
	top:10px;
font-size:1.3rem;
text-align:center;
border:1px solid black;
}
th{
border:1px solid black;
text-align:center;
box-shadow:0 .1rem blue;
font-size:1.2rem;
}
.empty{
	margin-top:200px;
}
</style>
	


<body bgcolor="#FFE4C4">
<?php @include 'admin_head.php'; ?>
<?php @include 'Pay2.php'; ?>

<table style="width:78%;margin-top:100px; border:1px solid black; color:black;margin-left:300px;">
			   <tr>
			   	<th width="50"height="30">PLACED_ON DATE </th>
				<th width="50"height="30">NAME </th>
				<th width="50"height="30">EMAIL </th>
				<th width="50"height="30">METHOD </th>
                 <th width="140"height="30"> PRODUCTS  </th>
                 <th width="50"height="30">PRICE</th>
            </tr>
			
	  <?php
@include 'config.php';


if(isset($_POST['order'])){
		  $method = $_POST['method'];
		 $date1 = $_POST['date1'];
		 $date2 = $_POST['date2'];
$query=mysqli_query($conn,"SELECT * FROM `orders` WHERE placed_on BETWEEN '$date1' AND '$date2'");
		  if( mysqli_num_rows($query)>0){
	   
	   
		   while($row = mysqli_fetch_assoc($query))
		   {
			   ?>
			   <tr>
			   	<td width="50"height="30"><?php echo $row['placed_on']; ?> </td>
				<td width="50"height="30"> <?php echo $row['name']; ?>  </td>
				<td width="50"height="30"> <?php echo $row['email']; ?>  </td>
				<td width="50"height="30"> <?php echo $row['method']; ?>  </td>
                 <td width="50"height="30"> <?php echo $row['total_products']; ?>  </td>
                 <td width="50"height="30">Rs.<?php echo $row['total_price']; ?>/-</td>
            </tr>
			
    <?php
        }
    }

else
{
        echo '<p class="empty">no orders placed yet!</p>';
    }
}
    ?>
    </table>
		</body>
		</html>
