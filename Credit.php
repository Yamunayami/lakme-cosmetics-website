<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_cardno = filter_var($_POST['cardno'], FILTER_SANITIZE_STRING);
   $cardno = mysqli_real_escape_string($conn, $filter_cardno);
   $filter_exp = filter_var($_POST['exp'], FILTER_SANITIZE_STRING);
   $exp = mysqli_real_escape_string($conn, $filter_exp);
   $filter_year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
   $year = mysqli_real_escape_string($conn, $filter_year);
      $filter_cvv = filter_var($_POST['cvv'], FILTER_SANITIZE_STRING);
   $cvv = mysqli_real_escape_string($conn, $filter_cvv);

   $select_credit = mysqli_query($conn, "SELECT * FROM `credit` WHERE cardno = '$cardno'") or die('query failed');

   if(mysqli_num_rows($select_credit) > 0){
   }else{
         mysqli_query($conn, "INSERT INTO `credit`(name, cardno, exp,year,cvv) VALUES('$name', '$cardno', '$exp', '$year', '$cvv')") or die('query failed');
        header('location:otp.php');
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
    <form name="RegForm" onsubmit="return validateForm()" method="post">
        
                <h2 style="text-align:center">Debit/Credit Card</h2><br>

<div id="abb"><p>Name Of The Card Holder</p>
<input id="a" class="inputs" type="text" name="name" placeholder="Enter The Name" required>                
 <br><br>
<p>Card number</p>
<input id="a" class="inputs" type="text" name="cardno" maxlength="14" placeholder="1111-2222-3333-4444" required> 
<br>    <br>          
<p>Exp Month</p>
<input id="a" class="inputs" type="text" name="exp" placeholder="January" required> 
<br>  <br>
<div class="row">
<div class="column">
<p>Exp Year</p>
<input id="a" class="inputs" type="text" maxlength="4" name="year" placeholder="2023" required></div>                 
<div class="column">   <p>CVV</p>
<input id="a" class="inputs" type="text" maxlength="3" name="cvv" placeholder="123" required></div></div>
</div>
            <br><br>
   <div class="row">
<div class="column"><a href="otp.php"><button class="bt" name="submit">CONFIRM</button></a></div>
<div class="column"><a href="payment.html"><button class="bt"> CANCEL </button></a></div></div>
    </form>
</div>   
    </body>
	<script>
function validateForm(){
	var name=document.forms.RegForm.name.value;
	var cardNo=document.forms.RegForm.cardNo.value;
	var exp=document.forms.RegForm.exp.value;
	var year=document.forms.RegForm.year.value;
	var cvv=document.forms.RegForm.cvv.value;
	var namePattern=/\d+$/g;
	var cardNoPattern=/^\d{16}$/;
	var expPattern=/^[A-Za-z\s]+$/;
	var yearPattern=/^\d{4}$/;
	

	if(!name.test(namePattern)){
		alert("Invalid name format")
		name.focus();
		return false;
	}
	if(!cardNo.test(cardNoPattern)){
		alert("Invalid account format")
		cardNo.focus();
		return false;
	}
	if(!exp.test(expPattern)){
		alert("Invalid account format")
		exp.focus();
		return false;
	}
	if(!year.test(yearPattern)){
		alert("Invalid account format")
		year.focus();
		return false;
	}
	if(!cvv.test(cvvPattern)){
		alert("Invalid account format")
		cvv.focus();
		return false;
	}

	return true;
}
</script>
</html>