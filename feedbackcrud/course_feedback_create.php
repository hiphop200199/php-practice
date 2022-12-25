<?php
if(isset($_POST["course_feedback_create"])){
    include("db-connection.php") ;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $course_id=validate($_POST["course_id"]);
    $member_id=validate($_POST["member_id"]);
    $course_feedback=validate($_POST["course_feedback"]);
    $course_score=validate($_POST["course_score"]);
    
    $user_data = "course_id=" . $course_id . "&member_id=" . $member_id . "&course_feedback=" . $course_feedback . "&course_score=".$course_score;

    if(empty($course_id)){
        header("Location:./course_feedback_index_.php?error=Course_id is required&$user_data");
    }elseif(empty($member_id)){
        header("Location:./course_feedback_index_.php?error=Member_id is required&$user_data");
    }elseif(empty($course_feedback)){
        header("Location:./course_feedback_index_.php?error=Course_feedback is required&$user_data");
    }elseif(empty($course_score)){
        header("Location:./course_feedback_index_.php?error=Course_score is required&$user_data");
    }else{
        $sql="INSERT INTO course_feedback(course_id,member_id,     course_feedback,
        course_score) VALUES(?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([$course_id,$member_id,$course_feedback,
        $course_score]);
    }
}
?>
<?php include("./parts/course_feedback_head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container ">
      <div class="api-layout w3-padding w3-center shadowForBoxesLight w3-light-grey  w3-margin">
        <h2 class="w3-center w3-blue w3-text-white w3-padding"><?php echo "新增資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="ccourse_feedback_index_.php">首頁</a>
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

<?php include './parts/course_feedback_foot.php' ?>