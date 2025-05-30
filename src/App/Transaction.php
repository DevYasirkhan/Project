<?php

//////////  PHP DOCBLOCK - ADDING COMMENTS TO CLASSES_METHODS  //////////

namespace App;

/**
//  * @property int $x
//  * @property-write float $y
 * @method static int foo(string $x)
 */

class Transaction
{

  public function __call(string $name, array $arguments) {}

  public function __callStatic(string $name, array $arguments) {}

  // public function __get(string $name)
  // {
  //   // 
  // }

  // public function __set(string $name, $value): void
  // {
  //   // 
  // }

  // /** @var Customer */
  // private $customer;

  // /** @var float */
  // private $amount;

  // /**
  //  * @param Customer[] $arr
  //  */

  // public function foo(array $arr)
  // {
  //   /** @var Customer $obj */
  //   foreach ($arr as $obj) {
  //     $obj->name;
  //   }
  // }

  // /**
  //  * Some description
  //  * 
  //  * @param Customer $customer
  //  * @param float $amount
  //  *
  //  * @throws \RuntimeException
  //  * @throws \InvalidArgumentException
  //  * 
  //  * @return bool
  //  */

  // public function process(Customer $customer, float $amount): bool
  // {

  //   // process transaction

  //   // if failed, return false

  //   // otherwise return true
  //   return true;
  // }
}
