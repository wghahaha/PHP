<?php

// 先判断用户是否登录并且是否为editor权限
session_start();

if ($_SESSION['islogin'] != 'true' || $_SESSION['role'] != 'editor') {
    die("你无权新增文章");
}

$headline = $_POST['headline'];
$content = $_POST['content'];

$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
mysqli_query($conn, "set names utf8");

$sql = "insert into article(author, headline, content, viewcount, createtime) 
        values('强哥', '$headline', '$content', 0, now())";
mysqli_query($conn, $sql) or die("add-fail");

echo 'add-pass';

mysqli_close($conn);

?>
