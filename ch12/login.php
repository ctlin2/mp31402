<?php require("php/layout_head.php"); ?>

<?php
include("php/cmsdb.php");
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    // 當使用者才剛試過登入時
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $query = "select password from users where name='" . $user_name."'"; // 查詢用戶資料表

    $result = $conn->query($query);
    if ($result->num_rows){                           // 若有此用戶
        $hash = $result -> fetch_assoc()["password"]; // 從用戶資料表取得的雜湊密碼
        if (password_verify($_POST['password'], $hash)) {  // 比對雜湊密碼
            // 如果是在資料庫中有註冊的使用者
            $_SESSION['valid_user'] = $user_name;
            header("location:index.php"); // 轉頁
            exit();
        }
    }

    $result -> free_result();
    $conn->close();
}
?>

<!-- 版身開始 -->
<div class="bodyArea">
    <div class="body-L">
        <!-- 選單開始 -->
        <?php require("php/layout_sel.php"); ?>
        <!-- 選單結束 -->
    </div><!-- body-L End -->
    <div class="body-R">
        <!-- 版身內容開始 -->
        <?php
        if (isset($_SESSION['valid_user'])) { // 開始-判斷已經登入了沒
            echo '<p>您('.$_SESSION['valid_user'].')已經登入</p><br />';
        } 
        else {
            if (isset($user_name)){
                // 如果使用者試著登入並且失敗了
                echo '<p>帳號或密碼不正確，無法登入！</p><br />';
            }
            else {
                echo '<p>您尚未登入</p><br />';
                // 提供表單來登入
            }
        ?>
        <!-- 會員登入 -->
        <div class="mrform">
            <form id="mrLogin" class="formsty" method="POST" action="login.php">
                <li class="mrtit">會員登入</li>
                <li>登入帳號：<input type="text" name="user_name" id="username" style="width:95%;"></li>
                <li>登入密碼：<input type="password" name="password" id="passowrd" style="width:95%;"></li>
                <li class="mrbtn" id="mrin">
                    <button class="formbtn mrformL" type="submit" name="login" id="mrBtnIn" >會員登入</button>
                    <a class="btnmrGet mrformR" id="mrBtnGet" href="forgot_password.php">忘記密碼</a>
                </li>
            </form>
        </div><!-- mrformL End -->
        <?php
        } // 結束—判繼已經登入了沒
        ?>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>