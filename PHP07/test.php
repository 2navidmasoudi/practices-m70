<?php

// class Car {
// public static function whichCar(){
//  return self::getType();
// }
// public static function getType()
// {
// return 'I am a main car!';
// }

// }
// class RedCar extends Car {
// public static function getType() {
//     return 'I am Red Car!';

// }

// }

// echo RedCar::whichCar();


// class Base
//  {
//      public function sayHello() {
// echo 'Hello ';
// }
// }
// trait SayWorld {
// public function sayHello() {
// echo parent::sayHello();
// echo "wo";
// }
// }
// class MyHelloWorld extends Base {
// use SayWorld;
// }
// $a = new MyHelloWorld();
// $a->sayHello();

class A {
    public static $var;
    public static function init($var) {
        self::$var = $var;
        return new self;
    }
    public static function add($var) {
        self::$var += $var;
        return new self;
    }
    public static function out() {
        
        return self::$var;
    }
}

echo A::init(3)->add(4)->out();