<?php
include("database-connection.php");
session_start();
//如果帳號、密碼2個欄位都有輸入
if (isset($_POST["account"]) && isset($_POST["password"])) {
   function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $account=validate($_POST["account"]);
    $password=validate($_POST["password"]);
    if(empty($account)){
        header("Location:loginsite.php?error=account is required");
        exit();
    }elseif(empty($password)){
        header("Location:loginsite.php?error=password is required");
        exit();
    }else{
        $sql = "SELECT * FROM member_data WHERE member_account=? AND member_password=?";//比對輸入的帳密跟會員資料庫
        $stmt = $conn->prepare($sql);
        $stmt->execute([$account,$password]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if($result["member_account"]===$account && $result["member_password"]===$password){
            $_SESSION["member_account"] = $result["member_account"];
            $_SESSION["member_password"] = $result["member_password"];
            $_SESSION["member_id"] = $result["member_id"];
            header("Location:index_.php");
            exit();
        }else{
            header("Location:loginsite.php?error=Incorrect account or password.");
            exit();
        }
    }
}else{
        
        header("Location:loginsite.php");//轉址
        exit();
    }

   
    
    

