<?php


//////////  OOP ERROR HANDLING IN PHP - EXCEPTIONS_TRY CATCH FINALLY BLOCKS  //////////

namespace App\Exception;

class MissingBillingInfoException extends \Exception
{
  protected $message = 'Missing billing information';
}
