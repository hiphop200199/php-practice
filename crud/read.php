
<?php
include("db-connection.php") ;

$sql = "SELECT * FROM course ORDER BY course_id DESC";
$statement = $conn->prepare($sql);
$statement->execute();

$result=$statement->setFetchMode(PDO::FETCH_ASSOC);