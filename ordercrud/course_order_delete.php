<?php

include("db-connection.php") ;

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;



$sql = "DELETE FROM course_order WHERE order_id=$order_id";
$conn->exec($sql);
$conn = null;

?>



<?php include("./parts/course_order_head.php"); ?>
<body>
  <div class="container ">
      <div class="api-layout w3-padding w3-center w3-card-4 w3-light-grey  w3-margin">
        <h2 class="w3-center w3-deep-purple w3-text-white w3-padding"><?php echo "刪除資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="course_order_index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="course_order_list.php">查詢</a>
    </div>
  </div>

</body>

<?php include './parts/course_order_foot.php' ?>