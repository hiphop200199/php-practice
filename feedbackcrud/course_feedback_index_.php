
<?php include("parts/course_feedback_head.php");?>
<body>
  <div class="container">
    <form action="./course_feedback_create.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
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


  
</div>
<p class="w3-center">
<button class="w3-button w3-section w3-blue w3-ripple" name="course_feedback_create"> 新增 </button><a class="w3-button w3-section w3-green w3-ripple" style="margin-left:1vw;" href="course_feedback_list.php">查詢</a>
</p>
</form>

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
</html>