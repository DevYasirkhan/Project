<?php

//////////  PHP ABSTRACTION CLASSES_METHODS  //////////

// namespace App;

// i can't create object of this class with abstract keyword
// abstract class Field
// {
//   public function __construct(protected string $name) {}

// abstract private function render(): string; // I can't provide private methods with abstraction, cause i can't override private method in child classes, should be protected or public
//   abstract public function render(): string;
// }


//////////  PHP INTERFACES_POLYMORPHISM  INTERFACES EXPLAINED  //////////

namespace App;

abstract class Field implements Renderable
{
  public function __construct(protected string $name) {}


  abstract public function render(): string;
}
