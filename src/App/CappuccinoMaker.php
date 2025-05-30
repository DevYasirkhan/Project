<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

class CappuccinoMaker extends CoffeeMaker
{
  // if methods are private use cappuccinoTrait will error, but i can fix it with change the alias of CappuccinoTrait as public it will work  
  use CappuccinoTrait  {
    CappuccinoTrait::makeCappuccino as Public;
  }

  // if makeCappuccino method redifined again here after CappuccinoTrait then it will override 
  // public function makeCappuccino()
  // {
  //   echo 'Making Cappuccino (UPDATED)' . '<br/>';
  // }

}
