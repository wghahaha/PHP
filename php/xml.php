<?php

    $doc = new DOMDocument();   // 实例化DOMDocument类
    $doc->load('./student.xml');

    // 读取class节点的属性id和对应的值
    // $nodes = $doc->getElementsByTagName('class');
    // echo $nodes->item(0)->nodeName;
    // echo $nodes->item(0)->attributes->item(0)->nodeName;
    // echo $nodes->item(0)->attributes->item(0)->nodeValue;


    // 读取第二个学生的所有信息
    // $nodes = $doc->getElementsByTagName('student');
    // $childNodes = $nodes->item(1)->childNodes;
    // foreach ($childNodes as $node) {
    //     echo $node->nodeValue . "<br/>";
    // }

    // 读取所有学生的姓名
    // $nodes = $doc->getElementsByTagName("name");
    // foreach ($nodes as $node) {
    //     echo $node->nodeValue . "<br/>";
    // }

    // 将XML文件读取为PHP的二维数组
    // $nodes = $doc->getElementsByTagName("student");
    // $students = array();
    // foreach ($nodes as $k=>$v) {
    //     $students[$k]['id'] = $v->getElementsByTagName('id')->item(0)->nodeValue;
    //     $students[$k]['name'] = $v->getElementsByTagName('name')->item(0)->nodeValue;
    //     $students[$k]['sex'] = $v->getElementsByTagName('sex')->item(0)->nodeValue;
    //     $students[$k]['age'] = $v->getElementsByTagName('age')->item(0)->nodeValue;
    //     $students[$k]['degree'] = $v->getElementsByTagName('degree')->item(0)->nodeValue;
    //     $students[$k]['school'] = $v->getElementsByTagName('school')->item(0)->nodeValue;
    // }
    // print_r($students);

    // 适当优化，简化代码
    // $nodes = $doc->getElementsByTagName("student");
    // $students = array();
    // $tag = array('id', 'name', 'sex', 'age', 'degree', 'school');
    // foreach ($nodes as $k=>$v) {
    //     foreach ($tag as $t) {
    //         $students[$k][$t] = $v->getElementsByTagName($t)->item(0)->nodeValue;
    //     }
    // }
    // print_r($students);


    // 读取firewall.xml的所有端口信息
    // $doc->load('../demo/firewall.xml');
    // $nodes = $doc->getElementsByTagName('port');
    // foreach ($nodes as $node) {
    //     $attr = $node->attributes;
    //     echo $attr->item(1)->nodeValue . "<br/>";
    // }


    // 修改节点的属性或值
    // $doc = new DOMDocument();
    // $doc->preserveWhiteSpace = false;   // 不保留空白节点
    // $doc->formatOutput = true;          // 格式化输出
    // $doc->load('./student.xml');
    // $nodes = $doc->getElementsByTagName('student');

    // 修改节点的属性值
    // $nodes->item(2)->attributes->item(0)->nodeValue = '5';
    // 修改节点的值
    // $nodes->item(2)->childNodes->item(1)->nodeValue = '杨大言';
    // foreach($nodes->item(2)->childNodes as $node) {
    //     echo $node->nodeValue . "<br/>";
    // }

    // 删除一个节点：先找到父节点，再找到子节点，调用父节点的removeChild方法删除
    // $parent = $nodes->item(2);
    // $child = $parent->childNodes->item(4);
    // $parent->removeChild($child);

    // // 直接找到要删除的节点自身，再向上一层找到父节点，再调用removeChild进行删除
    // $child = $doc->getElementsByTagName('degree')->item(2);
    // $child->parentNode->removeChild($child);
    
    // $doc->save('./student.xml');


    // 将数组写入XML
    // 先定义数组，也可以直接从数据库读取
    // $student01=array("id"=>"WNCD201703015", "name"=>"敬小越", "sex"=>"男", "age"=>"24", "degree"=>"本科", "school"=>"电子科技大学成都学院");
    // $student02=array("id"=>"WNCD201703020", "name"=>"何小学", "sex"=>"男", "age"=>"29", "degree"=>"本科", "school"=>"成都理工大学");
    // $student03=array("id"=>"WNCD201703025", "name"=>"杨小言", "sex"=>"女", "age"=>"22", "degree"=>"大专", "school"=>"四川华新现代职业学院");
    // $students = array($student01, $student02, $student03);

    // $doc = new DOMDocument('1.0', 'utf8');
    // $doc->preserveWhiteSpace = false;
    // $doc->formatOutput = true;
    
    // // 创建根节点 class 并设置 id 属性
    // $class = $doc->createElement('class');
    // $class->setAttribute('id', 'WNCDC085');
    // $doc->appendChild($class);

    // foreach ($students as $index => $student) {
    //     // 为class节点添加student子节点
    //     $nodeStudent = $doc->createElement('student');
    //     $nodeStudent->setAttribute('sequence', $index+1);
    //     $class->appendChild($nodeStudent);
    //     // 为student节点添加id, name, sex等子节点
    //     foreach ($student as $key => $value) {
    //         $node = $doc->createElement($key);
    //         $nodeStudent->appendChild($node);
    //         // 为各子节点赋值
    //         $nodeValue = $doc->createTextNode($value);
    //         $node->appendChild($nodeValue);
    //     }
    // }

    // $doc->save('./write.xml');



    // XPATH定位元素
    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    $doc->load('./student.xml');
    $xpath = new DOMXPath($doc);    // 实例化XPATH对象
    // $expression = "/class/student[@sequence='1']/school";
    // $expression = "/class/student[@sequence='2']/school";
    // $expression = "//student[@sequence='3']/name";
    // $expression = "//student[2]/name";      // 找第2个学生的姓名
    $expression = "//student/school[contains(text(), '科技')]";
    $nodes = $xpath->query($expression);    // 返回的是找到的所有节点
    echo $nodes->item(0)->nodeValue;

?>