<?php

date_default_timezone_set("PRC");

function create_connection() {
     $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'learn') or die("数据库连接不成功.");
     mysqli_query($conn, "set names utf8");
     return $conn;
}


// 利用面向对象的特性改造数据库操作
// class DB {
//     // 为DB类定义数据库连接的必要属性
//     var $host = '127.0.0.1';
//     var $username = 'root';
//     var $password = '123456';
//     var $database = 'learn';

//     // 定义一个方法，用于建立与数据库的连接
//     private function create_connection() {
//         $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) 
//                 or die("数据库连接不成功.");
//         mysqli_query($conn, "set names utf8");
//         return $conn;
//     }

//     // 封装两个操作方法，一个用于查询，一个用于更新
//     function query($sql) {
//         $conn = $this->create_connection();
//         $result = mysqli_query($conn, $sql);
//         $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//         return $rows;
//     }

//     function modify($sql) {
//         $conn = $this->create_connection();
//         $result = mysqli_query($conn, $sql);
//         if (! $result) {
//             die("数据库更新操作不成功.");
//         }
//     }

//     // 类的析构方法：当类的实例使用完并从内存中释放时，将会触发调用该方法
//     function __destruct() {
//         $conn = $this->create_connection();
//         mysqli_close($conn);
//     }
// }




class DB {
    // 为DB类定义数据库连接的必要属性
    // private $host = '127.0.0.1';
    // private $username = 'root';
    // private $password = '123456';
    // private $database = 'learn';

    var $host = '127.0.0.1';
    var $username = 'root';
    var $password = '123456';
    var $database = 'learn';

    // 将数据库连接对象定义为类属性
    private $conn = null;

    // 定义一个方法，用于建立与数据库的连接
    private function create_connection() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) 
                or die("数据库连接不成功.");
        mysqli_query($this->conn, "set names utf8");
        return $this->conn;
    }

    // 封装两个操作方法，一个用于查询，一个用于更新
    function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $rows;
    }

    function modify($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (! $result) {
            die("数据库更新操作不成功.");
        }
    }

    // 类的构造方法：当类在进行实例化时会触发执行该方法
    function __construct($host='127.0.0.1', $username='root', $password='123456', $database='learn') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        echo "调用构造方法，并建立数据库的连接 <br/>";
        $this->create_connection();     // 每一个实例化的过程，就会执行一次
    }

    // 类的析构方法：当类的实例使用完并从内存中释放时，将会触发调用该方法
    function __destruct() {
        echo "调用析构方法，并关闭数据库的连接 <br/>";
        mysqli_close($this->conn);
    }

    // 当类进行序列化时自动调用，并且返回一个数组，包含要实例化的类属性
    function __sleep() {
        echo "DB类正在进行序列化. <br/>";
        return array('host', 'username', 'password', 'database');
    }

    // 在类进行反序列时调用，并且可以在该方法中定义恢复类状态的代码，以便于让反序列化的实例可以正常调用方法。
    function __wakeup() {
        echo "DB类正在被反序列化. <br/>";
        $this->create_connection();     // 恢复数据库的连接状态
    }
}


?>