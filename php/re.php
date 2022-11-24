<?php

/**
 * Regular Expression：正则表达式：匹配、查找、替换
 * 1. 用于判断或匹配某个字符串是否满足要求
 * 2. 用于从一个字符串中查找满足要求的内容
 * 3. 用于把一个字符串中满足要求的内容替换成其他内容
*/

function re_basic() {
    $source = "Gooooooogle.";
    // $pattern = "/^Go*/";
    // $pattern = "/^Go{5,8}.*e$/";
    $pattern = "/^Go{5,8}.*\.$/";
    $result = preg_match($pattern, $source);
    if ($result) {
        echo "匹配成功.<br/>";
    }
    else {
        echo "匹配失败.<br/>";
    }
}


function re_phone() {
    $source = "13812345678";
    $pattern = "#^1[3-9]\d{9}$#";
    $result = preg_match($pattern, $source);
    if ($result) {
        echo "匹配成功.<br/>";
    }
    else {
        echo "匹配失败.<br/>";
    }
}


function re_ip() {
    $source = "102.9.63.253";
    $pattern = "/(^[01]?\d?\d{1}$)|(^2[0-4]\d$)|(^25[0-5]$)\.(^[01]?\d?\d{1}$)|(^2[0-4]\d$)|(^25[0-5]$)
              \.(^[01]?\d?\d{1}$)|(^2[0-4]\d$)|(^25[0-5]$)\.(^[01]?\d?\d{1}$)|(^2[0-4]\d$)|(^25[0-5]$)/";
    echo preg_match($pattern, $source);
}


// 通过设定的模式去查找满足该模式的内容
function re_find() {
    $source = "我很喜欢玩手机，所以我买了很多手机，我爸爸给我买了一个最贵的手机，手机号码是18812345678，
    这个手机号码是不是很牛逼啊，但是我妈妈还给我买了手机，号码是138383839438，这个号码可够38的，也不知道
    咱想的，上次过生日，我朋友又给我搞了一部手机，手机号码是18612351233，但是有这么多手机，我的每个月的费用
    也花不少，上个月花了13812312元，这个月又花了188123456元，好废钱啊，但是无所谓，老子有的是钱，看了一下账户，
    一共还有19912345678001901234658765，唉，花不完啊";
    $pattern = "#1[3-9]\d{9}#";
    preg_match_all($pattern, $source, $result);
    // echo $result;   // $result变量的查找结果是一个数组类型，数组类型的输出不能使用echo，要使用print_r或var_dump
    print_r($result);
}

// 通过设定左右边界来查找被左右边界夹着的内容
function re_lr() {
    $source = '
    <li><a href="//www.runoob.com/">首页</a></li><li><a href="/html/html-tutorial.html">HTML</a></li>
    <li><a href="/css/css-tutorial.html">CSS</a></li>
    <li><a href="/js/js-tutorial.html">JavaScript</a></li>
    <li><a href="/jquery/jquery-tutorial.html">jQuery</a></li>
    <li><a href="/vue2/vue-tutorial.html">Vue2</a></li>
    <li><a href="/vue3/vue3-tutorial.html">Vue3</a></li>
    <li><a href="/bootstrap/bootstrap-tutorial.html">Bootstrap</a></li>
    <li><a href="/python3/python3-tutorial.html">Python3</a></li>
    <li><a href="/python/python-tutorial.html">Python2</a></li>
    <li><a href="/java/java-tutorial.html">Java</a></li>
    <li><a href="/cprogramming/c-tutorial.html">C</a></li>
    <li><a href="/cplusplus/cpp-tutorial.html">C++</a></li>
    <li><a href="/csharp/csharp-tutorial.html">C#</a></li>
    <li><a href="/go/go-tutorial.html">Go</a></li>
    <li><a href="/sql/sql-tutorial.html">SQL</a></li>
    <li><a href="/browser-history">本地书签</a></li>
    ';
    $pattern = '/<a href="(.+?)">/';     // 非贪婪模式进行查找
    preg_match_all($pattern, $source, $result);
    print_r($result);
}

function re_replace() {
    $source = "我很喜欢玩手机，所以我买了很多手机，我爸爸给我买了一个最贵的手机，手机号码是18812345678，
    这个手机号码是不是很牛逼啊，但是我妈妈还给我买了手机，号码是138383839438，这个号码可够38的，也不知道
    咱想的，上次过生日，我朋友又给我搞了一部手机，手机号码是18612351233，但是有这么多手机，我的每个月的费用
    也花不少，上个月花了13812312元，这个月又花了188123456元，好废钱啊，但是无所谓，老子有的是钱，看了一下账户，
    一共还有19912345678001901234658765，唉，花不完啊";
    $pattern = "#1[3-9]\d{9}#";
    $temp = preg_replace($pattern, "XXXXXXXXXXX", $source);
    echo $temp;
}

// re_basic();
// re_phone();
// re_ip();
// re_find();
// re_lr();
re_replace();



?>