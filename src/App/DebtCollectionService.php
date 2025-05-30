<?php

//////////  PHP INTERFACES_POLYMORPHISM  INTERFACES EXPLAINED  //////////

namespace App;

class DebtCollectionService
{

  public function collectDebt(DebtCollector $collector)
  {
    // var_dump($collector instanceof CollectionAgency);

    $owedAmount = mt_rand(100, 1000);
    $collectedAmount = $collector->collect($owedAmount);

    echo 'Collected $' . $collectedAmount . ' out of $' . $owedAmount . PHP_EOL;
  }
}
