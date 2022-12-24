<?php
if(isset($_POST["course_order_create"])){
    include("db-connection.php") ;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $order_id=validate($_POST["order_id"]);
    $order_time=validate($_POST["order_time"]);
    $totalprice=validate($_POST["totalprice"]);
    $member_id=validate($_POST["member_id"]);
    $paid_time=validate($_POST["paid_time"]);
    
    $user_data = "order_id=" . $order_id . "&order_time=" . $order_time . "&totalprice=" . $totalprice . "&member_id=" . $member_id . "&paid_time=" . $paid_time ;

    if(empty($order_id)){
        header("Location:./course_order_index_.php?error=Order_id is required&$user_data");
    }elseif(empty($order_time)){
        header("Location:./course_order_index_.php?error=Order_time is required&$user_data");
    }elseif(empty($totalprice)){
        header("Location:./course_order_index_.php?error=Totalprice is required&$user_data");
    }elseif(empty($member_id)){
        header("Location:./course_order_index_.php?error=Member_id is required&$user_data");
    }elseif(empty($paid_time)){
        header("Location:./course_order_index_.php?error=Paid_time is required&$user_data");
    }else{
        $sql="INSERT INTO course_order(order_id,
        order_time,
        totalprice,
        member_id,
       paid_time
        ) VALUES(?,?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([ $order_id,$order_time,$totalprice,$member_id,$paid_time ]);
    }
}
?>
<?php include("./parts/course_order_head.php"); ?>
<body>
  <div class="container ">
      <div class="api-layout w3-padding w3-center w3-card-4 w3-light-grey  w3-margin">
        <h2 class="w3-center w3-blue w3-text-white w3-padding"><?php echo "新增資料成功!";?></h2>
        <a class=" w3-button w3-section w3-blue w3-ripple"  href="course_order_index_.php">首頁</a>
      <a class=" w3-button w3-section w3-green w3-ripple"  href="course_order_list.php">查詢</a>
    </div>
  </div>

</body>

<?php include './parts/course_order_foot.php' ?>