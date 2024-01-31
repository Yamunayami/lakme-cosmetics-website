<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captcha</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<style>
/* Import Google font - Poppins & Noto */
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
::selection{
  color: #fff;
  background: #4db2ec;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #483248;
}
.wrapper{
  max-width: 485px;
  width: 100%;
  background: #fff;
  padding: 22px 30px 80px;
  border-radius: 10px;
  box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.05);
}

.wrapper header{
  color: black;
  font-size: 33px;
  font-weight: 500;
  text-align: center;
}
.wrapper .captcha-area{
  display: flex;
  height: 65px;
  margin: 30px 0 20px;
  align-items: center;
  justify-content: space-between;
}
.captcha-area .captcha-img{
  height: 100%;
  width: 345px;
  user-select: none;
  background: #000;
  border-radius: 5px;
  position: relative;
}
.captcha-img img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 5px;
  opacity: 0.95;
}
.captcha-img .captcha{
  position: absolute;
  left: 50%;
  top: 50%;
  width: 100%;
  color: #fff;
  font-size: 35px;
  text-align: center;
  letter-spacing: 10px;
  transform: translate(-50%, -50%);
  text-shadow: 0px 0px 2px #b1b1b1;
  font-family: 'Noto Serif', serif;
}
.re{
 
  border-radius: 5px;
}

.captcha-area .reload-btn{
  width: 75px;
  height: 100%;
  font-size: 25px;
}
.captcha-area .reload-btn i{
  transition: transform 0.3s ease;
}
.captcha-area .reload-btn:hover i{
  transform: rotate(15deg);
}
.wrapper .input-area{
  height: 60px;
  width: 100%;
  position: relative;
}
.input-area input{
  width: 100%;
  height: 100%;
  outline: none;
  padding-left: 20px;
  font-size: 20px;
  border-radius: 5px;
  border: 1px solid #bfbfbf;
}
.input-area input:is(:focus, :valid){
  padding-left: 19px;
  border: 2px solid #483248;
}
.input-area input::placeholder{
  color: #bfbfbf;
}
.input-area .check-btn{
  position: absolute;
  right: 7px;
  top: 50%;
  font-size: 17px;
  height: 45px;
  padding: 0 20px;
  opacity: 0;
  pointer-events: none;
  transform: translateY(-50%);
}
.input-area input:valid + .check-btn{
  opacity: 1;
  pointer-events: auto;
}
.wrapper .status-text{
  display: none;
  font-size: 18px;
  text-align: center;
  margin: 20px 0 -5px;
}
.btn{
  outline: none;
  border: none;
  color: #fff;
  cursor: pointer;
  background: #483248;
  border-radius: 5px;
  transition: all 0.3s ease;
  
}
.btn:hover{
  background: #483248;
}
</style>
<body>
  <div class="wrapper">
    <header>Captcha</header>
    <div class="captcha-area">
      <div class="captcha-img">
        <img src="62.png" alt="Captch Background">
        <span class="captcha"></span>
      </div>
      <img src="60.png" height"20px"width="20px" class="reload-btn" id="re"><i class="fas fa-redo-alt"></i>
    </div>
    <form action="#" class="input-area">
      <input type="text" placeholder="Enter captcha" maxlength="6" spellcheck="false" required><br><br>
      <button class="check-btn">Check</button>
<a href="Received.php"><button style="height:50px;width:430px;font-size:18px;" class="btn">OK</button></a>
    </form>
    <div class="status-text"></div>
  </div>

  <script>
  window.location.href="Received.php";
const captcha = document.querySelector(".captcha"),
reloadBtn = document.querySelector(".reload-btn"),
inputField = document.querySelector(".input-area input"),
checkBtn = document.querySelector(".check-btn"),
statusTxt = document.querySelector(".status-text");
let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
                     'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
                     'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
                     't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
function getCaptcha(){
  for (let i = 0; i < 6; i++) { 
    let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
    captcha.innerText += ` ${randomCharacter}`; 
  }
}
getCaptcha(); 
reloadBtn.addEventListener("click", ()=>{
  removeContent();
  getCaptcha();
});

checkBtn.addEventListener("click", e =>{
  e.preventDefault();
  statusTxt.style.display = "block";
  let inputVal = inputField.value.split('').join(' ');
  if(inputVal == captcha.innerText){ 
    statusTxt.style.color = "#4db2ec";
    statusTxt.innerText = "Nice! You don't appear to be a robot.";
    setTimeout(()=>{ 
      removeContent();
      getCaptcha();
    }, 2000);
  }else{
    statusTxt.style.color = "#ff0000";
    statusTxt.innerText = "Captcha not matched. Please try again!";
  }
});

function removeContent(){
 inputField.value = "";
 captcha.innerText = "";
 statusTxt.style.display = "none";
}

</script>

</body>
</html>
