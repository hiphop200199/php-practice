<?php include ("read.php");
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ?page=1');
  exit;
}
$perPage = 20;
$rows = [];
$sql = sprintf(
  "SELECT * FROM course ORDER BY course_id DESC LIMIT %s, %s",
  ($page - 1) * $perPage,
  $perPage
);
$t_sql = "SELECT COUNT(1) FROM course";
// 總筆數
$totalRows = $conn->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 總頁數
$totalPages = ceil($totalRows / $perPage);
$rows = $conn->query($sql)->fetchAll();
include("./parts/head.php"); ?>
<body>
<span class="material-symbols-outlined lightbulb">
lightbulb
</span>
  <div class="container">
  <h2 class="w3-center w3-text-green">課程列表</h2>
    <?php include("./parts/pagination.php");?>
    
      
    <table class=" w3-container  w3-light-grey  w3-margin shadowForBoxesLight ">
    <thead>
      <tr class="w3-green w3-center">
          <th>刪除課程</th>
          <th>課程編號</th>
          <th>課程名稱</th>
          <th>課程講師</th>
          <th>課程時數</th>
          <th>課程價格</th>
          <th>課程上架日期</th>
          <th>課程語言</th>
          <th>課程字幕</th>
          <th>課程主題</th>
          <th>課程連結</th>
          <th>編輯課程</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $r) : ?>
    <tr>
      <td class="w3-center" >
      
                <a href="delete.php?course_id=<?= $r['course_id'] ?>"
                  onclick="return confirm('確定要刪除這筆資料嗎?')"
                >
                <i class=" w3-text-green material-icons">delete</i>
                </a>
               
       
      </td>
      <td ><?=$r["course_id"]?></td>
      <td ><?=$r["course_name"] ?></td>
      <td ><?=$r["course_teacher"]?></td>
      <td ><?=$r["course_time"]?></td>
      <td ><?=$r["course_price"]?></td>
      <td ><?=$r["course_launch_date"]?></td>
      <td ><?=$r["course_language"]?></td>
      <td ><?=$r["course_subtitle"]?></td>
      <td ><?=$r["course_theme"]?></td>
      <td ><?=$r["course_url"]?></td>
      <td class="w3-center">
                <a href="edit.php?course_id=<?= $r['course_id'] ?>">
                        <i class="material-symbols-outlined w3-text-green">
                            edit
                        </i>
                </a>
              </td>
    </tr>
    <?php endforeach ?>
    </tbody>
      
    
    
  </table>
  
  <a class="w3-button  w3-section w3-blue w3-ripple"  href="index_.php">首頁</a>
   

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
<?php include("./parts/foot.php");?>