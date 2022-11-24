<?php

/**
 * 文件读写的步骤：
 * 1、打开文件：fopen
 * 2、读写文件：fgets，fwrite
 * 3、关闭文件：fclose
 * 附加函数：
 * 1、判断文件是否已经到达末尾：feof($fp)
 * 2、一次性将文件所有内容读出：file_get_contents($filename)
 * 3、使用file_get_contents还可以发送GET请求
 * 4、使用file_put_contents一次性写入文件
 * 5、获取当前文件指针所在位置：ftell
 * 6、直接将文件指针指向某个位置：fseek
 */

// 最基本的按行循环读取整份文件
// $fp = fopen("E:/userpass.csv", "r");
// while (!feof($fp)) {
//     $line = fgets($fp);
//     $line = str_replace("\n", "<br/>", $line);
//     echo $line;
// }
// fclose($fp);

// 往文件中写入内容：写入内容
// $fp = fopen("E:/userpass.csv", "a");
// fwrite($fp, "\ntest,test123,login-fail");
// fclose($fp);

// 使用file_get_contents直接读取文件内容
// header("content-type:text/html; charset='gbk'");
// $content = file_get_contents("E:/Test.txt");
// $content = iconv("GBK", "UTF-8", $content);
// $content = str_replace("\n", "<br/>", $content);
// echo $content;
// $list = explode("\n", $content);
// print_r($list);

// 使用file_get_contents发送GET请求访问网页
// $content = file_get_contents("http://www.woniunote.com/");
// echo $content;
// 是否可以用于下载一个文件、一张图片呢？ 小任务，完成它，进而思考网页爬虫的设计思路。
// $content = file_get_contents("http://www.woniunote.com/img/banner-1.jpg");
// file_put_contents("E:\\test.jpg", $content);


// 使用file_put_contents一次性写入文件
/**
 * UTF-8处理中文时使用的是3字节，而GBK处理中文时是2个字节
 * 11001011 01011011 01011110 10100101 01011110 10100101
 */
// $content = iconv("UTF-8", "GBK", "\nHello蜗牛哦");
// file_put_contents("E:\\Test.txt", $content, FILE_APPEND);


// 读取一个CSV文件（逗号分隔符），并且解析为二维数组
// $content = file_get_contents("E:/userpass.csv");
// $rows = explode("\n", $content);

// 循环之前，先定义一个数组
// $list = array();
// for ($i=1; $i<count($rows); $i++) {
//     $temp = explode(",", $rows[$i]);
//     array_push($list, $temp);
// }
// print_r($list);


// 使用PHP模拟tail -f实时查看文件内容
// $fp = fopen("E:\\userpass.csv", "r");
// fseek($fp, 32);
// while ($line = fgets($fp)) {
//     echo $line . "<br/>";
// }
// fclose($fp);

// @error_reporting(0);
// set_time_limit(0);

// $pos = 0;
// while (true) {
//     $fp = fopen("./test.txt", "r");
//     fseek($fp, $pos);
//     while ($line = fgets($fp)) {
//         $line = iconv("GBK", "UTF-8", $line);
//         echo $line . "<br/>"; 
//     }
//     $pos = ftell($fp);
//     fclose($fp);

//     ob_flush();
//     flush();
//     sleep(2);
// }

?>