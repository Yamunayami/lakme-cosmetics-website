<html>
<head>
<title>Report</title>
<style>
td{
	top:10px;
	font-size:1.5rem;
	text-align:center;
	border:1px solid black;
}
th{
	border:1px solid black;
	font-size:1.5rem;
	text-align:center;
	box-shadow:0.1rem blue;
	</style>
</head>
<body>
<?php @include 'Rep1.php';?>
<table style="width:100%;margin-top:100px;color:black;border:1px solid black;">
<tr>
<th width="10" height="30">ID</th>
<th width="10" height="30">USER_ID</th>
<th width="10" height="30">PLACED_ON</th>
<th width="20" height="30">NAME</th>
<th width="30" height="30">MOBILE NO</th>
<th width="30" height="30">EMAIL</th>
<th width="100" height="30">ADDRESS</th>
<th width="10" height="30">METHOD</th>
<th width="100" height="30">TOTAL PRODUCTS</th>
<th width="20" height="30">TOTAL PRICE</th>
</tr>
<?php
@include 'config.php';
if(isset($_POST['order'])){
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$query=mysqli_query($conn,"SELECT * FROM `orders` WHERE placed_on BETWEEN '$date1' AND '$date2'");
if(mysqli_num_rows($query)>0){
while($row=mysqli_fetch_assoc($query))
{
?>
<tr>
<td width="10" height="30"><?php echo $row['id'];?></td>
<td width="10" height="30"><?php echo $row['user_id'];?></td>
<td width="10" height="30"><?php echo $row['placed_on'];?></td>
<td width="20" height="30"><?php echo $row['name'];?></td>
<td width="30" height="30"><?php echo $row['number'];?></td>
<td width="30" height="30"><?php echo $row['email'];?></td>
<td width="100" height="30"><?php echo $row['address'];?></td>
<td width="10" height="30"><?php echo $row['method'];?></td>
<td width="100" height="30"><?php echo $row['total_products'];?></td>
<td width="20" height="30"><?php echo $row['total_price'];?></td>
</tr>
<?php
}
}
else
{
	echo '<p class="empty"> No orders placed yet!</p>';
}
}
?>

</table>
</body>
</html>