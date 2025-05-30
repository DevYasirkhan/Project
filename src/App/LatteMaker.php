<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

class LatteMaker extends CoffeeMaker
{
  use LatteTrait;

  //  protected string $milkType = 'whole-milk';

  // isntead of there define this variable & func in trait littlebit good
  // private string $milkType = 'whole-milk';

  // public function getMilkType(): string {
  //   return $this->milkType;
  // }

  // public function makeCoffee() {
  // } // can't override makeCoffee on final makeCoffe
 
    // But i can override makeLatte on final makeLatte
  public function makeLatte() {
    echo 'MAKING LATTE' . '<br/>';
  }
}
