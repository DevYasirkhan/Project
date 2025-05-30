<?php

declare(strict_types=1);

//////////  PHP CLASSES_ OBJECTS - TYPED PROPERTIES - CONSTRUCTORS_DESTRUCTORS  //////////

/* 
//  class is like a blueprint for creating objects. It defines  properties (variables) and methods (functions) that the objects created from the class will have
class Transaction 
{
  // private $amount; // Can't access private property outside
  private float $amount = 15; // define method in class use public, private, protected, for clarity & best practice, var is old way, otherwise error
  private string $description; 

  // constructor is a special func inside a class that is automatically called when an object of the class is created. 
  public function __construct(float $amount, string $description) {
    $this->amount = $amount; # $this refers to the current object
    $this->description = $description;
  }
  
  // class name or self keyword refer to object with $this
  public function addTax(float $rate): Transaction { 
    $this->amount += $this->amount * $rate / 100;

    return $this;
  }

  public function applyDiscount(float $rate): Transaction {
    $this->amount -= $this->amount * $rate / 100;   

    return $this;
  }

  public function getAmount(): float {
    return $this->amount;
  }

  // The __destruct() method automatically called when there are no more references to an object, or during the shutdown of the script
  public function __destruct() {
    echo 'Destruct' . $this->description . '<br/>';
  }
}
*/

/*
//////////  CONSTRUCTOR PROPERTY PROMOTION - NULLSAFE OPERATOR  //////////

class Transaction
{
  // private float $amount = 1;
  // private float $amount;

  private ?Customer $customer;
  // public ?Customer $customer; // ? indicate that this property can be either an instance of Customer or null


  public function __construct(
    private float $amount,
    // private string $description = 'hello',
    // private ?string $description = null, // make it nullable type ?
    private string $description  // php will do property difination & property assignment behind the seen
  ) {
    // $this->amount = $amount;
    // echo $this->amount;
  }

  public function getCustomer(): ?Customer
  {
    return $this->customer;
  }
}
*/


//////////  PHP NAMESPACE  //////////

// namespace paymentGeteway\Stripe;

// class Transaction {}


//////////  PHP CODING STANDARDS_AUTOLOADING(PSR-4) COMPOSER  //////////

// namespace App\PaymentGateway\Stripe;

// class Transaction {}
