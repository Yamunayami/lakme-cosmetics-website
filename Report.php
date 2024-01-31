
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">
    

</head>
<body>
   
<?php @include 'admin_head.php'; ?>
<section class="heading">
    <h3>REPORT</h3>

</section>
<style>
.a{
background-color:lightgrey;
width:250px;
height:110px;
border:5px;
padding:50px;
margin-top:200px;
font-size:17px;
margin-left:400px;
}
.column{
float:left;
width:23%;
}
.row:after{
content:"";
display:table;
clear:both;
}
</style>
<div class="row">
<div class="column"><div class="a">SALES REPORT</div></div>
<div class="column"><div class="a"> PRODUCT REPORT</div></div>
<div class="column"><div class="a"> PAYMENT REPORT</div></div>
</div>