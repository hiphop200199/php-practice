<?php
include("db-connection.php") ;


$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if(empty($course_id)){
  header('Location: list.php');
  exit;
}
$sql = "SELECT * FROM course WHERE course_id=$course_id";

$search_result = $conn->query($sql)->fetch();
if(empty($search_result)){
  // 透過編號找不到資料的話
  header('Location: list.php');
  exit;
}
?>
<?php include("./parts/head.php"); ?>
<body>
    
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
<div class="container">
    <form  action="edit-api.php" class="w3-container w3-card-4 w3-light-grey w3-text-deep-orange w3-margin" onsubmit="confirm('確認修改資料?'); " method="post">
    <input type="hidden" name="course_id" value="<?= $search_result['course_id'] ?>">
<h2 class="w3-center">資料修改</h2>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程名稱</label>
      <input id="name" class="w3-input w3-border" name="name" type="text"  value="<?= $search_result["course_name"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程講師</label>
      <input class="w3-input w3-border" name="teacher" type="text"  value="<?= $search_result["course_teacher"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程時數</label>
      <input class="w3-input w3-border" name="time" type="number"  value="<?= $search_result["course_time"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程價格</label>
      <input class="w3-input w3-border" name="price" type="number"  value="<?= $search_result["course_price"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="name" class="">上架日期</label>
      <input class="w3-input w3-border" name="launch-date" type="date"  value="<?= $search_result["course_launch_date"] ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程語言</label>
      <input class="w3-input w3-border" name="language" type="text" value="<?= $search_result["course_language"] ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程字幕</label>
      <input class="w3-input w3-border" name="subtitle" type="text"  value="<?= $search_result["course_subtitle"] ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程主題</label>
      <input class="w3-input w3-border" name="theme" type="text"  value="<?= $search_result["course_theme"] ?>">
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="name" class="">課程連結</label>
      <input class="w3-input w3-border" name="url" type="text"  value="<?= $search_result["course_url"] ?>">
    </div>
</div>

<div class="button-container w3-center">
    <a class="w3-button w3-section w3-blue w3-ripple w3-margin"  href="index_.php">首頁</ a>
    <a class="w3-button w3-section w3-green w3-ripple w3-margin"  href="list.php">查詢</a>
    <button type="submit" class="w3-button w3-section w3-deep-orange w3-ripple w3-margin" > 修改 </button>
</div>
</form>

  </div>
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

<?php include './parts/foot.php' ?>