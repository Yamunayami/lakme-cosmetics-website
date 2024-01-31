<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_acc = filter_var($_POST['acc'], FILTER_SANITIZE_STRING);
   $acc = mysqli_real_escape_string($conn, $filter_acc);
   $filter_account = filter_var($_POST['account'], FILTER_SANITIZE_STRING);
   $account = mysqli_real_escape_string($conn, md5($filter_account));
   $filter_ifsc = filter_var($_POST['ifsc'], FILTER_SANITIZE_STRING);
   $ifsc = mysqli_real_escape_string($conn, $filter_ifsc);
    

   $select_bank = mysqli_query($conn, "SELECT * FROM `bank` WHERE acc = '$acc'") or die('query failed');

   if(mysqli_num_rows($select_bank) > 0){
   }else{
         mysqli_query($conn, "INSERT INTO `bank`(name, acc, ifsc) VALUES('$name', '$acc', '$ifsc')") or die('query failed');
        header('location:captcha.php');
      }
   }

?>



<html>
<title>Pay</title>

<style>
.column{
float:left;
width:50%;
}
.row:after{
content:"";
display:table;
clear:both;
}
.inputs {
    width: 90%;
    float: left;
    border-radius: 5px;
    padding: 16px 14px;
    border: 1px solid grey;
}
p{
font-size:20px;
}
.ab{
background-color:black;
color:white;
align:center;
height:30px;
width:500px;
}
.container{
  display: flex;
  justify-content: center;
  align-items: top;
  padding:25px;
  min-height: 92vh;
  background-color:#d3d3d3;
}
.container form{
  padding:20px;
  width:700px;
  background: #fff;
  box-shadow: #d3d3d3;
}
.bt{
border:none;
height:50px;
width:270px;
background-color:#36454f;
color:white;
align:center;
text-decoration:none;
}
</style>
<body>
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

<div class="container">
    <form name="RegForm" onsubmit="return validateForm()" method="POST">
        
                <h2 style="text-align:center">Bank Transfer</h2><br>

<div id="abb"><p>Name Of The Card Holder</p>
<input id="a" class="inputs" type="text" name="name" placeholder="Enter The Name" required>                
 <br><br>
<p>Account number</p>
<input id="a" class="inputs" type="text" name="acc" placeholder="Enter Account Number" required> 
<br>    <br>          
<p>Re-enter Account Number</p>
<input id="a" class="inputs" type="text" name="account" placeholder="Enter Re-Account Number" required> 
<br>  <br>
<p>IFSC</p>
<input id="a" class="inputs" type="text" name="ifsc" placeholder="Ifsc" required></div>             
            <br><br><br><br>
   <div class="row">
<div class="column"><button class="bt" name="submit">CONFIRM</button></div>
<div class="column"><a href="payment.html"><button class="bt"> CANCEL </button></a></div></div>
    </form>
</div>   
    </body>

<script>
function validateForm(){
	var name=document.forms["RegForm"]["name"].value;
	var acc=document.forms["RegForm"]["acc"].value;
	var account=document.forms["RegForm"]["account"].value;
	var ifsc=document.forms["RegForm"]["ifsc"].value;
	var namePattern=/^[A-Za-z\s]+$/;
	var accPattern=/^[0-9]+$/;

	var isValid=true;
	if(!name.match(namePattern)){
		alert("Invalid name format")
		isValid=false;
	}
	if(!acc.match(accPattern)){
		alert("Invalid account format")
		isValid=false;
	}
	if(acc!==account){
		alert("Account number do not match")
		isValid=false;
	}

	return isValid;
}
</script>
</html>
