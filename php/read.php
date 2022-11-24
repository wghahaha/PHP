<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 800px;
            margin: auto;
            height: 40px;
        }
    </style>
</head>
<body>
    <?php
    
    $id = $_GET['id'];

    $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
    mysqli_query($conn, "set names utf8");

    $sql = "select * from article where articleid=$id";
    $result = mysqli_query($conn, $sql);

    $article = mysqli_fetch_assoc($result);     // 读取结果集中的第一行数据，并用关联数组展示

    ?>

    <div><?=$article['headline']?></div>
    <div><hr></div>
    <div><?=$article['content']?></div>
</body>
</html>
