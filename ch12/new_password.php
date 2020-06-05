<?php
    if (isset($_POST['email']) && isset($_POST['token']) && isset($_POST['password'])) {
        include ("php/cmsdb.php");
        $email = $conn->real_escape_string($_POST['email']); // 避免SQL injection
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $conn->query( "UPDATE users SET password='$password', 
        token=NULL, expired=NULL WHERE email='$email'");

        if (!$result) {
            // 回應 AJAX 狀態代碼與訊息
            exit(json_encode(array("status" => 0, 
            "msg" => '無法重置密碼！可能資料已變更。'))); 
        }
        else {
            exit(json_encode(array("status" => 1, 
            "msg" => '重置密碼成功！')));
        }
    }
    else {
        // 回應 AJAX 狀態代碼與訊息
        exit(json_encode(array("status" => 0, 
        "msg" => '無法重置密碼！資料不完整。'))); 
    }
?>