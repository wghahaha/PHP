<?php

// $name = '张三';

// function test() {
//     // PHP中默认的变量是有作用域的，如果要在函数内部使用函数外的变量，则必须声明为全局变量
//     global $name;
//     echo "你好 $name";  
// }

// test();

// 面向对象编程基础用法

// 定义类：People，单纯定义一个类，本身并不会真正解决问题
class People {
    var $name = '';     // 不再称为变量，而是叫类属性
    var $age = 0;
    var $addr = '';
    var $nation = '';

    // 定义People类所具备的方法，默认情况下，方法的定义与函数完全一致
    function talk() {
        // 在类的定义中, $this 指类的具体实例
        echo "$this->name 正在说话. <br/>";
    }

    function work() {
        echo "$this->name 正在工作. <br/>";
    }
}

// 实例化类People并进行属性和方法的调用
$p1 = new People();
$p1->name = "张三";
$p1->age = 30;
$p1->addr = "成都高新区";
$p1->nation = "汉族";

echo $p1->name . "<br/>";
$p1->talk();

// 一旦完成类的实例化，实例与实例之间并无关系，分布于不同的内存中
$p2 = new People();
$p2->name = "李四";
$p2->age = 25;
$p2->addr = "成都金牛区";
$p2->nation = "藏族";

echo $p2->addr . "<br/>";
$p2->work();

?>