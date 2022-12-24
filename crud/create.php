<?php
if(isset($_POST["create"])){
    include("db-connection.php") ;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name=validate($_POST["name"]);
    $teacher=validate($_POST["teacher"]);
    $time=validate($_POST["time"]);
    $price=validate($_POST["price"]);
    $launch_date=validate($_POST["launch-date"]);
    $language=validate($_POST["language"]);
    $subtitle=validate($_POST["subtitle"]);
    $theme = validate($_POST["theme"]);
    $url = validate($_POST["url"]);
    $user_data = "name=" . $name . "&teacher=" . $teacher . "&time=" . $time . "&price=" . $price . "&launch_date=" . $launch_date . "&language=" . $language . "&subtitle=" . $subtitle . "&theme=" . $theme."&url=".$url;

    if(empty($name)){
        header("Location:./index_.php?error=Name is required&$user_data");
    }elseif(empty($teacher)){
        header("Location:./index_.php?error=Teacher is required&$user_data");
    }elseif(empty($time)){
        header("Location:./index_.php?error=Time is required&$user_data");
    }elseif(empty($price)){
        header("Location:./index_.php?error=Price is required&$user_data");
    }elseif(empty($launch_date)){
        header("Location:./index_.php?error=Date is required&$user_data");
    }elseif(empty($language)){
        header("Location:./index_.php?error=Language is required&$user_data");
    }elseif(empty($subtitle)){
        header("Location:./index_.php?error=Subtitle is required&$user_data");
    }elseif(empty($theme)){
        header("Location:./index_.php?error=Theme is required&$user_data");
    } elseif (empty($url)) {
        header("Location:./index_.php?error=url is required&$user_data");
    }else{
        $sql="INSERT INTO course(course_name,course_teacher,course_time,course_price,course_launch_date,course_language,course_subtitle,course_theme,course_url) VALUES(?,?,?,?,?,?,?,?,?) ";
        $statement = $conn->prepare($sql);
        $statement->execute([$name,$teacher,$time,$price,$launch_date,$language,$subtitle,$theme,$url]);
        echo "新增資料成功!";
    }
}