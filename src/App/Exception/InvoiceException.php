<?php


//////////  OOP ERROR HANDLING IN PHP - EXCEPTIONS_TRY CATCH FINALLY BLOCKS  //////////

namespace App\Exception;

class InvoiceException extends \Exception
{
  public static function missingBillingInfo(): static
  {
    return new static('Missing billing info');
  }

  public static function invalidAmount(): static
  {
    return new static('Invalid invoice amount');
  }
}
