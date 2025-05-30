<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

trait CappuccinoTrait
{

  // In traits i can also use another trait
  // use LatteTrait;

  private function makeCappuccino()
  {
    echo static::class . ' is making cappuccino' . '<br/>';
  }

  // makeCoffe method has higher precedence, will executed instead of the method on the base class CoffeMaker which is extends on CappuccinoMaker
  // public function makeCoffee()
  // {
  //   echo 'Making Coffee (UPDATED)' . '<br/>';
  // }

  // This method will be error because it also define in latteTrait and both LatteTrait & CappuccinoTrait is in AllInOneCoffeMaker, i need to use insteadOf operator in AllInOneCoffeMaker to solve it,
  // public function makeLatte()
  // {
  //   echo static::class . ' is making latte (Cappuccino Trait)' . '<br/>';
  // }

}
