<html >
<head>
<link rel="stylesheet" href="payment.css">
<link rel="stylesheet" href="code.css">
<title>Checkout</title>
</head>
<body>
<div id="container">
<div id="nav">
<div class="image">
<div class="image_position"><img src="1.png"></div>
</div></div>
<div id="content">
<div id="paymentDiv">
<div>
<h2>Contact Information</h2>
<div id="userInfo" class="field">
<input id="email" class="inputs" type="text" name="email"placeholder="Email ID">
</div>
</div>
<div id="mainContent">
<h2>Shipping Address</h2>
<div id="pincode" class="field">
<h3></h3>
<input id="pin" class="inputs" type="number" name="pin_code" onclick="showAlert()" placeholder="PIN code">
</div>

<div class="field names">
<div id="first">
<input id="firstName" class="inputs" type="text" name="name" placeholder="Name">
</div>
<div id="second">
<input id="lastName" class="inputs" type="text" name="number" placeholder="Phone Number">
</div></div>

<div id="addressDiv" class="field">
<h3></h3>
<input id="address" class="inputs" type="text" name="address"onclick="showAlert()" placeholder="Address"></div>
<div class="field names">
<div id="first">
<input id="firstName" class="inputs" type="text" name="city" placeholder="City">
</div>
<div id="second">
<input id="lastName" class="inputs" type="text" name="state" placeholder="State">
</div></div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
        <div class="title">
            <h4>Select a <span style="color: #6064b6">Payment</span> method</h4>
        </div>

        <form action="#">
            <input type="radio" name="payment" id="visa">
            <input type="radio" name="payment" id="mastercard">
            <input type="radio" name="payment" id="paypal">
            <input type="radio" name="payment" id="AMEX">


            <div class="category">
                <label for="visa" class="visaMethod">
                    <a href="Scan.html"><div class="imgName">
                        <div class="imgContainer visa">
                            <img src="55.png" alt="">
                        </div>
                        <span class="name"style="color: #36454f;font-size:15px;">Gpay</span>
                    </div></a>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="mastercard" class="mastercardMethod">
                    <a href="Credit.html"><div class="imgName">
                        <div class="imgContainer mastercard">
                            <img src="56.jpeg" alt="">
                        </div>
                        <span class="name"style="color: #36454f;font-size:15px;">Debit/Credit Card</span>
                    </div></a>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="paypal" class="paypalMethod">
                    <a href="Bank.html"><div class="imgName">
                        <div class="imgContainer paypal">
                            <img src="57.png" alt="">
                        </div>
                        <span class="name" style="color: #36454f;font-size:15px;">Net Banking</span>
                    </div></a>
                    <span class="check"><i class="fa-solid fa-circle-check" ></i></span>
                </label>

                <label for="AMEX" class="amexMethod">
                    <div class="imgName">
                        <div class="imgContainer AMEX">
                            <img src="61.png" alt="">
                        </div>
                        <span class="name" style="color: #36454f;font-size:15px;">Cash on Delivery</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" ></i></span>
                </label>
            </div>
			</select>
        </form>
		
<div id="checkbox_input">
<input  class = "saveAddress"id="box" type="checkbox">
<label>Save this information for next time</label>
</div><br>
<div id="checkbox_input">
<input class="above18" id="box" type="checkbox">
<label>I am above the age of 18.</label>
</div></div>
<div id="buttonDiv">
<a href="Thank.html"><button id="proceed">Complete Order</button></a></div>
<hr><footer>
<a href="">Refund policy</a>
<a href="">Shipping policy</a>
<a href="">Privacy policy</a>
<a href="">Terms of service</a>
</footer></div>


</body>
</html>

