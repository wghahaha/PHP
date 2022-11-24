<?php

// $content = file_get_contents("http://www.woniunote.com/");
// $html = new DOMDocument();
// $html->preserveWhiteSpace = false;
// @$html->loadHTML($content);

// $links = $html->getElementsByTagName('a');

// $linkList = array();

// foreach ($links as $link) {
//     // echo $link->nodeValue . "<br/>";
//     // echo $link->attributes->item(0)->nodeValue . "<br/>";
//     foreach ($link->attributes as $attr) {
//         if ($attr->nodeName == "href") {
//             // echo $attr->nodeValue . "<br/>";
//             // 利用 / 、 #、 http 三个特征来判断URL地址类型，并完成完整的地址拼接
//             if (strpos($attr->nodeValue, '/') == 0) {
//                 array_push($linkList, 'http://www.woniunote.com' . $attr->nodeValue);
//             }
//             else if (strpos($attr->nodeValue, 'http://') == 0) {
//                 array_push($linkList, $attr->nodeValue);
//             }
//         }
//     }
// }

// set_time_limit(0);

// foreach ($linkList as $link) {
//     $filename = str_replace("http://www.woniunote.com/", "", $link);
//     $filename = str_replace("/", "-", $filename);
//     $content = file_get_contents($link);
//     file_put_contents("./download/html/$filename.html", $content);
//     echo "成功下载：$filename <br/>"; 
//     ob_flush();
//     flush();
//     sleep(0.5);
// }


// 使用Simple HTML Dom库
include_once "simple_html_dom.php";
$html = file_get_html('http://www.woniunote.com/');

// 查找所有的超链接
$links = $html->find('a');
foreach ($links as $link) {
    echo $link->href . "<br/>";
}

// 查找所有图片地址
$images = $html->find('img');
foreach ($images as $image) {
    $src = $image->src;
    if (strpos($src, '/') == 0) {
        $url = 'http://www.woniunote.com' . $src;
    }
    else if (strpos($src, 'http') == 0) {
        $url = $src;
    }
    $filename = end(explode("/", $url));
    $content = file_get_contents($url);
    file_put_contents("./download/image/$filename", $content);

    echo "图片 $filename 下载完成. <br/>";
    ob_flush();
    flush();
    sleep(0.5);
}

// 使用其他的定位方式

// 使用类似于Xpath的方式来定位元素
$titles = $html->find("div[@class='title']");
$titles = $html->find("div[class='title']");
$titles = $html->find("div.title");
foreach ($titles as $title) {
    // echo $title->innertext . "<br/>";
    echo $title->plaintext . "<br/>";
    // echo $title->outertext . "<br/>";
}

// 使用ID属性定位元素
$nodes = $html->find("input[@id='keyword']");
$nodes = $html->find("input#keyword");
$nodes = $html->find("#keyword");
foreach ($nodes as $node) {
    echo $node->placeholder;
}

// 直接给定元素下标找对应某一个元素
$html = file_get_html('http://www.woniunote.com/article/609');
$node = $html->find("#content", 0);
echo $node->plaintext;

// 元素之间的层次关系
$titles = $html->find("div.title");
foreach ($titles as $title) {
    echo $title->first_child()->innertext . "<br/>";
}

// 用完整个页面的DOM结构后，清空内存
$html->clear(); 



// 使用正则表达式如何解析页面元素
// 正则表达式是将一份HTML源码理解为一个长长的字符串，进而使用正则表达式进行字符串解析和匹配
// 设定左右边界来查找超链接或者其他元素
$content = file_get_contents('http://www.woniunote.com/');
// $pattern = '/<a href="(.*)"/';      // 贪婪模式
$pattern = '/<a href="(.+?)"/';        // 非贪婪模式
preg_match_all($pattern, $content, $result);
print_r($result[1]);

?>