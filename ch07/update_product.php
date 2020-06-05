<!-- update_product.php -->
<?php
// var_dump($_POST, $_FILES); // DEBUG
require("php/cmsdb.php");

/* 上傳檔案後基本數據 */
$pic_name = $_FILES['pic']['name'];   // 檔案名稱
$pic_size = $_FILES['pic']['size'];   // 檔案大小
$pic_type = $_FILES['pic']['type'];   // 檔案型態
$pic_tmp = $_FILES['pic']['tmp_name']; // 暫存檔名稱
if(!empty($_FILES['pic']['tmp_name'])){
    /* 以亂數方式，產生圖片檔名 */
    $pic_name = NULL; // TODO
}
else {
    // echo 'No upload';
    $pic_name = $_POST['oldpic'];
}

$query = "UPDATE products SET name=?, category_id=?, model_year=?, list_price=?, picture=? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('siidsi', 
    $_POST['product_name'],
    $_POST['category_id'],
    $_POST['model_year'],
    $_POST['list_price'],
    $pic_name,
    $_POST['product_id']
);
$stmt->execute();
$conn->close();
header("location:list_product.php?cat=".$_POST['category_id']);
exit;
?>