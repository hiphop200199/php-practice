<?php
if(isset($_POST["create"])){
    include("db-connection.php") ;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name=validate($_POST["name"]);
    $teacher=validate($_POST["teacher"]);
    $time=validate($_POST["time"]);
    $price=validate($_POST["price"]);
    $launch_date=validate($_POST["launch-date"]);
    $language=validate($_POST["language"]);
    $subtitle=validate($_POST["subtitle"]);
    $theme = validate($_POST["theme"]);
    $url = validate($_POST["url"]);
    $user_data = "name=" . $name . "&teacher=" . $teacher . "&time=" . $time . "&price=" . $price . "&launch_date=" . $launch_date . "&language=" . $language . "&subtitle=" . $subtitle . "&theme=" . $theme."&url=".$url;

    if(empty($name)){
        header("Location:./index_.php?error=Name is required&$user_data");
    }elseif(empty($teacher)){
        header("Location:./index_.php?error=Teacher is required&$user_data");
    }elseif(empty($time)){
        header("Location:./index_.php?error=Time is required&$user_data");
    }elseif(empty($price)){
        header("Location:./index_.php?error=Price is required&$user_data");
    }elseif(empty($launch_date)){
        header("Location:./index_.php?error=Date is required&$user_data");
    }elseif(empty($language)){
        header("Location:./index_.php?error=Language is required&$user_data");
    }elseif(empty($subtitle)){
        header("Location:./index_.php?error=Subtitle is required&$user_data");
    }elseif(empty($theme)){
        header("Location:./index_.php?error=Theme is required&$user_data");
    } elseif (empty($url)) {
        header("Location:./index_.php?error=url is required&$user_data");
    }else{
        $sql="INSERT INTO course(course_name,course_teacher,course_time,course_price,course_launch_date,course_language,course_subtitle,course_theme,course_url) VALUES(?,?,?,?,?,?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([$name,$teacher,$time,$price,$launch_date,$language,$subtitle,$theme,$url]);
        
    }
}
?>
 <?php include("./parts/head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container ">
      <div class="api-layout w3-padding w3-center  w3-light-grey  w3-margin shadowForBoxesLight">
        <h2 class="w3-center w3-text-blue"><?php echo "新增資料成功!";?></h2>
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