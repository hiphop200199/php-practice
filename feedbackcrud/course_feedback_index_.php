
<?php include("parts/course_feedback_head.php");?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container">
    <form action="./course_feedback_create.php" method="post" class="w3-container shadowForBoxesLight w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">課程回饋</h2>
<?php if(isset($_GET["error"])) { ?>
<div class="w3-panel w3-pale-red w3-border" style="font-size:1.5rem;"
>
  <?php echo $_GET["error"]; ?>
</div>
<?php } ?>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="course_id" type="number" placeholder="課程編號" value="<?php if(isset($_GET["course_id"])){
        echo ($_GET["course_id"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="member_id" type="number" placeholder="會員編號" value="<?php if(isset($_GET["member_id"])){
        echo ($_GET["member_id"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <textarea class="w3-input w3-border"   name="feedback"  placeholder="課程回饋"  value="<?php if(isset($_GET["feedback"])){
        echo ($_GET["feedback"]); } ?>"></textarea>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <label for="score">課程評點</label>
      <input id="score" class="w3-input w3-border" name="score" type="range" min="0" max="5" step="0.1"   value="<?php if(isset($_GET["score"])){
        echo ($_GET["score"]); } ?>">
        <p>評分:<span id="show-score"></span></p>
    </div>
</div>
<p class="w3-center">
<button class="w3-button w3-section w3-blue w3-ripple" name="course_feedback_create"> 新增 </button><a class="w3-button w3-section w3-green w3-ripple" style="margin-left:1vw;" href="course_feedback_list.php">查詢</a>
</p>

  
</div>

</form>

  </div>
<script>  
  let rangeSlide=document.getElementById("score"); 
  let showScore=document.getElementById("show-score");
  showScore.innerHTML=rangeSlide.value;
rangeSlide.oninput=function(){
  showScore.innerHTML=this.value;
}
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