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
  <div class="container ">
      <div class="api-layout w3-padding w3-center w3-card-4 w3-light-grey  w3-margin">
        <h2 class="w3-center w3-blue w3-text-white w3-padding"><?php echo "新增資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="ccourse_feedback_index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="course_feedback_list.php">查詢</a>
    </div>
  </div>

</body>

<?php include './parts/course_feedback_foot.php' ?>