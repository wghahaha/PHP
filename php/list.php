<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <title><?php echo date("Y-m-d H:i:s"); ?></title>
    <style>
        table {
            width: 800px;
            margin: auto;
            border: solid 1px green;
            border-spacing: 0px;
        }
        td {
            border: solid 1px gray;
            height: 30px;
        }
    </style>
    <script>
        function doDelete(articleid) {
            if (!window.confirm("你确定要删除该文章吗?")) {
                return false;
            }

            $.post('delete.php', 'articleid='+articleid, function(data){
                if (data == 'delete-ok') {
                    window.alert('删除成功');
                    // location.href = "list.php";
                    location.reload();  // 刷新当前页面
                }
                else {
                    window.alert('删除失败' + data);
                }
            });
        }
    </script>
</head>
<body>
    <table>
        <tr>
            <td>编号</td>
            <td>作者</td>
            <td>标题</td>
            <td>次数</td>
            <td>时间</td>
            <td>操作</td>
        </tr>

    <?php

    // session_start();

    // if ($_SESSION['islogin'] != 'true') {
    //     die ("请先登录.");
    // }

    $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
    mysqli_query($conn, "set names utf8");

    $sql = "select articleid, author, headline, viewcount, createtime from article where articleid < 31";
    $result = mysqli_query($conn, $sql);

    // 将数据库查询的结果集中的数据取出，保存到一个数组中
    $rows = mysqli_fetch_all($result);
    // mysqli_fetch_all 默认使用索引数组，也可以设定参数强制使用关联数组
    // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // 遍历结果集数据并输出到页面中
    // foreach ($rows as $row) {
    //     echo $row[0] . ' - ' . $row[1] . ' - '. $row[2] . "<br/>";
    // }

    // 遍历结果集数据并在表格中展示
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td><a href="read.php?id=' . $row[0] . '">' . $row[2] . '</a></td>';
        echo '<td>' . $row[3] . '</td>';
        echo '<td>' . $row[4] . '</td>';
        echo '<td><button onclick="doDelete('.$row[0].')">删除</button><button>编辑</button></td>';
        // echo '<td><a href="delete.php?articleid='.$row[0].'">删除</a></td>';
        echo '</tr>';
    }

    mysqli_close($conn);
    ?>

    </table>
</body>
</html>

<!-- 
1、完善登录过程，完善验证码的验证
2、设计一个新页面，实现用户的注册（用户名不能重复，如果可能，可以试着上传一张头像）
3、实现文章列表的页面，同时在该页面中添加“删除”按钮，用AJAX完成对文章的删除
4、实现read.php的文章阅读页面，可以参考woniunote.com
5、实现一个新页面，可以新增一篇文章
 -->
