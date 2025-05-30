<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

class Customer
{

  // use Mail;

  // public function updateProfile() {
  //   echo 'Profile Updated' . '<br/>';

  //   $this->sendEmail();
  // }


  //////////  PHP VARIABLE STORAGE_OBJECT COMPARISON-ZEND VALUE  //////////

  // public function __construct(public string $name) {}


  //////////  PHP DOCBLOCK - ADDING COMMENTS TO CLASSES_METHODS  //////////

  // public string $name;


  //////////  OOP ERROR HANDLING IN PHP - EXCEPTIONS_TRY CATCH FINALLY BLOCKS  //////////

  public function __construct(private array $billingInfo = []) {}

  public function getBillingInfo(): array
  {
    return $this->billingInfo;
  }
}
