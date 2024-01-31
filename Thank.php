<html>
  <head>
      <title>Popup Modal Box</title>
    
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
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 40%;
  padding: 20px;
  text-align: center;
}
.bg{
background-image:url("3.jpeg");
filter:blur(8px);
-webkit-filter:blur(8px);
height:100%;
background-position:center;
background-repeat:no-repeat;
background-size:cover;
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
<div class="bg"></div>
  <body>
<div class="bg-text">
<h1>Completed!</h1>
<p>Your order is completed. Thank You for shopping with us</p>
<div class="buttons">
<a href="trending.php">          <button class="close-btn">Shop more</button></a>
<a href="home.php">          <button>Go Home</button></a>
        </div>
</div>  
  </body>
</html>