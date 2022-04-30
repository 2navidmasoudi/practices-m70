<?php

trait MyTrait1 {
    public function hello() {
        echo "Hi";
    }
}

trait MyTrait2 {
    public function hello() {
        echo "Hello";
    }
}

class MyClass {
    use MyTrait1, MyTrait2 {
        MyTrait2::hello insteadof MyTrait1;
        MyTrait1::hello as hi;
    }
}

$obj = new MyClass;
$obj->hello();
$obj->hi();