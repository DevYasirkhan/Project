<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

class CoffeeMaker
{
  // public static string $foo;

  // The final keyword is used to restrict the ingeritance and overriding of classes and methods
  // final public function makeCoffee()
  public function makeCoffee()
  {
    echo static::class . ' is making coffee' . '<br/>';
  }
}
