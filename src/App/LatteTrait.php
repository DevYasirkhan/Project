<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

trait LatteTrait
{

  // if i define this variable in latteMaker both should be same type and values otherwise error
  // protected string $milkType = 'whole-milk';
  private string $milkType = 'whole-milk';

  // public static int $x = 1;
  public static string $foo;


   final public function makeLatte()
  {
    // echo static::class . ' is making latte with ' . $this->milkType . '<br/>'; 
    echo __CLASS__. ' is making latte with ' . $this->milkType . '<br/>'; 

    // echo static::class . ' is making latte with ' . $this->getmilkType() . '<br/>'; // if $milkType not defined use getMilkType() func in here LatteTrait but with abstract keyword instead of point to variable directly, but better way with setMilkType static
  }

  // public static function foo() {
  //   echo 'Foo Bar';
  // }

//  abstract public function getMilkType(): string; // don't need to define abstract keyword with class if using trait if not then also use abstract keyword with class otherwise error

public function setMilkType(string $milkType): static {
  $this->milkType = $milkType;

  return $this;
}
}
