<?php

// 设置使用中国北京时间作为时区
date_default_timezone_set("PRC");

$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");

$username = $_POST['username'];
$password = $_POST['password'];
$tmpPath = $_FILES['photo']['tmp_name'];    // 获取文件的临时路径
$fileName = $_FILES['photo']['name'];       // 获取文件的原始文件名

$sql = "select username from user where username='$username'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count >= 1) {
    die('user-exists');
}

// 上传文件，从临时路径移动到指定路径
// move_uploaded_file($tmpPath, './upload/'.$fileName) or die('文件上传失败');

// 使用时间戳对上传文件进行重命名
$newName = date('Ymd_His.') . end(explode(".", $fileName));
move_uploaded_file($tmpPath, './upload/'.$newName) or die('文件上传失败');

$now = date('Y-m-d H:i:s');
$sql = "insert into user(username, password, avatar, createtime) values('$username', '$password', '$newName', '$now')";
mysqli_query($conn, $sql) or die('reg-fail');
mysqli_close($conn);

echo 'reg-pass';

?>