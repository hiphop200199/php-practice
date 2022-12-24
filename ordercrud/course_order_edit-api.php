<?php 
include("db-connection.php") ;
$sql = "UPDATE `course_order` SET
`order_time`=?,
`totalprice`=?,
`paid_time`=?
WHERE `order_id`=?";
 $order_id=intval($_POST["order_id"]);
 $order_time=$_POST["order_time"];
 $totalprice=$_POST["totalprice"];
 $paid_time=$_POST["paid_time"];
$statement = $conn->prepare($sql);
$statement->execute([
 
  $order_time,
  $totalprice,
  $paid_time,
   $order_id
  ]);
  ?>
  <?php include("./parts/course_order_head.php"); ?>
<body>
  <div class="container ">
      <div class="api-layout w3-padding w3-center w3-card-4 w3-light-grey  w3-margin">
        <h2 class="w3-center w3-text-deep-orange"><?php echo "修改資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="course_order_index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="course_order_list.php">查詢</a>
    </div>
  </div>

</body>

<?php include './parts/course_order_foot.php' ?>