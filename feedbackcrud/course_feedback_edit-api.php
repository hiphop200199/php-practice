<?php 
include("db-connection.php") ;
$sql = "UPDATE `course_feedback` SET

`course_feedback`=?,
`course_score`=?
WHERE `course_id`=?";
$course_id = intval($_POST["course_id"]);
 $course_feedback=$_POST["course_feedback"];
 $course_score=$_POST["course_score"];
 
$statement = $conn->prepare($sql);
$statement->execute([
    $course_feedback,
    $course_score,
    $course_id
  ]);
  ?>
  <?php include("./parts/course_feedback_head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container ">
      <div class="api-layout w3-padding w3-center shadowForBoxesLight w3-light-grey  w3-margin">
        <h2 class="w3-center w3-text-deep-orange"><?php echo "修改資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="course_feedback_index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="course_feedback_list.php">查詢</a>
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
</body>

<?php include './parts/course_feedback_foot.php' ?>