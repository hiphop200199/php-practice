<?php 

if(isset($_POST["submit"])&&($_FILES["my-image"])){
    include("db-conn.php");
    echo "<pre>";
    print_r($_FILES["my-image"]);
     echo"</pre>";
    $image_name = $_FILES["my-image"]["name"];
    $image_size = $_FILES["my-image"]["size"];
    $temp_name = $_FILES["my-image"]["tmp_name"];//暫存資料夾位置
    $error = $_FILES["my-image"]["error"];

    if($error===0){
        if($image_size>125000){
            $error_message = "sorry, your file is too large.";//檔案大小限制(單位是b)
        header("Location: index.php?$error_message");
        }else{
            //顯示副檔名
            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_extension_lowercase = strtolower($image_extension);
            $allowed_extension = ["jpg", "png", "webp", "svg", "jpeg"]; 
            if(in_array( $image_extension_lowercase ,$allowed_extension)){
                $new_image_name = uniqid("IMG-", true).".".$image_extension_lowercase;//把檔名重新命名成前綴+現在時間的毫秒數+副檔名
                $image_upload_path = "uploads/" . $new_image_name;
                move_uploaded_file($temp_name, $image_upload_path);
                $sql="INSERT INTO images(image_url) VALUES('$new_image_name')";
                $conn->exec($sql);
                header("Location: view.php");
               
            }else{
                $error_message = "you can`t upload files of this type";
                header("Location: index.php?$error_message");
            }
        }
    }else{
        $error_message = "unknown error happened!";
        header("Location: index.php?$error_message");

    }

}else{
    header("Location: index.php");
}

$conn = null;