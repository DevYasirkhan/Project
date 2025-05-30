<?php

namespace App;

use App\Exception\MissingBillingInfoException;
use App\Exception\InvoiceException;

class Invoice
{
  // private float $amount; not works
  // protected float $amount;
  // protected array $data = []; // instead of __construct method use array_key_exists() with protected array $data

  // public function __construct($amount)
  // {
  //   $this->amount = $amount;
  // }

  // Triggered when accessing a non-existing or inaccessible property
  // public function __get(string $name)
  // {
  //   // if (property_exists($this, $name)) {
  //   //   return $this->$name;
  //   // }
  //   if (array_key_exists($name, $this->data)) {
  //     return $this->data[$name];
  //   }

  //   return null;
  // }

  // Triggered when assigning a value to a non-existing or inaccessible property
  // public function __set(string $name, $value): void
  // {
  //   // if (property_exists($this, $name)) {
  //   //   $this->$name = $value;
  //   // }

  //   $this->data[$name] = $value;
  // }

  // Triggered by calling isset() or empty() on inaccessible properties
  // public function __isset(string $name): bool
  // {
  //   var_dump('isset');
  //   return array_key_exists($name, $this->data);
  // }

  // Triggered when unset() is used on an inaccessible property
  // public function __unset(string $name): void
  // {
  //   var_dump('unset');
  //   unset($this->data[$name]);
  // }

  // public function process()
  // protected function process(float $amount, $description)
  // {
  //   // var_dump('process');
  //   var_dump($amount, $description);
  // }

  // // Called when invoking inaccessible or non-existent methods
  // public function __call(string $name, array $arguments)
  // {
  //   if (method_exists($this, $name)) {
  //     // $this->$name($arguments); instead of pass array to $amount in process which is float, use this down func which works
  //     call_user_func_array([$this, $name], $arguments); // Call a callback with an array of parameters
  //   }
  // }

  // //
  // public static function __callStatic(string $name, array $arguments)
  // {
  //   var_dump('static', $name, $arguments);
  // }

  // Called when an object is treated as a string
  // public function __toString(): string
  // {
  //   // return 'hello';
  //   return 1; // works but not with strict mode, always use for string
  // }

  // Called when an object is used as a funciton
  // public function __invoke()
  // {
  //   var_dump('invoked');
  // }

  // private float $amount;
  // private int $id = 1;
  // private string $accountNumber = '0123456789';

  // // Controls what gets shown when using var_dump() on an object
  // public function __debugInfo(): ?array
  // {
  //   return [
  //     'id' => $this->id,
  //     'accountNumber' => '****' . substr($this->accountNumber, -4),
  //   ];
  // }


  //////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

  //   use Mail;

  //   public function process(){
  //     echo 'Processed invoice' . '<br/>';

  //     $this->sendEmail();
  //   }


  //////////  PHP VARIABLE STORAGE_OBJECT COMPARISON-ZEND VALUE  //////////

  // public ?Invoice $LinkedInvoice = null;

  // public function __construct(public Customer $customer, public float $amount, public string $description) {}


  //////////  PHP - object cloning_clone magic method   //////////

  // private string $id;

  // public function __construct()
  // {
  //   $this->id = uniqid('invoice_');

  //   var_dump('__construct');
  // }

  // public function __clone(): void
  // {
  //   $this->id = uniqid('invoice_');

  //   var_dump('__clone');
  // }


  //////////  PHP SERIALIZE OBJECTS_SERIALIZE MAGIC METHODS   //////////

  // protected string $id;

  // public function __construct(
  //   public float $amount,
  //   public string $description,
  //   public string $creditCardNumber
  // ) {

  //   $this->id = uniqid('invoice_');
  // }

  // sleep() func is used to delay code execution for a specified num of seconds
  // public function __sleep(): array
  // {
  //   return ['id', 'amount'];
  // }

  // __wakeup method is a magic method used with object serialization, it's automatically called when an obj is unserialized using unserialize()
  // public function __wakeup(): void
  // {
  //   //
  // }

  // serialize method precidence is higher than sleep
  // public function __serialize(): array
  // {
  //   return [
  //     'id' => $this->id,
  //     'amount' => $this->amount,
  //     'description' => $this->description,
  //     'creditCardNumber' => base64_encode($this->creditCardNumber),
  //     'foo' => 'bar',
  //   ];
  // }

  // // unserialize method precidence is higher than wakeup
  // public function __unserialize(array $data): void
  // {
  //   $this->id = $data['id'];
  //   $this->amount = $data['amount'];
  //   $this->description = $data['description'];
  //   $this->creditCardNumber = base64_encode($data['creditCardNumber']);
  // }


  //////////  OOP ERROR HANDLING IN PHP - EXCEPTIONS_TRY CATCH FINALLY BLOCKS  //////////

  // public function __construct(public Customer $customer) {}

  // public function process(float $amount): void
  // {
  //   if ($amount <= 0) {
  //     // throw new \Exception('Invalid invoice amount');
  //     // throw new \InvalidArgumentException('Invalid invoice amount');
  //     throw InvoiceException::InvalidAmount();
  //   }

  //   if (empty($this->customer->getBillingInfo())) {
  //     // throw new MissingBillingInfoException();
  //     // throw CustomException::missingBillingInfo();
  //     throw InvoiceException::missingBillingInfo();
  //   }

  //   echo 'Processing $' . $amount . ' invoice - ';

  //   sleep(1);

  //   echo 'OK' . '<br/>';
  // }


  //////////  PHP ITERATORS_ITERABLE TYPES - ITERATE OVER OBJECTS   //////////

  public string $id;

  public function __construct(public float $amount)
  {
    $this->id = random_int(10000, 9999999); // random_int() generates cryptographically secure pseudo-random integers
  }
}
