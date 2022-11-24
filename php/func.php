<?php

/**
 * 1、基本的构成
*（1）函数名：函数名称不能重复，名称必须可读性强，最好是动词或者动名词形式
*（2）函数可以有参数：形参和实参
*（3）函数有处理过程，函数体
*（4）函数可以有返回值，也可以没有
*（5）函数只有定义，不调用，代码不会运行
 */

 /**
 * 定义一个函数，有参数，有返回值，有处理过程
 * 作用：计算两个数之和并返回结果
 * 参数$a: 代表第一个运算数
 * 参数$b: 代表第二个运算符
 * 返回值：返回$a+$b的结果
 */
function calc($a, $b) {
    $result = $a + $b;
    echo "运算结果为：$result <br/>";
    return $result;
}

// $v = calc(100, 200);
// echo $v;



/**
 * 验证一个手机号码是否正确
 * 返回值：true表示有效，false表示无效
 */
function checkPhone_01($phone) {

    $len = strlen($phone);
    if ($len != 11) {
        echo "长度必须为11位.<br/>";
        return false;   // 代码运行到此，就会返回到调用的地方，不再往下运行
    }

    if ($phone[0] != 1) {
        echo "第1位必须为1.<br/>";
        return false;
    }

    if ($phone[1] < "3" || $phone[1] > "9") {
        echo "第2位必须为3-9.<br/>";
        return false;
    }

    for ($i=2; $i<11; $i++) {
        if ($phone[$i] < "0" || $phone[$i] > "9") {
            echo "后9位必须是数字.<br/>";
            return false;
        }
    }
    
    return true;    // 如果前面的代码块均没有return，则认为电话号码是有效的
}

// $result = checkPhone_01("13845618789T");
// if ($result) {
//     // 正式注册，insert到数据库中一条新的用户数据
// }
// else {
//     echo "<script>window.alert('你的电话号码输入有误.')</script>";
// }


/**
 * 改造checkPhone函数，并进行测试
 */

function checkPhone_02($phone) {

    $len = strlen($phone);
    if ($len != 11) {
        return false; 
    }

    if ($phone[0] != 1) {
        return false;
    }

    if ($phone[1] < "3" || $phone[1] > "9") {
        return false;
    }

    for ($i=2; $i<11; $i++) {
        if ($phone[$i] < "0" || $phone[$i] > "9") {
            return false;
        }
    }
    
    return true; 
}

/**
 * 将所有判断条件一次判断完，引入PHP的内置函数is_numeric进行数字判断
 */
function checkPhone_03($phone) {
    // if ( strlen($phone) != 11 || $phone[0] != 1 || $phone[1] < "3" || $phone[1] > "9" || ! is_numeric($phone)) {
    //     return false;
    // }

    if ( (strlen($phone) != 11) || 
         ($phone[0] != 1) || 
         ($phone[1] < "3" || $phone[1] > "9") || 
         (! is_numeric($phone))) {
        return false;
    }
    return true;
}


/**
 * 将所有判断条件一次判断完，使用自己定义的checkNumber函数来判断数字
 */
function checkNumber($number) {
    for ($i=0; $i<strlen($number); $i++) {
        if ($number[$i] < "0" || $number[$i] > "9") {
            return false;
        }
    }
    return true; 
}
function checkPhone_04($phone) {
    if ( strlen($phone) != 11 || $phone[0] != 1 || $phone[1] < "3" || $phone[1] > "9" || ! checkNumber($phone)) {
        return false;
    }
    return true;
}


/**
 * 使用正则表达式判断手机号码
 */
function checkPhone($phone) {
    $result = preg_match("/^1[3-9]\d{9}$/", $phone);
    return $result;
}

// 自动化功能测试
function testFunc($phone, $expect) {
    $result = checkPhone($phone);
    if ($result == $expect) {
        echo "$phone: 测试成功.<br/>";
    }
    else {
        echo "$phone: 测试失败.<br/>";
    }
}

testFunc("1381234567", false);
testFunc("1381234567T", false);
testFunc("12812345678", false);
testFunc("12812345678", false);
testFunc("53812345678", false);
testFunc("2181234567T", false);
testFunc("13812345678", true);
testFunc("18812345678", true);
testFunc("15612345678", true);


?>