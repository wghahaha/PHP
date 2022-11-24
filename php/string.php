<?php

// $str = "http://www.woniuxy.com/train/index.html";
// echo strpos($str, "http");

$content = file_get_contents("https://woniuxyopenfile.oss-cn-beijing.aliyuncs.com/woniuxynote/thumb/620.png");
file_put_contents("D:\\620.png", $content);

?>