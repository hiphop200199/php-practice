
<?php include("parts/course_order_head.php");?>
<body>
  <div class="container">
    <form action="./course_order_create.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">訂單管理</h2>
<?php if(isset($_GET["error"])) { ?>
<div class="w3-panel w3-pale-red w3-border" style="font-size:1.5rem;"
>
  <?php echo $_GET["error"]; ?>
</div>
<?php } ?>
<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="order_id" type="number" placeholder="訂單編號" value="<?php if(isset($_GET["order_id"])){
        echo ($_GET["order_id"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="order_time" type="datetime-local" placeholder="下訂時間" value="<?php if(isset($_GET["order_time"])){
        echo ($_GET["order_time"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="totalprice" type="number" placeholder="總價" value="<?php if(isset($_GET["totalprice"])){
        echo ($_GET["totalprice"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="member_id" type="number" placeholder="會員編號" value="<?php if(isset($_GET["member_id"])){
        echo ($_GET["member_id"]); } ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" ><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="paid_time" type="datetime-local" title="付款時間" value="<?php if(isset($_GET["paid_time"])){
        echo ($_GET["paid_time"]); } ?>">
    </div>
</div>
</div>
<p class="w3-center">
<button class="w3-button w3-section w3-blue w3-ripple" name="course_order_create"> 新增 </button><a class="w3-button w3-section w3-green w3-ripple" style="margin-left:1vw;" href="course_order_list.php">查詢</a>
</p>
</form>

  </div>

</body>
</html>