<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////


namespace App;

class AllInOneCoffeeMaker extends CoffeeMaker
{
  // use CappuccinoTrait, LatteTrait; // Also works in one line

  // if methods are private use cappuccinoTrait will error, but i can fix it with change the alias of CappuccinoTrait as public it will work  
  use CappuccinoTrait {
    CappuccinoTrait::makeCappuccino as public;
  }
  use LatteTrait;

  // use CappuccinoTrait {
  //   CappuccinoTrait::makeLatte insteadof LatteTrait;
  // }
  // // The insteadof operator is used to resolve conflicts between traits that have methods with the same name 
  // use LatteTrait {
  //   LatteTrait::makeLatte as makeOriginalLatte; // i can also set alias
  // }

  // public function foo()
  // {
  //   // makeCappuccino method is private but still accessible
  //   $this->makeCappuccino();
  // }

  // isntead of there define this variable & func in trait littlebit good
  // private string $milkType = 'whole-milk';

  // public function getMilkType(): string {
  //   return $this->milkType;
  // }
}
