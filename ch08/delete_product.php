<!-- delete_product.php -->
<?php
require("php/cmsdb.php");

$sql = "DELETE FROM products WHERE id = '{$_GET['id']}'";
$conn->query($sql);
$conn->close();
header("location:list_product.php?Msg=2"); // 網頁轉址，並帶Msg=2以啟動訊息視窗
exit;
?>