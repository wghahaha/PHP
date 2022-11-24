<?php
$students = array("李源远","王佳乐","李园翔","刘俊","冉攀","邹松鹤","陈凯","王一清","胡涛","李云颢","张先发","王淼",
             "徐志豪","张霖","崇青平","范金辉","李浩民","王昀东","张亚飞","何思成","王亮","张良","翁通达","廖志凌");

// 取数组的长度
$len = count($students);
echo $len . "<br/>";

// 通过下标取值，在PHP中，下标从0开始
echo $students[1] . "<br/>";

// 修改数组的某一个值
$students[6] = "陈小凯";

// 打印数组的内容
print_r($students);
echo '<p/>';

// 删除最后一个值
array_pop($students);
print_r($students);
echo '<p/>';

// 随机取一个下标
// $index = array_rand($students, 1);
// echo $students[$index] . "<br/>";

// 使用原始的随机数生成器，也可以实现随机点名
// echo rand(5, 10);   // 生成 [5, 10] 范围的随机整数

// $index  = rand(0, count($students)-1);
// echo $students[$index] . "<br/>";

// 数组的遍历：使用循环生成下标的方式
// for ($i=0; $i<count($students); $i++) {
//     echo $students[$i] . "<br/>";
// }

// 数组的遍历：foreach遍历
foreach ($students as $stu) {
    echo $stu . "<br/>";
}

// 数组去重
$grade = array(87, 95, 38, 59, 67, 49, 99, 82, 59, 99, 67, 73);
$new = array_unique($grade);
print_r($new);
echo '<p/>';

// 排序
$grade = array(87, 95, 38, 59, 67, 49, 99, 82, 59, 98, 67, 73);
rsort($grade);
foreach ($grade as $g) {
    echo $g . "<br/>";
}
echo '====================================================<p/>';

// 关联数组：以key=>value组成的键值对，取值的时候用key来取值，而不是下标
// 索引数组的key就是0、1、2、3这种数字
$student01 = array('name'=>'张三', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18812345678');
$student02 = array('name'=>'李中', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18912345676');
$student03 = array('name'=>'王九', 'age'=>25, 'addr'=>'成都高新区', 'phone'=>'19812345678');
$student04 = array('name'=>'赵六', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18112345679');
$student05 = array('name'=>'周七', 'age'=>27, 'addr'=>'成都高新区', 'phone'=>'18812345978');

print_r($student01);
echo "<br/>";

echo $student01['name']. "<br/>";
$student01['addr'] = '成都天府新区';
// 遍历数组的value
foreach ($student01 as $stu) {
    echo $stu . "<br/>";
}
// 遍历数组的key和value
foreach($student02 as $key=>$value) {
    echo $key . "====" . $value . "<br/>";
}

$keys = array_keys($student03);
foreach($keys as $key) {
    echo $student03[$key] . "<br/>";
}

//====================================================================
// 补充4个重要的数组相关函数
echo end($student05) . "<br/>";     // 直接取最后一个值，无所谓是哪种数组
if (in_array('周八', $student05)) {
    echo "在<br/>";
}

// 把字符串打散为数组。
$source = "Typora.exe#9284#Console#1#92680K";
$myarray = explode("#", $source);
print_r($myarray);
echo '<br/>';

// 把数组合并成字符串
$grade = array(87, 95, 38, 59, 67, 49, 99, 82, 59, 98, 67, 73);
$result = implode(",", $grade);
echo $result . "<br/>";

// =================================================================
$student01 = array('name'=>'张三', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18812345678');
$student02 = array('name'=>'李四', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18912345676');
$student03 = array('name'=>'王九', 'age'=>25, 'addr'=>'成都高新区', 'phone'=>'19812345678');
$student04 = array('name'=>'赵六', 'age'=>30, 'addr'=>'成都高新区', 'phone'=>'18112345679');
$student05 = array('name'=>'周七', 'age'=>27, 'addr'=>'成都高新区', 'phone'=>'18812345978');

// 二维数组
$class01 = array($student01, $student02, $student03, $student04, $student05);
echo $class01[1]['name'];   // 李四

?>