<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP generator</title>
    <script>
	function generateOTP() { 
    var digits = '0123456789'; 
    let OTP = ''; 
    for (let i = 0; i < 5; i++ ) { 
        OTP += digits[Math.floor(Math.random() * 10)]; 
    } 
    document.getElementById("x").innerHTML=  OTP; 
	var y=document.getElementById("my");
	if(y.style.display==="none")
	{
	y.style.display="block";
	}
	else{
	y.style.display="none";
	}
} 
    </script>   
</head>
<style>
body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}
.bg-text {
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 35%;
  padding: 20px;
  text-align: center;
}
button {
  font-size: 13px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #de3163;
  border-radius: 6px;
  cursor: pointer;
}
button:hover {
  background-color: #ff69b4;
}
</style>
<body>
<div class="bg-text">
    <center>
        
    <div >
        <br/>
              
        <h3 style="color:black;">Get your one time OTP number:</h3><br/>
            <button onclick="generateOTP()" >Get OTP</button>
        <h3><p id="x" style="background-color: black;color:white"> 
        </p></h3>
		<div style="display:none;"id="my"><a href="enter otp.php"><button>Enter your OTP here</button></div>
    </div>
	</div>
</center>
</body>
</html>