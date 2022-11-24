<?php

require_once "common.php";

// $db = new DB();     // 实例化时，会自动调用构造方法
// $db->host = '127.0.0.1';
// $db->username = 'root';
// $db->password = '123456';
// $db->database = 'learn';
// $db = new DB('127.0.0.1', 'root', '123456', 'learn');


// $rows = $db->query("select articleid, headline from article where articleid<11");
// print_r($rows);
// echo "<br/>";

// $db->modify("update article set headline='你好新标题' where articleid=9");

// mysqli_close($db->conn);    // 不能直接通过类实例引用类中方法中局部变量，除非它是一个类的public属性


// $name = "张三";          // 定义变量
// echo serialize($name);  // 序列化后的值：s:6:"张三";
// echo unserialize('s:6:"张三";');


// 针对数组的序列化和反序列化
// $student = array('name'=>'张三', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18812345678');
// echo serialize($student);

// $source = 'a:4:{s:4:"name";s:9:"张三娃";s:3:"age";i:30;s:4:"addr";s:15:"成都高新区";s:5:"phone";s:11:"18812345679";}';
// $student = unserialize($source);    // 将字符串反序列化为数组
// print_r($student);


// 针对类实例的序列化与反序列化
$db = new DB();
$db->host = '192.168.112.188';
echo serialize($db);
echo "<br/>";

$source = 'O:2:"DB":4:{s:4:"host";s:9:"127.0.0.1";s:8:"username";s:4:"root";s:8:"password";s:6:"123456";s:8:"database";s:5:"learn";}';
$db = unserialize($source);
$rows = $db->query("select articleid, headline from article where articleid<11");
print_r(($rows));

?>