<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autofocus Field</title>
</head>
<style>
body{
  margin: 0;
  padding: 0;
  height: 100vh;
background: #000000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.content{
max-width:550px;
margin:auto;
background-color:#483248;
height:500px;
}
.container{
  display: flex;
  flex-flow: column;
  height: 100%;
  align-items: space-around;
  justify-content: center;
}

.userInput{
  display: flex;
  justify-content: center;
}

input{
  margin: 10px;
  height: 35px;
  width: 65px;
  border: none;
  border-radius: 5px;
  text-align: center;
  font-family: arimo;
  font-size: 1.2rem;
  background: #eef2f3;

}
img{
border-radius:90%;
}
h1{
  text-align: center;
  font-family: arimo;
  color: honeydew;
}


button{
  width: 150px;
  height: 40px;
  margin: 25px auto 0px auto;
  font-family: arimo;
  font-size: 1.1rem;
  border: none;
  border-radius: 5px;
  letter-spacing: 2px;
  cursor: pointer;
  background: #616161;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #9bc5c3, #616161);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #9bc5c3, #616161); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
</style>

<script>
function clickEvent(first,last){
      if(first.value.length){
        document.getElementById(last).focus();
      }
    }
	</script>
<body>
 <br><br><br><br><div class="content"> <div class="container">
  <center><img src="89.png" height="150" width="150"></center>
    <h1>ENTER OTP</h1>
    <div class="userInput">
      <input type="text" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
      <input type="text" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
      <input type="text" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
      <input type="text" id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')">
      <input type="text" id="fifth" maxlength="1">
    </div>
   <center><a href="Received.php"> <button>CONFIRM</button></a></center>
  </div>
  </div>
</body>
</html>