<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON</title>
    <script>
        function json() {
            // var users = ["张三",  "李四",  "王五",  "赵六",  "田七"];
            // for (var i=0; i<users.length; i++) {
            //     document.write(users[i] + "<br/>");
            // }
            
            // var user1 = {"name":"张三", sex:"男", age:30, phone:"18012345678", addr:"成都"}; 
            // document.write(user1.name);

            // var user1 = {"name":"张三", sex:"男", age:30, phone:"18012345678", addr:"成都"}; 
            // var user2 =  {name:"李四",  sex:"女",  age:25, phone:"13012365659",addr:"重庆"}; 
            // var users = [user1, user2];

            // var users = [{"name":"张三", sex:"男", age:30, phone:"18012345678", addr:"成都"},
            //             {name:"李四",  sex:"女",  age:25, phone:"13012365659",addr:"重庆"}];
            // document.write(users[1]['name']);

            var users =  {user1:["张三","男",30,"18012345678","成都", {province:'四川'}],
			              user2:["李四","女",25,"13012365659","重庆", {province:'重庆'}]};
            // document.write(users.user2[3]);
            document.write(users.user1[5].province);
            
        }
    </script>
</head>
<body>
    <?php
        // 引用common.php，如果之前已经引用则不再引用
        // require_once('common.php');
        // include_once('common.php');
        // $conn = create_connection();
        // $sql = "select articleid, viewcount, createtime from article where articleid < 10";
        // $result = mysqli_query($conn, $sql);
        // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // echo json_encode($data);

        $student01 = array('name'=>'张三', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18812345678');
        $student02 = array('name'=>'李中', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18912345676');
        $student03 = array('name'=>'王九', 'age'=>25, 'addr'=>'成都高新区', 'phone'=>'19812345678');
        $student04 = array('name'=>'赵六', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18112345679');
        $student05 = array('name'=>'周七', 'age'=>27, 'addr'=>'成都高新区', 'phone'=>'18812345978');
        $class01 = array($student01, $student02, $student03, $student04, $student05);

        print_r($class01);
        echo json_encode($class01);     // JSON序列化：将对象转换成字符串

        // JSON反序列化：把一个字符串再转换成对象
        $string = '[{"name":"\u5f20\u4e09","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18812345678"},{"name":"\u674e\u4e2d","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18912345676"},{"name":"\u738b\u4e5d","age":25,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"19812345678"},{"name":"\u8d75\u516d","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18112345679"},{"name":"\u5468\u4e03","age":27,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18812345978"}]';
        $array = json_decode($string);
        print_r($array);
    ?>
</body>
</html>