<?php

/**
 * 封装：public, private, protected
 * 1. 默认情况下，所有属性和方法，在没有明确设置访问修饰符时，均为public
 * 2. private 表示类私有，在类的定义中可以使用，而在实例和子类中均无法使用
 * 3. protected 表示受类的保护，实例中不能直接使用，但是在子类中可以使用
 */
class People {
    private $name = '王五';     // 定义类时，可以给属性一个初始值，使用了访问修饰符后，不再需要var
    var $age = 0;
    var $addr = '';
    var $nation = '';

    // 定义People类所具备的方法，默认情况下，方法的定义与函数完全一致
    public function talk() {
        // 在类的定义中, $this 指类的具体实例
        echo "$this->name 正在说话. <br/>";
    }

    private function work() {
        echo "$this->name 正在工作. <br/>";
    }

    // 公有方法调用私有方法
    protected function eat($type='米饭') {
        echo "$this->name 正在吃 $type <br/>";
        $this->work();
    }

    // 针对私有属性，如何在实例中对其进行修改？设置一个公有方法，对类的私有属性进行修改或取值
    // 以下两个方法是封装这个特性最经典的演示：公有方法操作私有属性。
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// $p = new People();
// $p->name = "张三";   // 实例无法使用类的私有属性
// echo $p->name . "<br/>";
// $p->talk();
// $p->setName('张三');
// echo $p->getName() . "<br/>";
// $p->eat();



// /**
//  * 继承：子承父业、继承传统、发扬光大
//  * 定义类：Man，让其继承父类People，则Man这个类就称为子类，可以继承父类的属性和方法（非私有）
//  * 子类继承父类时，可以在子类调用protected修改的属性和方法，同时也可以覆盖或重写父类方法
//  * 子类也可以在自己类的扩展或创建新的方法和属性
//  * 关键字：final，如果一个类被final修饰，则该类不能被继承
//  */

class Man extends People {
    // Man这个类，什么都不做，People的所有非私有属性和方法均可以使用

    // 父类中有的方法，在子类中可以进行覆盖，也称为“重写”，override
    function work() {
        // $this->eat();
        parent::eat();      // 更加正统的做法，在子类中使用parent::调用父类的方法
        echo "$this->name 正在工作 <br/>";
    }

    public function talk() {
        echo "$this->name 正在说话. <br/>";
    }

    // 父类中不存在的方法，子类新建的方法（扩展）
    public function drive() {
        echo "$this->name 正在开车. <br/>";
    }
}

// $m = new Man();
// // echo $m->name;      // 子类无法直接使用父类的私有属性
// // $m->work();            // 子类无法直接使用父类的私有方法
// // $m->talk();

// // 子类直接定义一个父类拥有的相同的属性，是可以正常工作的
// $m->name = "子姓名";
// // echo $m->name;
// // $m->work();
// // $m->talk();

// // $m->eat();  // 在子类的实例中，一样无法调用父类的protected方法
// $m->drive();





// 多态：多种形态
// 抽象类：只有类的方法中有一个方法使用abstract关键字定义，则该类就是抽象类，该方法就是抽象方法
// 抽象类的特点：不能被实例化，只能被继承，抽象方法不能有实现代码
// 接口：极端的抽象，只能有方法的定义，不能有方法的实现，通常用于定义一些规则
abstract class animal{
    // function can(){
    //     echo "this function weill be re-write in the children. <br/>";
    // }
    abstract function can();    // 抽象方法不能实现代码，只能定义方法名和参数
    // abstract function work();
    function dosth() {
        echo "做一些事情";
    }
}
class cat extends animal{
    function can(){
        echo "I can climb. <br/>";
    }
}
class dog extends animal{
    function can(){
        echo "I can swim. <br/>";
    }
}
function test($obj){
    $obj->can();
}
test(new cat());    // 传递cat的实例时，运行的就是cat的can的方法
test(new dog());    // 传递dog的实例时，运行的就是dog的can的方法


// $a = new animal();  // 抽象类不能被实例化


?>