<?php

include("db-connection.php") ;

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;



$sql = "DELETE FROM course WHERE course_id=$course_id";
$conn->exec($sql);
$conn = null;

?>



<?php include("./parts/head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container ">
      <div class="api-layout w3-padding w3-center w3-margin shadowForBoxesLight" style="background-color:rgb(235,235,235)">
        <h2 class="w3-center w3-deep-purple w3-text-white w3-padding"><?php echo "刪除資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="list.php">查詢</a>
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
  
    document.body.classList.add("darkTheme");
    document.querySelector("div.api-layout").classList.add("shadowForBoxesDark");
    document.querySelector("div.api-layout").classList.remove("shadowForBoxesLight");
    document.querySelector("div.api-layout").style.backgroundColor="rgb(45, 55, 45)";
    localStorage.setItem("darkTheme","enabled");
}
const disableDarkTheme=()=>{
    document.body.classList.remove("darkTheme");
    document.querySelector("div.api-layout").classList.remove("shadowForBoxesDark");
    document.querySelector("div.api-layout").classList.add("shadowForBoxesLight");
    document.querySelector("div.api-layout").style.backgroundColor="rgb(235,235,235)";
    localStorage.setItem("darkTheme",null);
}  
</script>

<?php include './parts/foot.php' ?>