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
    

<div class="container">
    <form  action="course_order_edit-api.php" class="w3-container w3-card-4 w3-light-grey w3-text-deep-orange w3-margin" onsubmit="confirm('確認修改資料?'); " method="post">
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
    <a class="w3-button w3-section w3-blue w3-ripple"  href="course_order_index_.php">首頁</ a>
    <a class="w3-button w3-section w3-green w3-ripple"  href="course_order_list.php">查詢</a>
    <button type="submit" class="w3-button w3-section w3-deep-orange w3-ripple" > 修改 </button>
</div>
</form>

  </div>
</div>

</body>

<?php include './parts/course_order_foot.php' ?>