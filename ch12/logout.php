<?php
  session_start();
  // 儲存以測試使用者是否「已經」登入
    $old_user = $_SESSION['valid_user'];
    unset($_SESSION['valid_user']);
    session_destroy();
    header("location:index.php"); // 轉頁
    exit();
?>