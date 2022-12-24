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
  <div class="container">
  <h2 class="w3-center w3-text-green">課程列表</h2>
    <?php include("./parts/pagination.php");?>
   
    <table class=" w3-container w3-card-4 w3-light-grey  w3-margin ">
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
 
<?php include("./parts/foot.php");?>