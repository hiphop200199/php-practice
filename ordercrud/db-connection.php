


  <?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $database_name = "my_team_project";


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
 
