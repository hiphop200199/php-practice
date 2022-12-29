<?php include("db-conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
        min-height: 100vh;
    }
        .alb{
            width: 200px;
            height: 250px;
            padding: 5px;
        }
        .alb img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <a href="index.php">&#8592;</a>
    <?php 
    $stmt=$conn->prepare("SELECT * FROM images ORDER BY id DESC");
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (($stmt->fetchAll()) as $images) { ?>
        <div class="alb">
        <img src="uploads/<?= $images['image_url'] ?>">
        </div>
     <?php }    ?>

?>
</body>
</html>