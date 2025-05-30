<?php

//////////  PHP INTERFACES_POLYMORPHISM  INTERFACES EXPLAINED  //////////

namespace App;

class CollectionAgency implements DebtCollector
{

  // public const MY_CONSTANT = 2;
  public function __construct() {}

  public function collect(float $owedAccount): float
  {
    $guaranteed = $owedAccount * 0.5;

    return mt_rand($guaranteed, $owedAccount); // mt_rand() generate a random value via the Mersenne Twister Random Number Generator
  }
}
