<?php

$articleid = $_POST['articleid'];

// 直接删除，通常情况下，不建议这样做
$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
mysqli_query($conn, "delete from article where articleid=$articleid") or die ("delete-fail");
echo 'delete-ok';

// 通常在进行删除操作时，会使用软删除：回收站、设定列标识

?>