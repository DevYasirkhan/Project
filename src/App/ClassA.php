<?php

namespace App;

// class ClassA
// {
//   protected static string $name = 'A';

//   public static function getName(): string
//   {
//     // return $this->name; // $this keyword is not works with static
//     // var_dump(self::class);
//     // var_dump(get_called_class()); // The "Late Static Binding" class name
//     // return self::$name;
//     return static::$name;
//   }

//   // public static function make(): self // self will point to ClassA not good even i call this method on ClassB
//   public static function make(): static
//   {
//     // return new ClassA();
//     // return new ClassB();
//     // return new self; // result will classA not good even i call this method on ClassB
//     return new static; // result will classB its good
//   }
// }


//////////  PHP ANONYMOUS CLASSES  //////////

class ClassA
{
  public function __construct(public int $x, public int $y) {}

  public function foo(): string
  {
    return 'foo';
  }

  public function bar(): object
  {
    // return new class($this->x, $this->y) extends ClassA {
    // return new class($this->x, $this->y) {
    return new class($this) {

      // public function __construct(public int $x, public int $y)
      public function __construct(ClassA $myObj)
      {
        // parent::__construct($x, $y);
        // $this->foo();

        // var_dump($x, $y);

        var_dump($myObj);
      }
    };
  }
}
