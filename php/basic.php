<?php
    // 必须要使用<?php >进行代码的包裹，只能注释一行
    /* 可以用于注释一行或者一个段落  */
    /**
     * 在PHP中，可以通过两个函数往页面中输出注释：
     * 1、echo：支持用逗号分隔多个字符进行拼接输出
     * 2、print：不支持用逗号分隔多个字符进行拼接输出
     * 注意：在PHP中，换行符\n无法被浏览器解析，<br>才能被浏览器解析
     */

    echo "这是一个牛逼的网页. <br/>";
    print "这又是一个更牛逼的网页.<br>";

    echo "1111111111", "2222222222", "333333333<br>";
    // print "1111111111", "2222222222", "333333333";    // print不能跟逗号分隔多个字符串

    // 在PHP中，. 表示字符串连接符
    echo "1111111111" . "2222222222" . "333333333<br/>";
    print "1111111111" . "2222222222" . "333333333<br/>";

    echo "你好，你的余额为：" . 20000 . "元<br/>";


    /**
     * 引号的问题：
     * 1、双引号：里面可以包裹字符串和变量
     * 2、单引号：单引号只能表示字符串，不能引用变量
     * 3、反引号：用于执行操作系统命令并返回结果
     */

    $addr = "四川成都";
    echo "你当前所在城市为：$addr <br/>";
    echo '你当前所在城市为：$addr <br/>';
    echo `date /T`;    

    /**
     * 为什么执行ipconfig命令时，会在网页上输出乱码：是因为网页的编码是UTF-8，而操作系统的编码格式是GBK（中文编码）
     * 1、使用PHP内置函数：header 往网页中写入GBK的响应头，让浏览器按照GBK的编码格式处理，
     *    但是，此种方法会导致整个页面都会变成GBK的编码格式，而如果页面中其他位置的内容不是GBK，则会变成乱码
     * 2、使用PHP内置函数：iconv 来对需要进行转码的文本进行编码格式的转换，不影响其他内容
     */

    // header("content-type:text/html; charset='GBK'");
    $result = `date /T`;
    $result = iconv("GBK", "UTF-8", $result);
    echo $result;


    /**
     * 变量的命名规范：
     * 变量以 $ 符号开始，后面跟着变量的名称
     * 变量名必须以字母或者下划线字符开始
     * 变量名只能包含字母、数字以及下划线（A-z、0-9 和 _ ）
     * 变量名不能包含空格
     * 变量名是区分大小写的（$y 和 $Y 是两个不同的变量）
     * 变量名不能用中文全拼，最好使用英文单词
     * 变量名不能用无意义的简写，WB，XY，但是常规的简写是可以的，html, css, js, mp4
     * 函数名必须使用动词或动名词形式
     * 变量名或函数或等，首字母小写，如果有多个单词，第二单词的首字母建议大写：checkNumber,  check_number
     */

    if (!("100" === 100)) {
        echo "两者相等 <br/>";
    }
    

    // $i = 1;
    // while ($i <= 10) {
    //     echo $i . '<br/>';
    //     $i++;
    // }


    $i = date("s");
    while ($i <= 30) {
        ob_flush();     // 清空缓冲区，直接输出
        flush();
        echo date("Y-m-d H:i:s") . "<br/>";
        $i = date("s");
        sleep(1);
    }

?>