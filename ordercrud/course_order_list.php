<?php include ("course_order_read.php");
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ?page=1');
  exit;
}
$perPage = 20;
$rows = [];
$sql = sprintf(
  "SELECT * FROM course_order ORDER BY order_id DESC LIMIT %s, %s",
  ($page - 1) * $perPage,
  $perPage
);
$t_sql = "SELECT COUNT(1) FROM course_order";
// 總筆數
$totalRows = $conn->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 總頁數
$totalPages = ceil($totalRows / $perPage);
$rows = $conn->query($sql)->fetchAll();
include("./parts/course_order_head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container">
  <h2 class="w3-center w3-text-green">訂單列表</h2>
    <?php include("./parts/course_order_pagination.php");?>
   
    <table class=" w3-container w3-card-4 w3-light-grey  w3-margin ">
    <thead>
      <tr class="w3-green w3-center">
          <th>刪除訂單</th>
          <th>訂單編號</th>
          <th>下訂時間</th>
          <th>總價</th>
          <th>會員編號</th>
          <th>付款時間</th>
          <th>編輯訂單</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $r) : ?>
    <tr>
      <td class="w3-center" >
      
                <a href="course_order_delete.php?order_id=<?= $r['order_id'] ?>"
                  onclick="return confirm('確定要刪除這筆資料嗎?')"
                >
                <i class=" w3-text-green material-icons">delete</i>
                </a>
               
       
      </td>
      <td ><?=$r["order_id"]?></td>
      <td ><?=$r["order_time"] ?></td>
      <td ><?=$r["totalprice"]?></td>
      <td ><?=$r["member_id"]?></td>
      <td ><?=$r["paid_time"]?></td>
      <td class="w3-center">
                <a href="course_order_edit.php?order_id=<?= $r['order_id'] ?>">
                        <i class="material-symbols-outlined w3-text-green">
                            edit
                        </i>
                </a>
              </td>
    </tr>
    <?php endforeach ?>
    </tbody>
      
    
    
  </table>
  
  <a class="w3-button  w3-section w3-blue w3-ripple"  href="course_order_index_.php">首頁</a>
   

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
    let tableTh= document.querySelectorAll("table th");
    let tableTd=document.querySelectorAll("table td");
    document.body.classList.add("darkTheme");
    document.querySelector(".navbar-row div").classList.add("shadowForBoxesDark");
    document.querySelector(".navbar-row div").classList.remove("shadowForBoxesLight");
    document.querySelector("table").classList.add("shadowForBoxesDark");
    document.querySelector("table").classList.remove("w3-light-grey");
    document.querySelector("table").classList.remove("shadowForBoxesLight");
    document.querySelector("table").style.backgroundColor="rgb(45, 55, 45)";
    document.querySelector("table").style.borderCollapse="collapse";
    for(let i=0;i<tableTh.length;i++){
      tableTh[i].style.border="1px solid rgb(255, 250, 200)";
    }
    for(let i=0;i<tableTd.length;i++){
      tableTd[i].style.border="1px solid rgb(255, 250, 200)";
    }
    localStorage.setItem("darkTheme","enabled");
}
const disableDarkTheme=()=>{
    let tableTh= document.querySelectorAll("table th");
    let tableTd=document.querySelectorAll("table td");
    document.body.classList.remove("darkTheme");
    document.querySelector(".navbar-row div").classList.remove("shadowForBoxesDark");
    document.querySelector(".navbar-row div").classList.add("shadowForBoxesLight");
    document.querySelector("table").classList.remove("shadowForBoxesDark");
    document.querySelector("table").classList.add("shadowForBoxesLight");
    document.querySelector("table").classList.add("w3-light-grey");
    for(let i=0;i<tableTh.length;i++){
      tableTh[i].style.border="none";
    }
    for(let i=0;i<tableTd.length;i++){
      tableTd[i].style.border="none";
    }
    localStorage.setItem("darkTheme",null);
}  
</script>
<?php include("./parts/course_order_foot.php");?>