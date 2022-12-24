
<?php include("parts/head.php");?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container">
    
    <form action="./create.php" method="post" class="w3-container shadowForBoxesLight w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">課程管理</h2>
<?php if(isset($_GET["error"])) { ?>
<div class="w3-panel w3-pale-red w3-border" style="font-size:1.5rem;"
>
  <?php echo $_GET["error"]; ?>
</div>
<?php } ?>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="課程名稱" value="<?php if(isset($_GET["name"])){
        echo ($_GET["name"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="teacher" type="text" placeholder="講師" value="<?php if(isset($_GET["teacher"])){
        echo ($_GET["teacher"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="time" type="number" placeholder="時數" value="<?php if(isset($_GET["time"])){
        echo ($_GET["time"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="price" type="number" placeholder="價格" value="<?php if(isset($_GET["price"])){
        echo ($_GET["price"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="launch-date" type="date" title="上架日期" value="<?php if(isset($_GET["launch_date"])){
        echo ($_GET["launch_date"]); } ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="language" type="text" placeholder="語言" value="<?php if(isset($_GET["language"])){
        echo ($_GET["language"]); } ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="subtitle" type="text" placeholder="字幕" value="<?php if(isset($_GET["subtitle"])){
        echo ($_GET["subtitle"]); } ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="theme" type="text" placeholder="主題" value="<?php if(isset($_GET["theme"])){
        echo ($_GET["theme"]); } ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="url" type="text" placeholder="課程連結" value="<?php if(isset($_GET["url"])){
        echo ($_GET["url"]); } ?>">
    </div>
</div>
<p class="w3-center">
<button class="w3-button w3-section w3-blue w3-ripple" name="create"> 新增 </button><a class="w3-button w3-section w3-green w3-ripple" style="margin-left:1vw;" href="list.php">查詢</a>
</p>
</form>

  </div>
<script>
  let darkTheme=localStorage.getItem("darkTheme");
  let bulb=document.querySelector(".lightbulb");
  bulb.addEventListener("click",()=>{
    darkTheme=localStorage.getItem("darkTheme");
    if(darkTheme!=="enabled"){
        enableDarkTheme();
    }else{
        disableDarkTheme();
    }   
 });
const enableDarkTheme=()=>{
  let inputBoxes=document.querySelectorAll(".w3-input");
  let inputPlaceholders=document.querySelectorAll("::placeholder");
    document.body.classList.add("darkTheme");
    for(let i=0;i<inputBoxes.length;i++){
      inputBoxes[i].style.backgroundColor="rgb(15, 19, 15)";
      inputBoxes[i].style.color="rgb(255,250,200)"
    }
    for(let i=0;i<inputBoxes.length;i++){
      inputBoxes[i].classList.add("shadowForBoxesDark");
    }
    for(let i=0;i<inputPlaceholders.length;i++){
      inputPlaceholders[i].style.color="rgb(255,250,200)";
    }
    document.querySelector("form").classList.add("shadowForBoxesDark");
    document.querySelector("form").classList.remove("w3-light-grey");
    document.querySelector("form").classList.remove("shadowForBoxesLight");
    document.querySelector("form").style.backgroundColor="rgb(45, 55, 45)";
    localStorage.setItem("darkTheme","enabled");
}
const disableDarkTheme=()=>{
    let inputBoxes=document.querySelectorAll(".w3-input");
    let inputPlaceholders=document.querySelectorAll("::placeholder");
    document.body.classList.remove("darkTheme");
    for(let i=0;i<inputBoxes.length;i++){
        inputBoxes[i].style.backgroundColor="rgb(255,255,255)";
        inputBoxes[i].style.color="rgb(100,100,100)";
      }
    for(let i=0;i<inputBoxes.length;i++){
      inputBoxes[i].classList.remove("shadowForBoxesDark");
    }
    for(let i=0;i<inputPlaceholders.length;i++){
      inputPlaceholders[i].style.color="rgb(100,100,100)";
    }
    document.querySelector("form").classList.remove("shadowForBoxesDark");
    document.querySelector("form").classList.add("shadowForBoxesLight");
    document.querySelector("form").classList.add("w3-light-grey");
    localStorage.setItem("darkTheme",null);
}  
</script>
</body>
</html>