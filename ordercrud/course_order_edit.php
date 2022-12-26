<?php
include("db-connection.php") ;


$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if(empty($order_id)){
  header('Location: course_order_list.php');
  exit;
}
$sql = "SELECT * FROM course_order WHERE order_id=$order_id";

$search_result = $conn->query($sql)->fetch();
if(empty($search_result)){
  // 透過編號找不到資料的話
  header('Location: course_order_list.php');
  exit;
}
?>
<?php include("./parts/course_order_head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>  

<div class="container">
    <form  action="course_order_edit-api.php" class="w3-container w3-card-4 w3-light-grey w3-text-deep-orange w3-margin" onsubmit="return confirm('確認修改資料?'); " method="post">
    <input type="hidden" name="order_id" value="<?= $search_result['order_id'] ?>">
<h2 class="w3-center">資料修改</h2>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
    <label for="order_time" class="">下訂時間</label>
      <input id="order_time" class="w3-input w3-border" name="order_time" type="datetime-local"  value="<?= $search_result["order_time"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
    <label for="totalprice" class="">總價</label>
      <input id="totalprice" class="w3-input w3-border" name="totalprice" type="number"  value="<?= $search_result["totalprice"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
    <label for="paid_time" class="">付款時間</label>
      <input id="paid_time" class="w3-input w3-border" name="paid_time" type="datetime-local"  value="<?= $search_result["paid_time"] ?>">
    </div>
</div>

    


<div class="button-container w3-center">
    <a class="w3-button w3-section w3-blue w3-ripple w3-margin"  href="course_order_index_.php">首頁</ a>
    <a class="w3-button w3-section w3-green w3-ripple w3-margin"  href="course_order_list.php">查詢</a>
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
</body>

<?php include './parts/course_order_foot.php' ?>