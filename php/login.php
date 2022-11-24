<?php

/**
 * 获取请求数据的方式：
 * GET: http://localhost/learn/php/login.php?username=woniu&password=123456&vcode=0000
 * POST: http://localhost/learn/php/login.php + 请求正文
 */

// 前端用GET请求发，后台用$_GET函数取，前端用POST请求发，后台用$_POST函数取

// $username = $_GET['username'];
// $password = $_GET['password'];
// $vcode = $_GET['vcode'];

$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];

// echo $username . '-' . $password . '-' . $vcode;

/**
 * 验证码的验证过程应该先于数据库操作（用户名和密码的验证）
 */
if ($vcode !== '0000') {
    die("vcode-error");
}

/**
 * 在PHP中如何访问MySQL数据库？MySQLi和PDO
 * 1. 连接到MySQL数据库
 * 2. 执行SQL语句（CRUD）
 * 3. 处理SQL语句的结果
 * 4. 关闭数据库连接
 * 事实上，所有的I/O操作，都需要实现打开和关闭的两个基本操作：文件读写、网络访问、数据库访问
 */

$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");

// 设置编码格式的两种方式
mysqli_query($conn, "set names utf8");  
mysqli_set_charset($conn, 'utf8');

// 拼接SQL语句并执行它
$sql = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($conn, $sql);    // $result获取到的查询结果，称结果集

if (mysqli_num_rows($result) == 1) {
    // 登录成功后，对当前客户端的分配一个Session ID，同时在服务器端记住当前客户端的登录状态
    session_start();    // 启用PHP的Session模块，为客户端生成唯一标识 PHPSESSID
    $_SESSION['islogin'] = 'true';
    // 登录成功后，取得当前登录用户的用户名和角色，进而判断是否有权限新增文章
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    echo "login-pass";
}
else {
    echo "login-fail";
}

// 关闭数据库
mysqli_close($conn);

?>