<?php
include("db-connection.php") ;


$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if(empty($course_id)){
  header('Location: course_feedback_list.php');
  exit;
}
$sql = "SELECT * FROM course_feedback WHERE course_id=$course_id";

$search_result = $conn->query($sql)->fetch();
if(empty($search_result)){
  // 透過編號找不到資料的話
  header('Location: course_feedback_list.php');
  exit;
}
?>
<?php include("./parts/course_feedback_head.php"); ?>
<body>
    

<div class="container">
    <form  action="course_feedback_edit-api.php" class="w3-container w3-card-4 w3-light-grey w3-text-deep-orange w3-margin" onsubmit="confirm('確認修改資料?'); " method="post">
    <input type="hidden" name="course_id" value="<?= $search_result['course_id'] ?>">
<h2 class="w3-center">資料修改</h2>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <label for="feedback">課程回饋</label>
      <textarea id="feedback" class="w3-input w3-border" name="course_feedback"  ><?= $search_result["course_feedback"] ?>
    </textarea>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
    <label for="score" class="">課程評點</label>
      <input id="score" class="w3-input w3-border" name="course_score" type="range" min="0" max="5" step="0.1"  value="<?= $search_result["course_score"] ?>">
      <p>評分:<span id="show-score"></span></p>
    </div>
</div>



   


<div class="button-container w3-center">
    <a class="w3-button w3-section w3-blue w3-ripple w3-margin"  href="course_feedback_index_.php">首頁</ a>
    <a class="w3-button w3-section w3-green w3-ripple w3-margin"  href="course_feedback_list.php">查詢</a>
    <button type="submit" class="w3-button w3-section w3-deep-orange w3-ripple w3-margin" > 修改 </button>
</div>
</form>

  </div>
</div>
<script>  
  let rangeSlide=document.getElementById("score"); 
  let showScore=document.getElementById("show-score");
  showScore.innerHTML=rangeSlide.value;
rangeSlide.oninput=function(){
  showScore.innerHTML=this.value;
}
</script>
</body>

<?php include './parts/course_feedback_foot.php' ?>