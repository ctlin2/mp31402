<!-- store_user.php -->
<?php
/* https://www.w3schools.com/php/php_mysql_insert.asp */
require("php/cmsdb.php");             /* 載入MySQL連結程式 */
$name = $_POST['custName'];           /* 取得輸入資料, 姓名 */
$email = $_POST['custEmail'];         /* 取得輸入資料, email */
$hashed_password = password_hash($_POST['custPassword'], PASSWORD_DEFAULT);  /* 取得輸入資料, 密碼 */
$tel = $_POST['custTel'];             /* 取得輸入資料, 電話 */
$gender = $_POST['custSex'];          /* 取得輸入資料, 性別 */
$like = implode(",", $_POST['like']);  /* 取得輸入資料, 興趣 */
$sql = "INSERT INTO users (name, email, password, gender, phone, habits)" .
    "VALUES ('{$name}', '{$email}', '{$hashed_password}', '{$gender}', '{$tel}', '{$like}')";

if ($conn->query($sql) === TRUE) {
    header("location:list_users.php"); // 轉頁
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // header("location:member.php");
}

$conn->close();
?>