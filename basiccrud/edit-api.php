<?php 
include("db-connection.php") ;
$sql = "UPDATE `course` SET
`course_name`=?,
`course_teacher`=?,
`course_time`=?,
`course_price`=?,
`course_launch_date`=?,
`course_language`=?,
`course_subtitle`=?,
`course_theme`=?,
`course_url`=?
WHERE `course_id`=?";
$course_id = intval($_POST["course_id"]);
 $name=$_POST["name"];
 $teacher=$_POST["teacher"];
 $time=$_POST["time"];
 $price=$_POST["price"];
 $launch_date=$_POST["launch-date"];
 $language=$_POST["language"];
 $subtitle=$_POST["subtitle"];
 $theme =$_POST["theme"];
$url = $_POST["url"];
$statement = $conn->prepare($sql);
$statement->execute([
    $name,
    $teacher,
    $time,
    $price,
    $launch_date,
    $language,
    $subtitle,
    $theme,
    $url,
    $course_id
  ]);
  ?>
  <?php include("./parts/head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container ">
      <div class="api-layout w3-padding w3-center shadowForBoxesLight w3-margin" style="background-color:rgb(235,235,235)">
        <h2 class="w3-center w3-text-deep-orange"><?php echo "修改資料成功!";?></h2>
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