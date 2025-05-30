<?php

//////////  PHP INTERFACES_POLYMORPHISM  INTERFACES EXPLAINED  //////////

namespace App;

interface DebtCollector extends AnotherInterface, SomeOtherInterface
{

  public const MY_CONSTANT = 1;

  public function __construct();

  public function collect(float $owedAccount): float; // must be public
}
